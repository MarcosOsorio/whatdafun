// sets the route for front view
$(function() {
    $('#front_view, #full_view').click(function() {
      var id = $('#selected_id').val();
      var color = $('#selected_colour').val();
      var gender = $('#selected_gender').val();
      var type = $('#selected_type').val();
      var thumb_size = $(this).val();
      var cloth_size = $('#selected_cloth_size').val();

      attribute_redirect(id, type, thumb_size, gender, color, cloth_size);
    });
});

// sets the route for male gender
$(function() {
    $('#gender_view').change(function() {
        var id = $('#selected_id').val();
        var color = $('#selected_colour').val();
        var gender = $('#gender_view').val();
        var type = $('#selected_type').val();
        var thumb_size = $('#selected_size').val();
        var cloth_size = $('#selected_cloth_size').val();

        attribute_redirect(id, type, thumb_size, gender, color, cloth_size);
    });
});

$(function() {
    $('#cloth_size_view').change(function() {
        var id = $('#selected_id').val();
        var color = $('#selected_colour').val();
        var gender = $('#gender_view').val();
        var type = $('#selected_type').val();
        var thumb_size = $('#selected_size').val();
        var cloth_size = $(this).val();

        attribute_redirect(id, type, thumb_size, gender, color, cloth_size);
    });
});
/*
$('#colour_spans span').click(function(){
  alert( $('#colour_spans span').index(this));
});
*/

function attribute_redirect(id, type, thumb_size, gender, color, cloth_size)
{
  var route = 'design/detail/'+id+'/'+type+'/'+thumb_size+'/'+gender+'/'+color+'/'+cloth_size;

  //alert (route);
  window.location.href = route;
}
