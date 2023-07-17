import React from 'react'

import { dateObjConstruct, orderIndexes } from './date'

function GraphDatesHeader({ range: { forward, backward }, moveIndex }) {

  const { entryIndexes: dateIndexes, entries: dates } = orderIndexes({ forward, backward }, moveIndex, dateObjConstruct)

  return dateIndexes.map( ix => {
    const {index, date, day} = dates[ix]

    return (
      <div className={`date`+ (index > 0 ? ' future' : (index < 0 ? ' past' : ''))} key={ix} data-index={ index } style={{ width: `calc(100% / ${forward + backward + 1})` }}>
        <div className='date-string'>{ (index == 0 ? ' Dzisiaj' : '') }</div>
        <div className='date-string'>{ date }</div>
        <div className='date-day'>{ day }</div>
      </div>
    )
  })

}

export default GraphDatesHeader
