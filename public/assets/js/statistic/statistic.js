$(document).ready(function () {
    url1=$('#statisticBlogs').data('url');
    $.ajax({
        type: "GET",
        url: url1,
        success: function (response) {

            $('#affichageNombreBlogs').text(response.nombreBlogs)
        }
    });
    url2=$('#statisticUsers').data('url');
    $.ajax({
        type: "GET",
        url: url2,
        success: function (response) {

            $('#affichageNombreUsers').text(response.nombreUsers)
        }
    });
});