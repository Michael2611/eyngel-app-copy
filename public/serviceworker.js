self.addEventListener('push', function (event) {
    const options = {
        body: event.data.text(),
        icon: 'images/icons/logo-eyngel.png', // Ruta a tu icono de notificación
        badge: 'images/icons/logo-eyngel.png', // Ruta a tu badge de notificación
    };

    event.waitUntil(
        self.registration.showNotification('Título de la Notificación', options)
    );
});