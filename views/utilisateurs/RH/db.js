// db.js (connexion à la base de données)
const mysql = require('mysql2');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'salarie_gestion'
});

connection.connect((err) => {
    if (err) throw err;
    console.log('Connected to MySQL Database');
});

module.exports = connection;
