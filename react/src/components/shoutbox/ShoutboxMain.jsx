import React, { useContext, useEffect, useState, useRef } from 'react'
import useScrollPosition from '@react-hook/window-scroll'
import ShoutboxContext from './ShoutboxContext'
import ShoutboxContextMenu from './ShoutboxContextMenu'
import ShoutboxMessage from './ShoutboxMessage'

import { MDBInput } from 'mdb-react-ui-kit';

function ShoutboxMain() {

  const form = useRef(null)

  const messagesEndRef = useRef(null)
  const ctx = useContext(ShoutboxContext)
  const scrollY = useScrollPosition(60)
  const [message, setMessage] = useState('')
  const [timer, setTimer] = useState(null)
  const [contextMenu, setContextMenu] = useState({
    toggle: false,
    message: null,
    position: {
      x: 0,
      y: 0
    }
  })

  const scrollToBottom = () => {
    messagesEndRef.current.scrollIntoView({ behavior: 'auto', block: 'nearest', inline: 'start' })
  }

  const handleMessageInput = (e) => {
    setMessage(e.target.value)
  }

  const handleSubmit = (e) => {
    if (e.keyCode === 13) {
      e.preventDefault()

      if (message) {
        if (message.length > 512) {
          alert(`Wiadomość może mieć maks. 512 znaków (zapisałeś ${message.length} znaków)`)
        }
        else {
          setMessage('')
          document.querySelector('#sb-message').value = ''

          ctx.sendMessage(message)
        }
      }
    }
  }

  useEffect(() => {

    if (ctx && (ctx.messages && ctx.maintenance)) {
      if (ctx.messages.length) scrollToBottom()
    }

    if ('user' in ctx) {
      const interval = setInterval(() => {
        setTimer(Math.floor(Date.now() / 1000))
      }, 1000)

      return () => {
        clearInterval(interval)
      }
    }
  }, [ctx])

  const handleContextMenu = (message, e) => {
    if (!('isLoading' in message)) {
      const pos = e.pageY - 50

      setContextMenu({
        toggle: true,
        message,
        position: {
          x: e.pageX,
          y: pos
        }
      })
    }
  }

  const closeContextMenu = () => {
    setContextMenu({ ...contextMenu, toggle: false })
  }

  useEffect(() => {
    setContextMenu({
      ...contextMenu,
      toggle: false,
    })
  }, [scrollY])

  const date = 'user' in ctx && ctx.user.deleted > 0 ? new Date(parseInt(ctx.user.deleted) * 1000) : null

  return (
     <div className="card shadow mb-4">
      <div className="card-body mb-0">
        <div className="row mb-4">
          <div className="col-sm-5">
            <h3 className="font-weight-bold mb-2">
              <i className="fas fa-comment-alt"></i> Czat
            </h3>
          </div>
        </div>
        {
          ctx && ctx.messages && ctx.maintenance
            ?
              <div className="row g-0">
                <div style={ctx.messages.length > 0 ? {height: '300px', overflowY: 'auto', overflowX: 'hidden'} : {}} className='col-12'>
                  <div style={{ width: '100%', display: 'block' }}>
                    {
                      ctx.messages.length
                        ? ctx.messages.map((message, index) => (
                          <ShoutboxMessage key={message.uuid} message={message} prevMessage={ctx.messages[index - 1]} changeContextMenu={handleContextMenu} />
                        ))
                        : <p style={{ color: '#CCCCCC', textAlign: 'center' }}>Brak wiadomości</p>
                    }
                    <div id='end-ref' ref={messagesEndRef} />
                  </div>
                </div>
                <ShoutboxContextMenu message={contextMenu.message} state={contextMenu} closeContextMenu={closeContextMenu} />
                <div className='col-12'>
                  {
                    ctx.maintenance.toggle
                      ? ctx.user.deleted !== -1 && (ctx.user.deleted === 0 || (timer !== null && ctx.user.deleted <= timer) || (timer === null && ctx.user.deleted <= Math.floor(Date.now() / 1000)))
                        ? <form onKeyDown={handleSubmit}>
                            <MDBInput className='' type='text' id='sb-message' label='Wiadomość...' onChange={handleMessageInput}/>
                          </form>
                        : <p className="mb-0" style={{ color: '#ba0000' }}>Twoje konto ma nałożoną blokadę pisania na shoutboxie{date ? <> do {new String(date.getDate()).padStart(2, '0')}.{new String(date.getMonth()+1).padStart(2, '0')}.{date.getFullYear()} {new String(date.getHours()).padStart(2, '0')}:{new String(date.getMinutes()).padStart(2, '0')}</> : null}. { ctx.user.block_reason ? <><br/><span>Powód: { ctx.user.block_reason }</span></> : null }</p>
                      : <p className="mb-0" style={{ color: '#ba0000' }}>Shoutbox został wyłączony. { ctx.maintenance.message ? <>Powód: { ctx.maintenance.message }</> : null }</p>
                  }
                </div>
              </div>
            : <p>Ładowanie wiadomości...</p>
        }
      </div>
    </div>
  )
  
}

export default ShoutboxMain
