function appendValue(value, array) {
    for (var i = 0; i < array.length; i++) {
        array[i] = value + array[i];
    }
  	return array;
}

function switchImage(img) {
    if ($('.slideshow2').css("z-index") == 1) {
        $('.slideshow1').fadeOut(
        function() {
            this.src = img[img.current];
            $('.slideshow2').css("z-index", 2);
            $('.slideshow1').css("z-index", 1);
            $('.slideshow1').show();
        });
    } else {
        $('.slideshow2').fadeOut(
        function() {
            this.src = img[img.current];
            $('.slideshow1').css("z-index", 2);
            $('.slideshow2').css("z-index", 1);
            $('.slideshow2').show();
        });
    }   
}

function nextImage(img) {
    img.current = (img.current+1) % img.length;
    switchImage(img);
}
function previousImage(img) {
    if (--img.current < 0) {
        img.current = img.length - 1;
    }
    switchImage(img.current);
}

function autoSwitch(img, interval) {
    window.setInterval(function() {nextImage(img)}, interval);
}
