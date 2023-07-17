// import React from 'react'
//import ReactDOM from 'react-dom/client'
// import App from './App'
// import './index.css'
//
// ReactDOM.createRoot(document.getElementById('root')).render(
//   <React.StrictMode>
//     <App />
//   </React.StrictMode>,
// )


import React from 'react'
import ReactDOM from 'react-dom/client';

import Graph from './Graph'
//import ControlRoom from './ControlRoom'
//import Notifications from './Notifications'
import Shoutbox from './Shoutbox'

const renderers = {
  'vztm-graph': <Graph />,
//  'vztm-control-room': <ControlRoom />,
//  'vztm-notifications': <Notifications />,
  'vztm-shoutbox': <Shoutbox />,
}

Object.keys(renderers).forEach((renderer) => {
  if (document.getElementById(renderer))
  ReactDOM.createRoot(document.getElementById(renderer)).render(
    renderers[renderer]
  );
})
