import React, { useState, useEffect } from 'react'
import { v4 as UUIDv4 } from 'uuid'
import io from "socket.io-client";

const mainSocket = io.connect("http://localhost:3000");

import ShoutboxContext from './ShoutboxContext'

const ShoutboxHandler = ({ children }) => {
  const [container, setContainer] = useState(null)
  const [tempContainer, setTempContainer] = useState(null)

  useEffect(() => {
    const timeoutId = setTimeout(() => {
      mainSocket.emit('shoutbox:handshake')

      const refreshListener = ({ payload: { users: user, ...payload }, type }) => {
        setContainer({ user, ...payload })

        if ((type === 'new-msg' || type === 'load') && document.querySelector('#end-ref')) document.querySelector('#end-ref').scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' })
      }

      const callRefreshListener = () => {
        mainSocket.emit('shoutbox:refresh-modify')
      }

      mainSocket.on('shoutbox:refresh', refreshListener)
      mainSocket.on('shoutbox:call-refresh', callRefreshListener)

      return () => {
        mainSocket.off('shoutbox:refresh',refreshListener)
        mainSocket.off('shoutbox:call-refresh',callRefreshListener)
      }
    }, 1000);

    return () => {
      clearTimeout(timeoutId);
    };
  }, []);

  useEffect(() => {
    const reconnectListener = () => {
      setContainer(tempContainer)
      setTimeout(() => { mainSocket.emit('shoutbox:handshake')}, 1000)
    }

    const lostConnectionListener = () => {
      setTempContainer(container)
      setContainer({ ...container, maintenance: { toggle: false, message: 'Utracono połączenie z serwerem' }})
    }

    mainSocket.on('connect', reconnectListener)

    const connectionLostEvents = ['error', 'disconnect']
    connectionLostEvents.forEach(event => {
      mainSocket.on(event, lostConnectionListener)
    })

    return () => {
      mainSocket.off('connect', reconnectListener)

      connectionLostEvents.forEach(event => {
        mainSocket.off(event, lostConnectionListener)
      })
    }
  }, [container])

  const sendMessage = (message) => {

    setContainer({ ...container, messages: [...container.messages, {
      failedSending: false,
      message,
      owner: {
        you: true
      },
      time: Math.floor(Date.now() / 1000),
      hidden: false,
      uuid: UUIDv4(),
    }] })

    setTimeout(() => { document.querySelector('#end-ref').scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' }) }, 50)

    mainSocket.emit('shoutbox:send-message', message, (response) => {
      if (response !== true) {
        setContainer({ ...container, messages: [...container.messages, {
          failedSending: response,
          message,
          owner: {
            you: true
          },
          time: Math.floor(Date.now() / 1000),
          hidden: false,
          uuid: UUIDv4(),
        }] })
      }
    })
  }

  const setMessageLoading = (ix) => {

    const newContainer = { ...container }

    newContainer.messages[ix].isLoading = true

    setContainer(newContainer)
  }

  return (
    <ShoutboxContext.Provider value={{ ...container, sendMessage, setMessageLoading }}>
      { children }
    </ShoutboxContext.Provider>
  )
}

export default ShoutboxHandler
