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

const port = 3000;

server.listen({port}, () => {
    console.log("Server is running. Port: "+port);
    connection.connect();
});

const io = require('socket.io')(server, {
    cors: { origin: "http://localhost:8000"}
});

io.on('connection', (socket) => {
    console.log('connection');
    socket.on('get-blocked-duties', () => {
        // Pobierz zablokowane dyżury z bazy danych i wyślij je do klienta
        connection.query('SELECT * FROM duties_blocked', (error, results) => {
            if(error) throw error;

            console.log(results.length);
            for (var i = 0; i < results.length; i++) {
                if(results[i].blocked == 1){
                    
                    io.emit(`block-duty_${results[i].userId}_${results[i].date}`, results[i].user)
                } else {
                    socket.emit(`unblock-duty_${results[i].userId}_${results[i].date}`)
                    socket.emit(`update-duty_${results[i].userId}_${results[i].date}`)
                    connection.query('DELETE FROM duties_blocked WHERE blocked = 0', (error, results) => {
                        if(error) throw error;
                        console.log(results);
                    });
                }
            }
        });
    })

    socket.on('block-duty', (req) => {
        // Zablokuj dyżur dla danego użytkownika i daty w bazie danych
        //blockDutyInDatabase(userId, date)
        let duty = {
            userId: req.userId,
            user: req.user,
            date: req.date,
            blocked: '1',
        }
        connection.query('REPLACE INTO duties_blocked SET ?', duty, (error, results) => {
            if(error) throw error;

            console.log(results);
            // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
            io.emit(`block-duty_${req.userId}_${req.date}`, req.user)
        });
    })

    socket.on('unblock-duty', (req) => {
        // Zablokuj dyżur dla danego użytkownika i daty w bazie danych
        //blockDutyInDatabase(userId, date)
        // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
        let duty = {
            userId: req.userId,
            date: req.date,
            blocked: '1',
        }
        const sql = `DELETE FROM duties_blocked WHERE userId = ? AND date = ? AND blocked = ?`;
        const values = [duty.userId, duty.date, duty.blocked];
        connection.query(sql, values, (error, results) => {
            if(error) throw error;

            console.log(results);
            // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
            io.emit(`unblock-duty_${req.userId}_${req.date}`)
        });
       
    })

    socket.on('update-duty', (req) => {
        // Zablokuj dyżur dla danego użytkownika i daty w bazie danych
        //blockDutyInDatabase(userId, date)
        // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
        
        io.emit('get-blocked-duties')
        
       
    })
    
    

    socket.on('shoutbox:handshake', () => {
        // Tutaj można wysłać odpowiedź na żądanie lub wykonać jakieś inne akcje
    })

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
    socket.on('disconnect', (socket) => {
        console.log("disconnect");
        
    })
});
