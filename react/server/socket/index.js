const express = require('express')
const app = express();

let mysql = require('mysql');
let connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'laravel-vpomorze'
});

const server = require('http').createServer(app);

const port = 3001;

server.listen({port}, () => {
    console.log("Server is running. Port: "+port);
    connection.connect();
});

const io = require('socket.io')(server, {
    cors: { origin: "http://localhost:8000"}
});

io.on('connection', (socket) => {
    console.log(`⚡: ${socket.id} user just connected!`);

    // Add a user to a room
    // socket.on('shoutbox:handshake', () => {
    //     let room = "room";
    //     let asdasd = "asdasd"; // Data sent from client when join_room event emitted
    //     //socket.join(room); // Join the user to a socket room

    //     // Add this
    //     let __createdtime__ = Date.now(); // Current timestamp
    //     // Send message to all users currently in the room, apart from the user that just joined
    //     socket.emit('shoutbox:refresh', {
    //         messages: {
    //             user: `${socket.id} has joined the chat room`,
    //         },
    //         username: "username",
    //         __createdtime__,
    //     });
    // });

    // socket.on('shoutbox:handshake', () => {
    //     // Tutaj można wysłać odpowiedź na żądanie lub wykonać jakieś inne akcje
    //     let newData = 'adsadds'
    //     io.emit('shoutbox:refresh', { payload: newData })
    // })

    // Przyjmowanie żądań na endpoint "shoutbox:send-message"
    socket.on('shoutbox:send-message', (message, callback) => {
        // Tutaj można wykonać jakieś akcje związane z wysłaniem wiadomości, np. zapisanie jej do bazy danych
        // Następnie można wywołać callback z odpowiedzią, np. true dla powodzenia lub komunikat o błędzie w przypadku niepowodzenia
    })

    // Przyjmowanie żądań na endpoint "shoutbox:refresh-modify"
    socket.on('shoutbox:refresh-modify', () => {
        // Tutaj można wykonać jakieś akcje związane z odświeżeniem lub modyfikacją danych, np. pobranie nowych wiadomości z bazy danych
        // Następnie można wysłać nowe dane do wszystkich połączonych klientów za pomocą emitowania zdarzenia "shoutbox:refresh"
        io.emit('shoutbox:refresh', { payload: newData })
    })


    //socket.on(`block-duty_${userId}_${content.date}`, )
    // socket.on(`block-duty_${userId}_${content.date}`, (obj) => {
    //      socket.emit('block-duty_'+obj.user, obj.message)
    // })
    socket.on('disconnect', () => {
        console.log('🔥: A user disconnected');
    });
});
