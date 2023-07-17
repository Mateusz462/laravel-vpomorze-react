import React from 'react'

function ShoutboxMessageOwner({ owner: { login, color, isPatron, avatar, suspended, blocked }, isMe }) {
  return (
    !isMe
      ? isPatron
        ? <p className={'shoutbox-message-owner'+ (suspended ? ' is-suspended' : '' )} style={{ fontWeight: 'bold', display: 'inline-flex', alignItems: 'center', background: `-webkit-linear-gradient(45deg, #ccac00, ${color})`, WebkitBackgroundClip: 'text', WebkitTextFillColor: 'transparent'}}>
            <i style={{ margin: '4px 3px 0 0', fontSize: '1em' }} className="material-icons">star</i>
            { blocked ? <i style={{ fontSize: '1.4em' }} className="material-icons">block</i> : null}
            <img src="https://cdn.discordapp.com/avatars/467020104555560972/89147b4b8234d9dd45ab6da3e0d95ea1.png?size=160" height='32' width='32' />
            <span style={{ marginTop: '4px' }} dangerouslySetInnerHTML={{ __html: login + ':' }} />
          </p>
        : <p className={'shoutbox-message-owner'+ (suspended ? ' is-suspended' : '' )} style={{ color }}>
            { blocked ? <i style={{ fontSize: '1.4em' }} className="material-icons">block</i> : null}
            <img src="https://cdn.discordapp.com/avatars/467020104555560972/89147b4b8234d9dd45ab6da3e0d95ea1.png?size=160" height='32' width='32' />
            <strong dangerouslySetInnerHTML={{ __html: login + ':' }} />
          </p>
      : null
  )
}

export default ShoutboxMessageOwner
