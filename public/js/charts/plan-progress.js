
 data = $.ajax({
    type: 'POST',
    url: './control/charts/active/progress',
    dataType: 'json'
});

data.done(function(e){
    if($('#progressbar1').length) {
        var bar = new ProgressBar.Circle(progressbar1, {
        color: colors.primary,
        trailColor: colors.light,
        // This has to be the same size as the maximum width to
        // prevent clipping
        strokeWidth: 4,
        trailWidth: 4,
        easing: 'easeInOut',
        duration: 1400,
        text: {
            autoStyleContainer: false
        },
        from: { color: colors.primary, width: 4 },
        to: { color: colors.primary, width: 4 },
        // Set default step function for all animate calls
        step: function(state, circle) {
            circle.path.setAttribute('stroke', state.color);
            circle.path.setAttribute('stroke-width', state.width);

            var value = e;
            if (value === 0) {
            circle.setText('');
            } else {
            circle.setText(value + '%');
            }

        }
        });
        bar.text.style.fontFamily = "'Overpass', sans-serif;";
        bar.text.style.fontSize = '3rem';

        let b = Math.round(e)-1;
        console.log(b)

        bar.animate("."+b);
    }
});
