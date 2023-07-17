import React, { useContext } from 'react'
import ShoutboxContext from './ShoutboxContext'

function ShoutboxContextMenu({ message, state: { toggle, position }, closeContextMenu }) {

  const ctx = useContext(ShoutboxContext)

  const handleWrapperOnClick = (e) => {
    e.preventDefault()
    closeContextMenu()
  }

  const handleOnClick = (message, type) => {
    let ix = 0
    ctx.messages.forEach((m, i) => {
      if (message.uuid == m.uuid) ix = i
    })

    switch(type) {

      case 'hide' :
        ctx.setMessageLoading(ix)
        mainSocket.emit('shoutbox:hide-message', message.uuid)
        break;

      case 'block' :
        let time = !confirm('Czy chcesz permanentnie zablokować użytkownika?') ? prompt('Podaj do kiedy ma być zablokowany? (w podanym poniżej formacie)', 'dd.mm.yyyy hh:mm') : -1
        const reason = prompt('Powód zablokowania użytkownika')

        if (reason !== null) {
          if (time !== -1) {

            const timeRegex = /^(0[1-9]|1\d|2\d|3[01]).(0[1-9]|1\d|2\d|3[01]).(19|20)\d{2}\s+(0[0-9]|1[0-9]|2[0-3])\:(0[0-9]|[1-5][0-9])$/

            if (timeRegex.test(time)) {
              const [ dmy, hm ] = time.split(' ')
              const [ d, mon, y ] = dmy.split('.')
              const [ h, min ] = hm.split(':')

              time = parseInt(new Date(parseInt(y), parseInt(mon) - 1, parseInt(d), parseInt(h), parseInt(min)).getTime() / 1000).toFixed(0)

              ctx.setMessageLoading(ix)
              mainSocket.emit('shoutbox:block-user', message.owner.id, time, reason )
            }
            else {
              alert('Zły format daty (poprawny: dd.mm.yyyy hh:mm)')
            }
          }
          else {
            ctx.setMessageLoading(ix)
            mainSocket.emit('shoutbox:block-user', message.owner.id, time, reason)
          }
        }

        break;
    }
  }

  const options = message ? {
    ...((ctx.user.can_hide || message.owner.you) && !message.hidden ? { 'hide': 'Usuń' } : {}),
    ...(!message.owner.you ? { 'block': 'Zablokuj użytkownika' } : {})
  } : {}

  return message && Object.keys(options).length ? (
    <div className={'shoutbox-context-menu__wrapper'+ (toggle ? ' menu-is-open' : '')} onClick={handleWrapperOnClick} onContextMenu={handleWrapperOnClick} >
      <div style={{ top: position.y, left: position.x }} className={'shoutbox-context-menu mdl-shadow--2dp'}>
        <ul>
          {
            Object.keys(options).map((type) => (
              <li key={type} onClick={() => handleOnClick(message, type)}>{ options[type] }</li>
            ))
          }
        </ul>
      </div>
    </div>
  ) : null
}

export default ShoutboxContextMenu
