$(function() {
    $('#default_address').change(function() {
        this.form.submit();
    });
});

$(function() {
    $('#set_active_address').click(function() {
        this.form.submit();
    });
});

$(function() {
    $('#make_address_editable').click(function() {
        $('#full_address_fieldset').prop('disabled',false)
    });
});

$(function(){
    $("#new_region").change(function() {
      $("#new_commune").load("account/fetch_communes/" + $("#new_region").val());
    });
});
