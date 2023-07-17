import React from 'react'

import Icon from '../Icon'

function MoveButton({ icon, pressCallback, disableRule }) {

  const handleClick = () => pressCallback()

  return (
    <button onClick={handleClick} className="btn btn-link" disabled={disableRule}>
      <Icon name={icon} />
    </button>
  )
}

export default MoveButton
