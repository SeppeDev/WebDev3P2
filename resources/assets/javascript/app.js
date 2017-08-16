$(document).ready(function(){
    console.log("gg");

    $('.carousel.carousel-slider').carousel({full_width: true});

    $('.sidebar-nav > li.category').hover(
        function(){ $(this).removeClass('white-animals') },
        function(){ $(this).addClass('white-animals') }
    );

    $('.collapsible').collapsible();

    $('select').material_select();

    var slider = document.getElementById('test-slider');
        noUiSlider.create(slider, {
        start: [0, 499],
        connect: true,
        step: 1,
        orientation: 'horizontal', // 'horizontal' or 'vertical'
        tooltips: true,
        range: {
            'min': 0,
            'max': 499
        },
        format: wNumb({
            decimals: 0
        })
    });

    var valuesDivs = [
        document.getElementById('min-price'),
        document.getElementById('max-price'),
    ];

    // When the slider value changes, update the input and span
    slider.noUiSlider.on('update', function( values, handle ) {
        valuesDivs[handle].value = values[handle];
    });

    // When the inputfield value changes, update the slider
    $('#min-price').on('input', function(){
        slider.noUiSlider.set([document.getElementById('min-price').value, null]);
    });
    $('#max-price').on('input', function(){
        slider.noUiSlider.set([null, document.getElementById('max-price').value]);
    });
});