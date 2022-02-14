const express = require('express');
const webpush = require('web-push');
const bodyParser = require('body-parser');
const path = require('path');

const app = express();

// Set static path
app.use(express.static(path.join(__dirname, 'client')))

app.use(bodyParser.json());

const publicVapidKey = 'BIloGqCcAHtfK72fPuawOF-2k1MKKbylktcMZ0c1yHXV62Pw6hkm3qMVWwhq7Znr-gEQ9ZHqIPuADhghB0HrcY8';
const privateVapidKey = '1wJWWQXoapTWf9DbpeYW4Pndcf898xe6QVUywJSsO9c';

webpush.setVapidDetails('mailto:test@swapit.com', publicVapidKey, privateVapidKey);

// Subscribtion Routes
app.post('/subscribe', (req, res) => {
    const subscription = req.body;

    // Send 201
    res.status(201).json({});

    // Payload
    const payload = JSON.stringify({title: 'Push Notification Swapit'})

    // Pass object into SendNotification
    webpush.sendNotification(subscription, payload).catch(err => console.error(err))
});

const port = 8000;
app.listen(port, () => console.log('listening on port ' + port));