// server.js
const express = require('express');
const bcrypt = require('bcryptjs');
const jwt = require('jsonwebtoken');
const db = require('./db');

const app = express();
app.use(express.json());

// Middleware d'authentification
const authenticateToken = (req, res, next) => {
    const token = req.headers['authorization'];
    if (!token) return res.sendStatus(403);

    jwt.verify(token, 'SECRET_KEY', (err, user) => {
        if (err) return res.sendStatus(403);
        req.user = user;
        next();
    });
};

// Route d'inscription des employés par RH
app.post('/utilisateurs', authenticateToken, (req, res) => {
    const { username, password } = req.body;
    const departement = req.user.departement;

    if (req.user.role !== 'RH') {
        return res.status(403).send('Permission denied');
    }

    const sql = 'INSERT INTO utilisateurs (username, password, departement) VALUES (?, ?, ?)';
    db.query(sql, [username, password, departement], (err, result) => {
        if (err) return res.status(500).send('Error creating employee');
        res.send('Employee added successfully');
    });
});

// Route de connexion (RH ou Admin)
app.post('/login', (req, res) => {
    const { username, password } = req.body;

    const sql = 'SELECT * FROM utilisateurs WHERE username = ?';
    db.query(sql, [username], (err, results) => {
        if (err || results.length === 0) return res.status(400).send('Invalid credentials');

        const user = results[0];
        bcrypt.compare(password, user.password, (err, match) => {
            if (!match) return res.status(400).send('Invalid credentials');

            const token = jwt.sign({
                id: user.id,
                role: user.role,
                departement: user.departement
            }, 'SECRET_KEY');

            res.json({ token });
        });
    });
});

// Serveur écoute sur le port 3000
app.listen(3000, () => {
    console.log('Server running on port 3000');
});
