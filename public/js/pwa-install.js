document.addEventListener('DOMContentLoaded', () => {
    const isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    const installButton = document.getElementById('install-button');
    const closeButton = document.getElementById('close-button');
    const popup = document.querySelector('.popup');
    const iosPopup = document.getElementById('ios-popup');
    const iosCloseButton = document.getElementById('ios-close-button');
    
    if (window.matchMedia('(display-mode: standalone)').matches) {
        installButton.style.display = 'none';
        closeButton.style.display = 'none';
        popup.style.display = 'none';
    } else if (isIOS) {
        installButton.style.display = 'none';
        closeButton.style.display = 'none';
        popup.style.display = 'none';
        iosPopup.style.display = 'block';
        iosCloseButton.addEventListener('click', () => {
            iosPopup.style.display = 'none';
        });

    } else {
        installButton.addEventListener('click', () => {
            console.log('Install the PWA');    
            if (deferredPrompt) {
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('User accepted the install prompt');
                    } else {
                        console.log('User dismissed the install prompt');
                    }
                    deferredPrompt = null;
                });
            }
        });
        closeButton.addEventListener('click', () => {
            popup.style.display = 'none';
        });
        let deferredPrompt;
        window.addEventListener('beforeinstallprompt', (event) => {
            event.preventDefault();
            deferredPrompt = event;
            installButton.style.display = 'block';
        });
    }
});