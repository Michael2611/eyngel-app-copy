(function() {
    var isIOS = /iPad|iPhone|iPod/.test(navigator.userAgent);
    var hasBeenAddedToHomeScreen = window.navigator.standalone;

    if (isIOS && !hasBeenAddedToHomeScreen) {
        document.getElementById('ios-message').style.display = 'block';
    }
})();