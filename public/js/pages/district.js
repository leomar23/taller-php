$('#country').change(function (e) {
    var id = e.target.value;
    $.get(urlGetProvinces+'/'+id,function (response,country) {
        console.log(response);
        if(response == null || response == ""){
            $('#province').empty();
            //$('select:not(.ms)').selectpicker('refresh');
        }else{
            $('#province').empty();
            $.each(response, function (id, item) {
                $('#province').append("<option value='"+item.id+"'>"+item.name+"</option>");
                //$('select:not(.ms)').selectpicker('refresh');
            });
        }

    });
});

$(document).ready(function () {
    var id = $('#country').val();
    $.get(urlGetProvinces+'/'+id,function (response,country) {
        console.log(response);
        $('#province').empty();
        $.each(response, function (id, item) {
            $('#province').append("<option value='"+item.id+"'>"+item.name+"</option>");
            //$('select:not(.ms)').selectpicker('refresh');
        });
    });
});