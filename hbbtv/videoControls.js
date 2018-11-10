function playVideo() {
    $('#video')[0].play();
}

function pauseVideo() {
    $('#video')[0].pause();
}

function stopVideo() {
    $('#video')[0].pause()
    $('#video')[0].currentTime = 0
}

function fullScreen() {
    $('#video').addClass('video-fullscreen').removeClass('video-small');
}

function outFullScreen() {
    $('#video').removeClass('video-fullscreen').addClass('video-small');
}

function stopBroadcast(){
    $("#firetv-background-tv object")[0].volume = 0
}

function resumeBroadcast() {
    $("#firetv-background-tv object")[0].volume = 100
}

function broadcastFullScreen(){
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("width", "100%");
    rules.style.setProperty("height", "100%");
    rules.style.setProperty("right", "auto");
    rules.style.setProperty("top", "0px");
    rules.style.setProperty("left", "0px");
}

function broadcastOutFullScreen() {
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.setProperty("width", "400px", "important");
    rules.style.setProperty("height", "225px", "important");
    rules.style.setProperty("right", "200px", "important");
    rules.style.setProperty("top", "100px", "important");
    rules.style.setProperty("left", "auto", "important");
}