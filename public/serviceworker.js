var staticCacheName = "pwa-v" + new Date().getTime();
var filesToCache = [
    '/offline',
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

self.addEventListener("activate", event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.filter(cacheName => {
                    return cacheName !== staticCacheName;
                }).map(cacheName => {
                    return caches.delete(cacheName);
                })
            );
        })
    );
});

self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request).then(response => {
            if (response) {
                return response; // Devuelve el recurso almacenado en caché
            }

            // Si no está en caché, realiza la solicitud a la red
            return fetch(event.request)
                .then(networkResponse => {
                    // Clona la respuesta antes de consumirla
                    const clonedNetworkResponse = networkResponse.clone();

                    // Almacena la respuesta en caché para futuras solicitudes
                    /*caches.open(staticCacheName).then(cache => {
                        cache.put(event.request, clonedNetworkResponse);
                    });*/

                    return networkResponse;
                })
                .catch(() => {
                    // Si la solicitud a la red falla (sin conexión), intenta recuperar desde la caché
                    return caches.match(event.request);
                });
        })
    );
});

