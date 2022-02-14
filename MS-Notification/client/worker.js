console.log('ServiceW Loaded...');

self.addEventListener('push', e => {
    const data = e.data.json();
    console.log('Push received');
    self.registration.showNotification(data.title, {
        body: 'Abonnement réussi',
        icon: ''
    });
})