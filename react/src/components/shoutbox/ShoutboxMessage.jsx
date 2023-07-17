import React, { useContext } from 'react'
import ShoutboxContext from './ShoutboxContext'
import ShoutboxMessageOwner from './ShoutboxMessageOwner'

function ShoutboxMessage({ message: content, prevMessage, changeContextMenu }) {

  const ctx = useContext(ShoutboxContext)

  const handleContextMenu = (e) => {
    e.preventDefault()

    changeContextMenu(content, e)
  }

  const { message, owner } = content

  const urlify = (text) => {
    var urlRegex = /(https?:\/\/[^\s]+)/g;

    let sliced = text.split(' ')

    sliced = sliced.map((part, i) => {
      if (urlRegex.test(part)) {
        const { origin, pathname, search } = new URL(part)

        return <span key={`msg-${content.uuid.substr(0,8)}-${i}`}><a target='_blank' rel="nofollow" href={part}>{ origin + pathname + (search.length > 10 ? search.substr(0,10) + '...' :  search) }</a>{ i + 1 == sliced.length ? '' : ' ' }</span>
      }
      else {
        return <span key={`msg-${content.uuid.substr(0,8)}-${i}`}>{ part + (i + 1 == sliced.length ? '' : ' ') }</span>
      }
    })

    return sliced
  }

  return (content.hidden && ctx.user.can_see_hidden) || !content.hidden ? (
    <>
      <div className={'shoutbox-message-container' + (owner.you ? ' you' : '') }>
        <div className='shoutbox-user'>
          { prevMessage && prevMessage.owner.name === owner.name && (!prevMessage.hidden || (prevMessage.hidden && ctx.user.can_see_hidden)) ? null : <ShoutboxMessageOwner owner={owner.user} isMe={owner.you} /> }
        </div>
      </div>
      <div className={'shoutbox-message-container' + (owner.you ? ' you' : '') + ('failedSending' in content ? (content.failedSending === false ? ' is-sending' : ' failed') : '' ) + (content.hidden ? ' is-hidden' : '') }>
        {
          'isLoading' in content
          ? <div style={{ padding: '8px 10px 8px 0' }}><div className="spinner-border" role="status"><span className="visually-hidden">Loading...</span></div></div>
          : <div className={'shoutbox-message'} onContextMenu={handleContextMenu}>
              <p>
                <span>{ urlify(message) }</span>
              </p>
            </div>
        }
        {
          'failedSending' in content && content.failedSending !== false
            ? <div className='shoutbox-message-fail-reason'>
                <p>Błąd wysyłania: { content.failedSending }</p>
              </div>
            : null
        }
      </div>
    </>
  ) : null
}

export default ShoutboxMessage
