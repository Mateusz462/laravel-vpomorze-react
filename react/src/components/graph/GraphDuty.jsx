import React, { useEffect, useState } from 'react'
import { MDBTooltip } from 'mdb-react-ui-kit';
import io from 'socket.io-client'
let now = new Date();
let currentYear = now.getFullYear();
let today = now.getUTCDate();
let currentMonth = now.getUTCMonth() + 1; 
console.log(now);
if(today < 10) {
  today = '0' + today;
}
if(currentMonth < 10) {
  currentMonth = '0' + currentMonth;
}

const date = currentYear + '-' + currentMonth + '-' + today;

const socket = io.connect('http://localhost:3000')

function GraphDuty({ style, content, suspended, userId, getDutyUpdate }) {

  const [state, setState] = useState({
    blocked: false
  })

  if (content) {
    var { duty, kzw, vacation, working } = content

    var color
    var colorbtn
    var disabled
    var tooltip

    colorbtn = ''

    if (duty) {
      const { status, type, isKzw } = duty
      if (status === 0) {
        if (type === 0) {
          color = isKzw ? 'purple' : 'blue'
        }
        else if (type === 1) {
          color = isKzw ? 'brown' : 'orange'
        }
      }
      else if (status === 1) {
        color = 'bg-success'
      }
      else if (status === 2) {
        color = 'bg-danger'
      }
      else if (status === 3) {
        color = 'navy'
      }
    }

    var buttonText

    if (vacation) {
      buttonText = 'WOLNE'
      colorbtn = 'text-warning'
    }
    else if (kzw) {
      buttonText = 'KZW'
    }
    else if (working) {
      buttonText = <i className="fas fa-plus text-success fa-lg"></i>
    }
    else {
      buttonText = <i className="fas fa-minus fa-lg"></i>
    }
    if(content.date < date){
      disabled = 'disabled'
      tooltip = 'nie możesz dodawać/edytować służby'
    } else {
      disabled = ''
      
    }
  }

  const handleOnClick = () => {
    let height = window.innerHeight > 900 ? 900 : window.innerHeight
    let width = window.innerWidth > 1300 ? 1300 : window.innerWidth
    console.log()
    let left = (screen.width - width) / 2;
    let top = (screen.height - height) / 4;
    let windowOptions = `directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no,resizable=no,width=${width},height=${height},top=${top},left=${left}`
    if (kzw || working && content.date >= date) {
      window.open( duty ? `/dyspozytornia?action=edit-duty&id=${duty.id}` : `/manager/control-room/graph/add-duty/?user=${userId}&date=${content.date}`, null, windowOptions);
    }
    // socket.emit(`block-duty`, {
    //     userId:userId,
    //     user:"PA-14XD"
    // }, content.date)
  }

  useEffect(() => {

    const updateListener = () => {
      getDutyUpdate(userId, content.date)
    }
    socket.on(`update-duty_${userId}_${content.date}`, updateListener)

    const blockListener = (user) => {
      setState({ ...state, blocked: user })
    }
    socket.on(`block-duty_${userId}_${content.date}`, blockListener)

    const unblockListener = () => {
      setState({ ...state, blocked: null })
    }
    socket.on(`unblock-duty_${userId}_${content.date}`, unblockListener)

    return () => {

        socket.off(`update-duty_${userId}_${content.date}`, updateListener)
        socket.off(`block-duty_${userId}_${content.date}`, blockListener)
        socket.off(`unblock-duty_${userId}_${content.date}`, unblockListener)
    }
  }, [])

  return content ? (
    !state.blocked ? (
      duty ? (
        <div onClick={handleOnClick} className={`duty pointer ${color}`} style={style}>
          <div>{ duty.name }</div>
          <div>{ duty.bus }</div>
        </div>
      )
      : (
        !suspended ? (
          <div className='duty' style={style}>
            {disabled ? (
              <MDBTooltip tag='span' title={tooltip}>
                <button onClick={handleOnClick} className={`btn btn-link ${colorbtn} ${disabled}`}>
                  { buttonText }
                </button>
              </MDBTooltip>
            ) : (
              <button onClick={handleOnClick} className={`btn btn-link ${colorbtn} ${disabled}`}>
                { buttonText }
              </button>
            )}         
            
            
          </div>
        )
        : ( <div style={style}></div> )
      )
    )
    : (
      <div style={{ ...style}} className='block'>
        <div style={{ fontSize: '.7em' }}>W trakcie edycji</div>
        <div>{ state.blocked }</div>
      </div>
    )
  )
  : ( <div style={style}></div> )
}

export default GraphDuty
