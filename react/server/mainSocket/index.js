const express = require('express')
const app = express();

let mysql = require('mysql');
let connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'laravel-vpomorze'
    //database: 'hcxeyhrwp'
    
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

    // Listen for the "shoutbox:handshake" event
    socket.on('shoutbox:handshake', () => {
        console.log('User handshaking')
        connection.query('SELECT * FROM users WHERE id = 1 LIMIT 1', (error, resultsUsers) => {
            if(error) throw error;
            //console.log(resultsUsers);
            // Get the current shoutbox data from the database
            connection.query('SELECT * FROM shoutbox', (error, results, fields) => {
                if (error) throw error;

                // Emit a "shoutbox:refresh" event with the shoutbox data to the client
                socket.emit('shoutbox:refresh', {
                    payload: {
                        user: resultsUsers[0],
                        messages: results.map((msg) => ({
                            uuid: msg.uuid,
                            message: msg.message,
                            time: msg.time,
                            owner: {
                                user: resultsUsers[0],
                                you: true
                            },
                            hidden: false
                        })),
                        maintenance: {
                            toggle: false,
                            message: 'Przerwa Techniczna'
                        }
                    }
                })
            })
            
        })
    })

    // Listen for the "shoutbox:send-message" event
    socket.on('shoutbox:send-message', (message, callback) => {
        console.log('User sent a message: ' + message)

        // Save the new message to the database
        connection.query('INSERT INTO shoutbox SET ?', {
            uuid: 'some-uuid',
            message: message,
            time: Math.floor(Date.now() / 1000)
        }, (error, results, fields) => {
            if (error) {
                console.log('Error saving the message: ' + error.message)
                callback(error.message)
            } else {
                console.log('Message saved successfully')

                // Emit a "shoutbox:refresh-modify" event to all connected clients
                io.emit('shoutbox:refresh-modify')

                // Call the callback without any arguments to indicate success
                callback()
            }
        })
    })

    // Listen for the "shoutbox:refresh-modify" event
    socket.on('shoutbox:refresh-modify', () => {
        console.log('Refreshing shoutbox for all users')
        connection.query('SELECT * FROM users WHERE id = 6', (error, resultsUsers) => {
            if(error) throw error;
            //console.log(resultsUsers);
            // Get the current shoutbox data from the database
            connection.query('SELECT * FROM shoutbox', (error, results, fields) => {
                if (error) throw error;

                // Emit a "shoutbox:refresh" event with the shoutbox data to all connected clients
                socket.emit('shoutbox:refresh', {
                    payload: {
                        user: resultsUsers[0],
                        messages: results.map((msg) => ({
                            uuid: msg.uuid,
                            message: msg.message,
                            time: msg.time,
                            owner: {
                                you: false
                            },
                            hidden: false
                        })),
                        
                    }
                })
            })
        })
    })


    socket.on('disconnect', (socket) => {
        console.log("disconnect");
        
    })
});
