import React, { useState, useRef, useEffect, useContext } from 'react'
import useStateWithCallback from '../../use-state-with-callback';
import axios from 'axios'
import _ from 'lodash'
import io from 'socket.io-client'

const socket = io.connect('http://localhost:3000')
import Context from './context'
import { dutyObjConstruct, orderIndexes, rangeIndexes, dateIndexes } from './date'
import GraphUserDuties from './GraphUserDuties'
import { MDBTooltip } from 'mdb-react-ui-kit';

function GraphContent({ range: { range, moveIndex, additionalRanges } }) {

  const loader = useRef()

  const { enable: moveButtonsEnable, disable: moveButtonsDisable } = useContext(Context)

  const [firstLoad, setFirstLoad] = useState(true)
  const [isLoading, setIsLoading] = useState(false)
  const [usersStrg, setUsersStrg] = useStateWithCallback(null)
  const [dutiesStrg, setDutiesStrg] = useState(null)

  const { forward, backward } = range

  const getDutiesRange = (range, user = null) => {

    const dates = Object.values(range).map(({ date }) => date).filter(date => {
      return dutiesStrg && !user ? !dutiesStrg[Object.keys(dutiesStrg)[0]].hasOwnProperty(date) : true
    })

    if (dates.length && !isLoading) {
      setIsLoading(true)

      axios.post(!user ? `http://localhost:8000/api/graph-get-users-duties` : `/ajax/graph-api.php?action=get-user-duty&user=${user}`, JSON.stringify(dates), {
        headers: {
          'Content-type': 'application/json'
        }
      })
        .then(({ data }) => {
          if (!dutiesStrg) {
            setDutiesStrg(data)
          }
          else {
            const newDutiesObj = { ...dutiesStrg }

            if (!user) {
              Object.keys(dutiesStrg).forEach(user => {
                newDutiesObj[user] = { ...dutiesStrg[user], ...data[user] }
                //console.log(dutiesStrg[user]);
              })
            }
            else {
              newDutiesObj[user] = { ...dutiesStrg[user], ...data }
            }

            setDutiesStrg(newDutiesObj)
          }

          setIsLoading(false)
        })
        .catch((error) => {
          console.error(error)
        })
    }
  }

  const getUpdate = (user, date) => {

    axios.post(`/ajax/graph-api.php?action=get-user-duty&user=${user}`, JSON.stringify(typeof date === 'array' ? date : [ date ]), {
      headers: {
        'Content-type': 'application/json'
      }
    })
      .then(({ data }) => {
        let newDutiesObj = {
          ...dutiesStrg,
        }

        newDutiesObj[user][date] = { ...dutiesStrg[user][date], ...data[date] }

        setDutiesStrg(newDutiesObj)
      })
      .catch((error) => {
        console.error(error)
      })
  }

  useEffect(() => {
    if (!_.isEmpty(additionalRanges)) {
      const { entries: dates } = rangeIndexes(additionalRanges, dutyObjConstruct)

      getDutiesRange(dates)
    }
  }, [additionalRanges])


  const getUsers = () => {

    axios.get(`http://localhost:8000/api/graph-get-users`)
      .then(({ data }) => {

        const users = _.orderBy(data, ['id'], ['asc'])

        setUsersStrg(users)
      })
      .catch((error) => {
        console.error(error)
      })

    const { entries: duties } = orderIndexes({ forward: forward + 2, backward: backward + 2 }, moveIndex, dutyObjConstruct)

    getDutiesRange(duties)
  }

  const getUser = (user) => {

    axios.get(`http://localhost:8000/api/graph-get-user/${user}`)
        //
    //axios.get(`/ajax/graph-api.php?action=get-user&user=${user}`)
      .then(({ data }) => {
          console.log(data);

        // let newUsersObj = [ ...usersStrg ]


        if (usersStrg.map(user => (user.id)).includes(data.id)) {

          let userArrayIndex = 0;

          usersStrg.forEach((v, ix) => {
            if (v.id == data.id) userArrayIndex = ix
          })

          newUsersObj[userArrayIndex] = data

          console.log('Updating ', {user, received: data, newUsersObj})
        }
        else {

          newUsersObj = [ ...usersStrg, { ...data } ]
          console.log('Adding ', {user, received: data, newUsersObj})
        }

        // TODO: IF SECTION IS 0 THEN SECTION KEY WILL BE DESC IN ORDER
        newUsersObj = _.orderBy(newUsersObj, ['section', 'gorder', 'code'], ['asc', 'asc', 'asc'])

        setUsersStrg(newUsersObj, () => {
          const { entries: duties } = dateIndexes(Object.keys(Object.values(dutiesStrg)[0]), dutyObjConstruct)

          getDutiesRange(duties, user)
        })
      })
      .catch((error) => {
        console.error(error)
      })
  }

  const userUpdate = (user, action) => {

    switch(action) {
      case 'add' :
      case 'update' :

        console.log('Gonna trigger add/update user ', user)

        getUser(user)

        break;

      case 'remove' :

        console.log('Gonna remove user ', user)
        let newUsersObj = [ ...usersStrg ]

        newUsersObj = _.remove(newUsersObj, ({ id }) => id != user)

        setUsersStrg(newUsersObj)

        break;
    }
  }

  useEffect(() => {

    if (!(!usersStrg && !dutiesStrg)) moveButtonsEnable()

    if (!isLoading) socket.emit('get-blocked-duties')

    return () => {
      moveButtonsDisable()
    }
  }, [isLoading])

  useEffect( () => {
    const addListener = (userId) => { userUpdate(userId, 'add') }
    socket.on(`add-user`, addListener)

    const updateListener = (userId) => { userUpdate(userId, 'update') }
    socket.on(`update-user`, updateListener)

    const removeListener = (userId) => { userUpdate(userId, 'remove') }
    socket.on(`remove-user`, removeListener)

    return () => {
        socket.off('add-user', addListener)
        socket.off(`update-user`, updateListener)
        socket.off(`remove-user`, removeListener)
    }
  }, [usersStrg])

  if (firstLoad && forward !== 0 && backward !== 0) {
    setFirstLoad(false)

    getUsers()
  }

  const widthStyle = { width: `calc(100% / ${forward + backward + 1})` }

  return (
    !usersStrg || !dutiesStrg ? (
        <div>
            <div className='loader-bar'>
                <div className="progress">
                    <div ref={loader} className="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <p>Ładowanie danych...</p>
            </div>
        </div>
    )
    : (
      usersStrg.map(({ id, code, suspended, imie, nazwisko, ispatron, login }) => (
        <div className='graph-content--row' key={id}>
          <div id="user-id" className={'user'+ (suspended ? ' bg-danger' : '')} style={{ maxWidth: '135px', width: '100%' }}>
            <MDBTooltip tag='span' title={
                <>
                  <p className='mb-0'>ID: { id } | { login }</p>
                  <p className='mb-0'>{ imie + ' ' + nazwisko }</p>
                  <p className='mb-0'>Patron: {ispatron ? 'Tak' : 'Nie'}</p>
                </>
              }
            >
              [{code}]
            </MDBTooltip>
          </div>
          <GraphUserDuties style={widthStyle} range={range} moveIndex={moveIndex} user={{ userId: id }} suspended={suspended} downloadedDuties={dutiesStrg[id]} getDutyUpdate={getUpdate} getUserUpdate={userUpdate} />
        </div>
      ))
    )
  )
}

export default GraphContent
