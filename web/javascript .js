$("Document").ready(function ()
{
    $("#jkl").keyup(function ()
    {
        if ($(this).val().length > 0)
        {
            $("#fgh").empty();
            $.ajax
            (
                {
                    type: 'get',
                    url: 'http://localhost/PIDEV-sant-et-bien-tre/web/app_dev.php/shop/ShopJSON/' + $(this).val(),
                    async: false,
                    beforeSend:function ()
                    {
                        console.log('ok');
                    },
                    success:function(response)
                    {
                        $.each(response, function(a,b) {
                            $.each(b, function (c, d) {
                                    $("#fgh").append
                                    (
                                        "<li class='col-md-4'>" + "<figure>" + "<a href='http://localhost/PIDEV-sant-et-bien-tre/web/app_dev.php/shop/AfficherDetail/" + d.id + "'>" + "<img src='/PIDEV-sant-et-bien-tre/web/img/" + d.image + "'" + "alt=\"\" style=\"width: 360px; height: 300px\">" +
                                        "<span><i class=\"fa fa-link\"></i><small></small></span></a></figure>" +
                                        "<div class=\"careplus-shop-grid-text\">" +
                                        "<h5>" + "<a href='http://localhost/PIDEV-sant-et-bien-tre/web/app_dev.php/shop/AfficherDetail/" + d.id + "'>" + d.titre + "</a>" + "</h5>" +
                                        "<span>" + d.prix + " DT</span>" +
                                        "<p></p>" +
                                        "<p>" + d.region + "</p>" +
                                        "<a class=\"careplus-readmore-btn\">" + "Détails" + "<span></span>" + "</a>" +
                                        "</div>" + "</li>"
                                    );
                                    console.log();
                                }
                            );
                        });
                    }
                }
            )
        }
    });
});
