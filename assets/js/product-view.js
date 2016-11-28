// sets the route for full view
$(function() {
    $('#full_view').click(function() {
        var color = $('#selected_colour').val();
        var route = $(this).val();

        window.location.href = route + color;
    });
});

// sets the route for front view
$(function() {
    $('#front_view').click(function() {
        var color = $('#selected_colour').val();
        var route = $(this).val();

        //alert(route + color);
        window.location.href = route + color;
    });
});

// sets the route for male gender

$('#colour_spans span').click(function(){
  alert( $('#colour_spans span').classname(this));
});
