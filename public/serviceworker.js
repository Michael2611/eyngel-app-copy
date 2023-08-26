var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/resource/views/vendor/laravelpwa/offline.blade.php',
    '/css/app.css',
    '/js/app.js',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',
];

self.addEventListener("install", event => {
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
            .catch(error => {
                console.error('Error al cachear recursos:', error);
            })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
    );
});

self.addEventListener('activate', event => {
    event.waitUntil(
        clients.matchAll({ type: 'window' }).then(windowClients => {
            return fetch('/check-auth')
                .then(response => response.json())
                .then(data => {
                    if (data.authenticated) {
                        for (const client of windowClients) {
                            if (client.url === self.location.origin + '/app.blade.php' && 'focus' in client) {
                                return client.focus();
                            }
                        }
                    } else {
                        return clients.openWindow(self.location.origin + '/app.blade.php');
                    }
                })
                .catch(error => {
                    console.error('Error al verificar la autenticación:', error);
                });
        })
    );
});