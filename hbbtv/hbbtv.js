redButtonPressed = false;
appRunning = false;
videoSelected = false;
fullscreen = true;

function hideRedButton() {
    if(!redButtonPressed){
        $('#redbuttonMsg').hide();
    }
}

function showRedButton() {
    if(!redButtonPressed){
        $('#redbuttonMsg').show();
    }
}

function registerKeyEventListener() {
    document.addEventListener("keydown", function(e) {
        var kc = e.keyCode;
        if(kc == VK_RED) {
            if(appRunning){
                //play video
            }else{
                $('#redbuttonMsg').hide();
                redButtonPressed = true;
                $('#automatepin').show();
            }
        }
        if(kc == VK_YELLOW){
            //pause video
        }
        if(kc == VK_BLUE){
            if(!fullscreen){
                if(videoSelected){
                    fullScreen();
                }else{
                    broadcastFullScreen();
                }
            }else {
                if(videoSelected){
                    outFullScreen();
                }else{
                    broadcastOutFullScreen();
                }
            }
        }
        if(kc == VK_GREEN){
            if(videoSelected){
                stopVideo();
                resumeBroadcast();
            }
        }
        if(kc == VK_ENTER && redButtonPressed){
            $('#automatepin').hide();
            $('#app').show();
            broadcastOutFullScreen();
            appRunning = true;
            fullscreen = false;
        }
    }, false);
}