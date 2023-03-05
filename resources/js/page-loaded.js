const { update } = require("lodash");

$(function() {
    var bar = new ProgressBar.Line(container, {
        strokeWidth: 4,
        easing: 'easeInOut',
        duration: 1400,
        color: '#664DEC',
        trailColor: '#eee',
        trailWidth: 1,
        svgStyle: {width: '100%', height: '50%'},
        text: {
            style: {
                // Text color.
                // Default: same as stroke color (options.color)
                color: '#664DEC',
                padding: 0,
                margin: 0,
                'text-align': 'center',
                transform: null
            },
            autoStyleContainer: false
        },
        from: {color: '#FFEA82'},
        to: {color: '#ED6A5A'},
        step: (state, bar) => {
          bar.setText(Math.round(bar.value() * 100) + ' %');
        }
    });

    var imgLoad = imagesLoaded('body');
    var imgTotal = imgLoad.images.length;
    var imgCurrent = 0;

    imgLoad.on('progress', function() {
        imgCurrent++;
        bar.animate(imgCurrent/imgTotal);
    });
});

$(window).on('load', function() {
    if (window.name != "first_loaded") {
        setTimeout(function() {
            $('#container').delay(1000).fadeOut();
            $('#img-loaded').delay(1200).fadeIn();
            $('.progress-container').delay(1800).fadeOut();
        }, 1000);
        window.name = "first_loaded";
    } else {
        setTimeout(function() {
            $('#container').delay(1000).fadeOut();
            $('.progress-container').delay(1200).fadeOut();
        }, 1000);
    }
});