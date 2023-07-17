import React, { useEffect } from 'react'

import GraphDuty from './GraphDuty'

import { orderIndexes, dutyObjConstruct } from './date'

function GraphUserDuties({ downloadedDuties, style, range: { forward, backward }, moveIndex, user: { userId }, suspended, getDutyUpdate, getUserUpdate }) {

  const { entryIndexes: dutyIndexes, entries: duties } = orderIndexes({ forward, backward }, moveIndex, dutyObjConstruct)

  console.log(downloadedDuties, dutyIndexes, duties)
  return downloadedDuties && dutyIndexes ? (
    dutyIndexes.map( ix => {
      const { date } = duties[ix]

      if (!downloadedDuties.hasOwnProperty(date)) {
        return (
          <div style={style} key={ix}>
            <p>Ładowanie...</p>
          </div>
        )
      }
      else {
        return ( <GraphDuty style={style} content={{ date, ...downloadedDuties[date]}} key={ix} userId={userId} suspended={suspended} getDutyUpdate={getDutyUpdate}/> )
      }
    })
  )
  : (
    <div style={{ width: `calc(100%)` }} key={Math.round(Math.random() * 10000)}>
      <p>Pobieranie...</p>
    </div>
  )
}

export default GraphUserDuties
