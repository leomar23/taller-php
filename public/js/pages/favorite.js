$(document).on('click','.favorite-add',function(e){
    e.preventDefault();
    var project_id = $(this).data( "id" );
    var token =  _token;
    var urlf = urlFavorite+"/"+project_id;
    var oID = $(this).attr("id");
    console.log(oID);
    $.ajax({
        //method: 'POST',
        type: 'POST',
        url: urlf,
        headers: {'X-CSRF-TOKEN': token},
        //dataType: 'JSON',
        //data: {_token: token, id: project_id},
        success: function (data) {
            console.log(data);
            if (document.querySelector('#'+oID+' > i').classList.contains('fa-heart-o')){
                document.querySelector('#'+oID+' > i').classList.add('fa-heart');
                document.querySelector('#'+oID+' > i').classList.remove('fa-heart-o');
            }
            else{
                document.querySelector('#'+oID+' > i').classList.add('fa-heart-o');
                document.querySelector('#'+oID+' > i').classList.remove('fa-heart');
            }
        },
        error: function (data) {
            console.log('Error:', data);
        }
    });
    return false;
});

/*function pintarFavorito()
{
    $.ajax({
        type: "POST",
        url: '@Url.Action("esFavorito", "Subasta")',
        data: {
            //"idSubasta": @Model.id,
        },
        success: function (data){
            if(data)
            {
                document.querySelector('#fav > span').classList.add('fa-heart');
                document.querySelector('#fav > span').classList.remove('fa-heart-o');

            }
            else{
                document.querySelector('#fav >span').classList.add('fa-heart-o');
                document.querySelector('#fav >span').classList.remove('fa-heart');
            }
        }
    });
}*/
