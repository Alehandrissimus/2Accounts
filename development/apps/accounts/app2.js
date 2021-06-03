const mysql = require('mysql');


const conn = mysql.createConnection({
    host:"mysql",
    user:"root",
    database:"core",
    password:"ТУТ_ГОЛОВНИЙ_ПАРОЛЬ_БД"
});


conn.connect(function (err) {
    if (err) {
        console.log(err)
        return console.error("Ошибка: " + err.message);
    }
    else {
        console.log("Подключение к серверу MySQL успешно установлено");
    }
});


//20.52.26.123