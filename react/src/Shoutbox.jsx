import React from 'react'
import ShoutboxHandler from './components/shoutbox/ShoutboxHandler'
import ShoutboxMain from './components/shoutbox/ShoutboxMain'

function Shoutbox() {

  return (
    <ShoutboxHandler>
      <ShoutboxMain />
    </ShoutboxHandler>
  )
}

export default Shoutbox
