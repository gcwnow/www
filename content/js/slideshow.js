/* Initialize global variables. */
var interval; // interval in ms.
var intervalID;
var autoPlay;
var dir;
var img;

/* Append value to elements from an array. */
function appendValue(value, array) {
    for(var i = 0; i < array.length; i++) {
        array[i] = value + array[i];
    }
  	return array;
}

/* Preload (cache) images. */
function preload(img_src) {
    var img_preload = [];
    for(var i = 0; i < img_src.length; i++) {
        img_preload[i] = new Image();
        img_preload[i].src = img_src[i];
    }
}

/* Crossfade between images. Using two buffers and alternating between them. */
function switchImage() {
    if($('.slideshow2').css("z-index") == 1) {
        $('.slideshow2').prop("src", img[img.current]);
        $('.slideshow1').animate({opacity: 0}, 800,
        function() {
            $('.slideshow2').css("z-index", 2);
            $(this).css("z-index", 1);
            $(this).css("opacity", 1);
        });
    } else {
        $('.slideshow1').prop("src", img[img.current]);
        $('.slideshow2').animate({opacity: 0}, 800,
        function() {
            $('.slideshow1').css("z-index", 2);
            $(this).css('z-index', 1);
            $(this).css('opacity', 1);
        });
    }
    // Reset the bullets and select the current the list item with the same index as img.current.
    $('#slideshow_overlay li').removeClass('active_list');
    $('#slideshow_overlay li').eq(img.current).addClass('active_list');
}

/* Go to the next image in the img array. Stop the interval before doing this and restart it afterwards. */
function nextImage() {
    img.current = (img.current+1) % img.length;
    if(autoPlay == 1) {
        clearInterval(intervalID);
        switchImage();
        intervalID = setInterval(function() {nextImageSimple()}, interval);
    } else {
        switchImage();
    }
}

/* Go to the previous image in the img array. Stop the interval before doing this and restart it afterwards. */
function previousImage() {
    if(--img.current < 0) {
        img.current = img.length - 1;
    }
    if(autoPlay == 1) {
        clearInterval(intervalID);
        switchImage();
        intervalID = setInterval(function() {nextImageSimple()}, interval);
    } else {
        switchImage();
    }
}

/* Go to the next image in the img array. */
function nextImageSimple() {
    img.current = (img.current+1) % img.length; // Image number should be in array range.
    switchImage();
}

/* Go to the previous image in the img array. */
function previousImageSimple() {
    if(--img.current < 0) {
        img.current = img.length - 1;
    }
    switchImage();
}

/* Switch to an image specified by an img array number. */
function numberImage(number) {
    img.current = number % img.length; // Image number should be in array range.
    if(autoPlay == 1) {
        clearInterval(intervalID);
        switchImage();
        intervalID = setInterval(function() {nextImageSimple()}, interval);
    } else {
        switchImage();
    }
}

/* Switch to an image specified by an img array number. */
function play() {
    clearInterval(intervalID);
    autoPlay = 1;
    intervalID = setInterval(function() {nextImageSimple()}, interval);
}

/* Switch to an image specified by an img array number. */
function pause() {
    clearInterval(intervalID);
    autoPlay = 0;
}

/* Execute crossfade of images with a set interval. */
function autoSwitch() {
    // Make the second image visible before starting crossfade loop.
    $('.slideshow2').css('opacity', 1);
    autoPlay = 1;
    intervalID = setInterval(function() {nextImageSimple()}, interval);
}

/* Generate list of bullets with click events and other controls. */
function slideshowOverlay() {
    var overlay = document.getElementById('slideshow_overlay');
    var overlayContent = "";
    for(var i = 0; i < img.length; i++) {
        overlayContent += "<li></li>";
    }
    overlay.innerHTML = overlayContent;
    $('#slideshow_overlay li').eq(0).addClass('active_list');
    preload(["../images/x_console_pic_scaled_white.png"]);
   
    /* Bind onclick to li bullets to switch to the specified image. */
    $('#slideshow_overlay li').on('click', function() {
        var index = $(this).index();
        // Check if transition needs to happen (no transition for the same image).
        if(img.current != index){
            numberImage(index);
            $('#slideshow_overlay li').removeClass('active_list');
            $(this).addClass('active_list');
        }
    });
    
    // Bind onclick to all objects in the body containing .play now or in the future.
    $('body').on('click', ".play", function() {
        $(this).animate({opacity: 0.3}, 400,
        function() {
            $(this).removeClass('play');
            play();
            $(this).addClass('pause');
            $(this).get(0).innerHTML = '<div></div><div></div>';
            $(this).animate({opacity: 1}, 400);
       });     
    });

    // Bind onclick to all objects in the body containing .pause now or in the future.    
    $('body').on('click', ".pause", function() {
        $(this).animate({opacity: 0.3}, 400,
        function() {
            $(this).removeClass('pause');
            pause();
            $(this).addClass('play');
            $(this).get(0).innerHTML = '<div></div>';
            $(this).animate({opacity: 1}, 400);
        });
    });
    
    // Model switch (color).
    $('body').on('click', "#model", function() {
        if($('#carousel').attr('class') == 'black') {
            $('#carousel').animate({opacity: 0}, 800,
            function() {
                $('#model').get(0).innerHTML = '<span>B</span>';
                $(this).removeClass('black');
                $(this).addClass('white');
                $(this).animate({opacity: 1}, 800);
            });
        } else if($('#carousel').attr('class') == 'white') {
            $('#carousel').animate({opacity: 0}, 800,
            function() {
                $('#model').get(0).innerHTML = '<span>W</span>';
                $(this).removeClass('white');
                $(this).addClass('black');
                $(this).animate({opacity: 1}, 800);
            });           
        }
    });
}

function loadBaseEvents() {
    // FAQ expanding answers onclick event.
    $('body').on('click', '.faq_question', function() {
        var answer = $(this).parent().children('.faq_answer');
        if(answer.css('display') == 'none') {
            answer.show('fast');
        } else {
            answer.hide('fast');
        }
    });
}
