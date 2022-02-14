const publicVapidKey = 'BIloGqCcAHtfK72fPuawOF-2k1MKKbylktcMZ0c1yHXV62Pw6hkm3qMVWwhq7Znr-gEQ9ZHqIPuADhghB0HrcY8';

// check ServiceW

if('serviceWorker' in navigator) {
    send().catch(err => console.error(err));
}

// Register SW, Register 
async function send() {
    // Register SW
    console.log('Registering SW...')
    const register = await navigator.serviceWorker.register('/worker.js', {
        scope: '/'
    });
    console.log('ServiceW registered...')

    // Register Push
    console.log('Registering Push...')
    const subscription = await register.pushManager.subscribe({
        userVisibleOnly: true,
        applicationServerKey: publicVapidKey
    });
    console.log('Push registered...')

    // Send Push Notification
    console.log('Sending push...')
    await fetch('/subscribe', {
        method: 'POST',
        body: JSON.stringify(subscription),
        headers: {
            'content-type': 'application/json'
        }
    });
    console.log('Push Set...')
}