redButtonPressed = false;
appRunning = false;

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
        if(kc == VK_RED && !appRunning) {
            $('#redbuttonMsg').hide();
            redButtonPressed = true;
            $('#automatepin').show();
        }
        if(kc == VK_ENTER && redButtonPressed){
            $('#automatepin').hide();
            appRunning = true;
        }
    }, false);
}