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