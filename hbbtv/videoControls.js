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
    rules.style.maxWidth = "inherit";
    rules.style.maxHeight = "inherit";
    rules.style.marginLeft = "inherit";
    rules.style.marginTop = "inherit";
}

function broadcastOutFullScreen() {
    ss = document.styleSheets[1];
    rules = ss.cssRules[0];
    rules.style.maxWidth = "400px";
    rules.style.maxHeight = "225px";
    rules.style.marginLeft = "700px";
    rules.style.marginTop = "100px";
}