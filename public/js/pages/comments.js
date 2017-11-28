//$(document).ready( function($) {
$("#comment").on("submit", function(event){
    event.preventDefault();
    var formData = $(this).serialize();
    var list = $("#list-comment");

    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : urlCreateComment, // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        //headers     : {'X-CSRF-TOKEN': token},
        encode      : true,
        success:  function(data){
            console.log(data);
            list.html('');
            var result = "";
            $.each(data.data, function (id, item) {
                result +='<div class="media"><div class="media-left"><a href="#">'
                result +='<img class="media-object img-circle" style="width: 50px;height: 50px;"  src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcTJSZs2h9BmwEdiJkijpLhGI63WogY4EonDtWyALe58HG8f-H13jcCyOj0" alt="..."></a></div>'
                result +='<div class="media-body"><h4 class="media-heading">'+item.user.name+' - <small>'+item.created_at+'</small></h4>'+item.comments+'</div></div>'
            });
            //list.append(result);
            document.getElementById("comments").value = '';
            list.html(result);
        },
        error:  function (data){
            console.log(data);
        }
    });
    return
});

function ToJavaScriptDate(value) {
    var pattern = /Date\(([^)]+)\)/;
    var results = pattern.exec(value);
    var dt = new Date(parseFloat(results[1]));
    return dt.getDate() + "/" + (dt.getMonth() + 1) + "/" + dt.getFullYear();
}
//});