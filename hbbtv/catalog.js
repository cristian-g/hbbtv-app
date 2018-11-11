var videos;
var mapVideos;

$(document).ready(function () {
    'use strict';

    var $el = $('#actionsList'),
        actions = $el.find('.actionsList__actionbar'),
        list    = $el.find('.actionsList__group');

    // Attach selectonic
    list
        .selectonic({
            multi: true,
            keyboard: false,
            focusBlur: false,
            loop: true,
            selectionBlur: false,


            // Before any changes
            before: function(e) {
                if (e.target === actions[0] || $(e.target).is('button.actionsList__button')) {
                    this.selectonic('cancel');
                }
            },


            // When one or more items selectes
            select: function() {
                toggleActions(false);
                this.selectonic('option', 'keyboard', true);
            },


            // When all items clears selection
            unselectAll: function() { toggleActions(true); }
        });

    $el
        .on('focusin', onFocusin)
        .on('focusout', onFocusout);


    actions.on('click', 'button', function() {
        // Get selected items from list
        doAction( list.selectonic('getSelected') );
    });


    function onFocusin () {
        list.selectonic('option', 'keyboard', true);
        $el.addClass('focused');
    }


    function onFocusout () {
        list.selectonic('option', 'keyboard', false);
        $el.removeClass('focused');
    }


    function toggleActions (state) {
        if (state === void 0) {
            actions.toggleClass('disabled');
        } else {
            actions.toggleClass( 'disabled', state );
        }
    }


    function doAction (items) {
        items.each(function(index, el) {
            var $el = $(el);
            $el.addClass('animate');
            setTimeout(function() {
                $el.removeClass('animate');
            }, 300);
        });
    }


    toggleActions(true);







    $.ajax({

        url: 'http://hbbtvapp.test/api/videos',
        method: "GET",
        dataType: "json",

        success: function(response) {

            videos = response.videos;
            mapVideos = new Map(videos.map(obj => [ obj.id, obj ]));

            jQuery.each(response.videos, function(index, value){
                console.log(value);
                $("#ul-videos").append('<li class="actionsList__option" data-video-id="' + value.id + '">' + value.title + '<br />' + value.director + '<br /><span class="views-counter"> ' + value.views + '</span></li>');
            });


            list.selectonic("focus", 0); //first element in the list


            $('#first-item').click();$('#first-item').focus();

            $('#actionsList').click();$('#actionsList').focus();
            $('.actionsList__group').click();$('.actionsList__group').focus();
        },

        error: function(error, status) {

            console.log(error, status);

        }

    });


    $('html').keydown(function (e){
        if(e.keyCode == 13){
            var video = mapVideos.get($($('#ul-videos').selectonic("focus")).data('video-id'));
            console.log(video);

            $('#connected-users').html('<ul id="connected-users-list"></ul>');
            jQuery.each(video.users, function(index, value) {
                $('#connected-users-list').append('<li>' + value.name + '</li>');
            });

            $('#video-info').html(video.description + '<br />Cast: ' + video.cast + '<br />' + video.minutes + ' minutes');

            showVideo(video.source);
            incrementViews(video.id);
        }
    })
});

function incrementViews(videoId) {
    var video = mapVideos.get(videoId);
    video.views = video.views + 1;
    mapVideos.set(videoId, video);
    $('li[data-video-id="' + videoId + '"]').find('.views-counter').html(video.views);

    var request = new XMLHttpRequest();
    request.open('PATCH', 'http://hbbtvapp.test/api/videos/view/' + videoId, false);
    request.setRequestHeader("Content-type", "application/json");
    request.send('{"isActive": 1}');
}