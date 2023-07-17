import React, { useEffect, useState } from 'react';
import _ from 'lodash'

import './index.scss';
import Context from './components/graph/context'
import MoveButton from './components/graph/MoveButton'
import GraphDatesHeader from './components/graph/GraphDatesHeader';
import GraphContent from './components/graph/GraphContent';

import { columns, columnsBreakpoints } from './components/graph/graph.config'

export default function Graph() {

  let lastBreakpoint = ''

  const [state, setState] = useState({
    range: {
      forward: 0,
      backward: 0
    },
    additionalRanges: {},
    moveIndex: 0
  })

  const [contextState, setContextState] = useState({
    disable: {
      left: true,
      right: true
    }
  })

  const enableButtons = () => setContextState({ ...contextState, disable: { left: false, right: false }})
  const disableButtons = () => setContextState({ ...contextState, disable: { left: true, right: true }})

  const resetBreakpoint = (set_state = true) => {
    const breakpoint = columnsBreakpoints(window.innerWidth)
    const { forward, backward } = columns[breakpoint]

    lastBreakpoint = breakpoint

    if (set_state) {
      setState({ ...state, range: { forward, backward } })
    }
    else {
      return { forward, backward }
    }
  }

  const handleMoveClick = (side) => {

    const range = resetBreakpoint(false)

    let newMI

    if (side === 'left') {
      newMI = state.moveIndex - 1
    }
    else if (side === 'right') {
      newMI = state.moveIndex + 1
    }

    var to, from;

    if ((newMI === -1 || newMI % 3 === 0) && newMI < 0) {

      to = newMI - (range.backward + (newMI === -1 ? 2 : 3))
      from = to - 2
    }
    else if ((newMI === 1 || newMI % 3 === 0) && newMI > 0) {

      from = newMI + (range.forward + (newMI === 1 ? 2 : 3))
      to = from + 2
    }

    if (from && to) {
      setState({ range, moveIndex: newMI, additionalRanges: { from, to } })
    }
    else {
      setState({ range, moveIndex: newMI, additionalRanges: {} })
    }
    // console.log('Setting new movement', { from, to })
  }

  const handleLeftClick = () => handleMoveClick('left')
  const handleRightClick = () => handleMoveClick('right')

  const { forward, backward } = state.range

  useEffect(() => {
    if (forward === 0 && backward === 0) resetBreakpoint()

    const resizeListener = () => {
      if (columnsBreakpoints(window.innerWidth) !== lastBreakpoint) resetBreakpoint()
    }

    window.addEventListener('resize', resizeListener)

    return () => {
      window.removeEventListener('resize', resizeListener)
    }
  }, [])

  useEffect(() => {
    const moveListener = ({ code }) => {
      if (new Array('KeyA', 'ArrowLeft').includes(code)) {

        if (!(state.moveIndex <= -30)) handleLeftClick()
      }
      else if (new Array('KeyD', 'ArrowRight').includes(code)) {

        if (!(state.moveIndex >= 10)) handleRightClick()
      }
    }

    document.addEventListener('keydown', moveListener)

    return () => {
      document.removeEventListener('keydown', moveListener)
    }
  }, [state.moveIndex])

  const disableLeft = state.moveIndex <= -30 || contextState.disable.left
  const disableRight = state.moveIndex >= 10 || contextState.disable.right

  const contextValue = {
    state: contextState,
    enable: enableButtons,
    disable: disableButtons
  }

  return (
    <Context.Provider value={contextValue}>
      <div className='vztm-graph--header'>
        <div className='move-controls' style={{ maxWidth: '135px', width: '100%' }}>
          <MoveButton icon='fas fa-chevron-left' pressCallback={() => { if (!contextState.disable.left) handleLeftClick() }} disableRule={disableLeft} />
          <MoveButton icon='fas fa-chevron-right' pressCallback={() => { if (!contextState.disable.right) handleRightClick() }} disableRule={disableRight} />
        </div>
        <GraphDatesHeader range={state.range} moveIndex={state.moveIndex} />
      </div>
      <div className='vztm-graph--content'>
        <GraphContent range={state}/>
      </div>
    </Context.Provider>
  )
}
