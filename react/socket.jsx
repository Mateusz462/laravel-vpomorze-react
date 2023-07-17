// socket.js
import io from 'socket.io-client'

const socket = io.connect('http://localhost:3000')

socket.on("connect", function () {
    console.log("Connect to server.");
    
    // socket.on('get-blocked-duties', () => {
    //     // Pobierz zablokowane dyżury z bazy danych i wyślij je do klienta
    //     //const blockedDuties = getBlockedDutiesFromDatabase()
    //     socket.emit('blocked-duties', blockedDuties)
    // })


    // Nasłuchiwanie na zdarzenie "add-user"
    socket.on("add-user", (userId) => {
        console.log("Received add-user event with userId:", userId);
        // Emitowanie zdarzenia "add-user" z userId
        socket.emit("add-user", userId);
    });

    // Nasłuchiwanie na zdarzenie "update-user"
    socket.on("update-user", (userId) => {
        console.log("Received update-user event with userId:", userId);
        // Emitowanie zdarzenia "update-user" z userId
        socket.emit("update-user", userId);
    });

    // Nasłuchiwanie na zdarzenie "remove-user"
    socket.on("remove-user", (userId) => {
        console.log("Received remove-user event with userId:", userId);
        // Emitowanie zdarzenia "remove-user" z userId
        socket.emit("remove-user", userId);
    });
});

socket.on("disconnect", function () {
    console.log("disconnect from server");
    socket.on('unblock-duty', (req) => {
        // Zablokuj dyżur dla danego użytkownika i daty w bazie danych
        //blockDutyInDatabase(userId, date)
        // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
        let duty = {
            userId: req.userId,
            date: req.date,
            blocked: '0',
        }
        connection.query('REPLACE INTO duties_blocked SET ?', duty, (error, results) => {
            if(error) throw error;

            console.log(results);
            // Emituj zdarzenie "block-duty" z informacją o blokującym użytkowniku do wszystkich klientów
            io.emit(`unblock-duty_${req.userId}_${req.date}`)
        });
       
    })
});
