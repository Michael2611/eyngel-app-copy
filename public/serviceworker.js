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
    if (event.request.url.includes('/login.blade.php')) {
        event.respondWith(
            caches.match('/app.blade.php').then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request);
            })
        );
    } else {
        event.respondWith(
            fetch(event.request) // Permitir que las solicitudes pasen directamente a la red
                .catch(() => {
                    return caches.match(event.request); // Si hay un error de red, intenta obtenerlo de la caché
                })
        );
    }
});

// Serve from Cache
/*self.addEventListener("fetch", event => {
    console.log("Service Worker: Fetch event");
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                if (response) {
                    return response;
                }
                return fetch(event.request)
                    .then(networkResponse => {
                        if (!networkResponse || networkResponse.status !== 200 || networkResponse.type !== 'basic') {
                            return networkResponse;
                        }
                        const responseToCache = networkResponse.clone();
                        caches.open(staticCacheName)
                            .then(cache => {
                                cache.put(event.request, responseToCache);
                            });
                        return networkResponse;
                    })
                    .catch(() => {
                        return caches.match('/resources/views/vendor/laravelpwa/offline.blade.php');
                    });
            })
    );
});*/
