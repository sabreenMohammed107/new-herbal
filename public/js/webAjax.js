/********************************************/
/*************** Herbal website ******************************/
/**************************************************/
$('body').on('click', '.gallery-type-id', function () {
    var id = $(this).data("id");

//    $(".active-gallery").removeClass("active-gallery");
    $(".dyamic-gallery").not(this).removeClass("active-gallery");
    $(this).find(".dyamic-gallery").addClass("active-gallery");
//    $("#loading-image").css("display", "block");
    $.ajax({
        type: 'post',
        url: galleryTypeImages,
        data: {
            '_token': $('input[name=_token]').val(),
            id: id
        },
        success: function (msg) {
            
            $(this).find(".dyamic-gallery").addClass("active-gallery");
            $(".gallery_images").html(msg.view);
        },
        error: function (jqXHR, textStatus, errorThrown)
        {

        }
    });
});

$('#webProductSearch').on('keyup', function () {
    var value = $("#webProductSearch").val();
    $.ajax({
        type: 'POST',
        url: webProductSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_web_product_contrent").html(msg.view);
                $(".orginal-search").html("");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".seacrch_web_product_contrent").html("");
            }
        }
    });
});
