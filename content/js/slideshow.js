/* Initialize global variables. */
var interval; // interval in ms.
var intervalID;
var autoPlay;
var img;

/* Prepend value to elements from an array. */
function prependValue(value, array1) {
    var array2 = [];
    for(var i = 0; i < array1.length; i++) {
        array2[i] = value + array1[i];
    }
    return array2;
}

/* Append value to elements from an array. */
function appendValue(array1, value) {
    var array2 = [];
    for(var i = 0; i < array1.length; i++) {
        array2[i] = array1[i] + value;
    }
    return array2;
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
    img.current = (img.current + 1) % img.length; // Image number should be in array range.
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
    /* Generate bullets and make the first bullet active. */
    var overlay = document.getElementById('slideshow_overlay');
    var overlayContent = "";
    for(var i = 0; i < img.length; i++) {
        overlayContent += "<li></li>";
    }
    overlay.innerHTML = overlayContent;
    $('#slideshow_overlay li').eq(0).addClass('active_list');
    
    /* Preload white GCW Zero image. */
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
        if (answer.css('display') == 'none') {
            answer.animate({
                height: "toggle",
                opacity: "toggle"
            }, "fast");
        } else {
            answer.animate({
                height: "toggle",
                opacity: "toggle"
            }, "fast");
        }
    });
    
    // Change specifications slideshow image on mouse click
    $('#slideshow').on('click', function() {
        nextImage();
    });
}

/* Return scrollbar height */
function getScrollSizes() {
    // call after document is finished loading
    var el = document.createElement('div');
    el.style.visibility = 'hidden';
    el.style.overflow = 'scroll';
    document.body.appendChild(el);
    //var w = el.offsetWidth-  el.clientWidth;
    var h = el.offsetHeight - el.clientHeight;
    document.body.removeChild(el);
    return h;
}

function getCSSInt(elem, attribute) {
    return parseInt($(elem).css(attribute), 10);
}

/* Switch to an image specified by an img array number. */
function numberImageThumb(number) {
    img.current = number % img.length; // Image number should be in array range.
    if(autoPlay == 1) {
        clearInterval(intervalID);
        switchImageThumb();
        intervalID = setInterval(function() {nextImageSimpleThumb()}, interval);
    } else {
        switchImageThumb();
    }
}

/* Go to the next image in the img array. */
function nextImageSimpleThumb() {
    img.current = (img.current + 1) % img.length; // Image number should be in array range.
    switchImageThumb();
}

/* Execute crossfade of images with a set interval. */
function autoSwitchThumb() {
    autoPlay = 1;
    intervalID = setInterval(function() {nextImageSimpleThumb()}, interval);
}

/* Crossfade between images. Using two buffers and alternating between them. */
function switchImageThumb() {
    if($('.photo2').css("z-index") == 1) {
        $('.photo2 img').prop("src", img_medium[img.current]);
        $('.photo2 .label').get(0).innerHTML = img_description[img.current];
        $('.photo1').animate({opacity: 0}, 800,
        function() {
            $('.photo2').css("z-index", 2);
            $(this).css("z-index", 1);
            $(this).css("opacity", 1);
        });
    } else {
        $('.photo1 img').prop("src", img_medium[img.current]);
        $('.photo1 .label').get(0).innerHTML = img_description[img.current];
        $('.photo2').animate({opacity: 0}, 800,
        function() {
            $('.photo1').css("z-index", 2);
            $(this).css('z-index', 1);
            $(this).css('opacity', 1);
        });
    }
    
    //var leftPosition = $('.thumb').scrollLeft();
    var remainder = (img.current + 1) % 5;
    var modulo = (img.current + 1 - remainder) / 5;
    if(img.current == 0) {
        $('.thumb').animate({
        scrollLeft: 0
        }, 800);
    } else if(remainder == 1) {
        // If the remainder is zero, move the gallery.
        $('.thumb').animate({
        //scrollLeft: leftPosition + (640 * modulo)
        scrollLeft: 640 * modulo
        }, 800);
    }
    
    // Reset thumbnail selection.
    $('.thumb .gallery2 li a').removeClass('selected');
    $('.thumb .gallery2 li').eq(img.current).children("a").addClass('selected');
}

function thumbGallery(img, scrollbar_height) {
    // Generate thumbnail listing and select first thumbnail.
    var img_thumb = appendValue(img, "_thumb.png");
    var thumb = $('.thumb .gallery2');
    var thumbContent = "";
    for(var i = 0; i < img.length; i++) {
        thumbContent += '<li><a><img src="' + img_thumb[i] + '"></a></li>\n';
    }
    var thumb_width = (img.length * 128) + 5;
    var thumb_height = getCSSInt('.thumb', 'height') + getScrollSizes();
    $('.thumb').css('height', thumb_height);
    thumb.get(0).innerHTML = thumbContent;
    $('.thumb .gallery2').css('width', thumb_width);
    $('.thumb .gallery2 li a').eq(0).addClass('selected');
    
    /* Bind onclick to thumbnails to switch to the specified image. */
    $('.thumb .gallery2 li').on('click', function() {
        var index = $(this).index();
        // Check if transition needs to happen (no transition for the same image).
        // TODO: Doesn't appear to set img.current for the frontpage.
        if(img.current != index){
            img.current = index;
            numberImageThumb(index);
        }
    });
    
    /* Disable the interval on mouse enter, resume when moving the cursor out of the thumbnail gallery. */
    $(".thumb").on({
        mouseenter: function () {
            clearInterval(intervalID);
        },
        mouseleave: function () {
            clearInterval(intervalID);
            intervalID = setInterval(function() {nextImageSimpleThumb()}, interval);
        }
    });

    autoSwitchThumb();
}
