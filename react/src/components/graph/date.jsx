import _ from 'lodash'

const weekday = {
  1: 'Poniedziałek',
  2: 'Wtorek',
  3: 'Środa',
  4: 'Czwartek',
  5: 'Piątek',
  6: 'Sobota',
  0: 'Niedziela'
};

const zeroPad = (num, places) => String(num).padStart(places, '0')

const dateObjConstruct = (index) => {
  const date = new Date(Date.now() + (3600000 * 24 * index))

  return ({
    index,
    date: zeroPad(date.getDate(), 2) +'.'+ zeroPad((date.getMonth() + 1), 2) +'.'+ date.getFullYear(),
    day: weekday[date.getDay()]
  })
}

const dutyObjConstruct = (index) => {
  const date = new Date(Date.now() + (3600000 * 24 * index))

  return ({
    index,
    date: date.getFullYear() +'-'+ zeroPad((date.getMonth() + 1), 2) +'-'+ zeroPad(date.getDate(), 2),
  })
}

const orderIndexes = ({ forward, backward }, moveIndex, objectFunc) => {
  const entries = {}
  const entryIndexes = []

  for(let entry = -backward; entry <= -1; entry++) {
    entryIndexes.push(entry + moveIndex)
    entries[entry + moveIndex] = objectFunc(entry + moveIndex)
  }

  entryIndexes.push(0 + moveIndex)
  entries[0 + moveIndex] = objectFunc(0 + moveIndex)

  for(let entry = 1; entry <= forward; entry++) {
    entryIndexes.push(entry + moveIndex)
    entries[entry + moveIndex] = objectFunc(entry + moveIndex)
  }

  return { entries, entryIndexes }
}

const rangeIndexes = ({ from, to }, objectFunc) => {
  const entries = {}
  const entryIndexes = []

  for(let entry = from; entry <= to; entry++) {
    entryIndexes.push(entry)
    entries[entry] = objectFunc(entry)
  }

  return { entries, entryIndexes }
}

const dateIndexes = (dates, objectFunc) => {
  const entries = {}
  const entryIndexes = []

  dates.forEach( date => {
    const [year, month, day] = date.split('-')

    const dateSomwhere = new Date(year, (month - 1), day).getTime()
    const dateNow = Date.now()

    const dateDifference = dateSomwhere - dateNow

    let index = Math.ceil(dateDifference / (3600000 * 24))

    if (index === -0) {
      index = 0
    }

    entryIndexes.push(index)
    entries[index] = objectFunc(index)
  })

  return { entries, entryIndexes }
}

export { orderIndexes, rangeIndexes, dateIndexes, dateObjConstruct, dutyObjConstruct }
