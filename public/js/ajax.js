/********************************************/
/*************** customer review ******************************/
/**************************************************/
$('body').on('click', '.customer_review-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: customerReviewDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#customer_review_search').on('keyup', function () {
    var value = $("#customer_review_search").val();
    $.ajax({
        type: 'POST',
        url: customerReviewSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_customer_review_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_customer_review_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** about ******************************/
/**************************************************/
$('body').on('click', '.about-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: aboutDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#about_search').on('keyup', function () {
    var value = $("#about_search").val();
    $.ajax({
        type: 'POST',
        url: aboutSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_about_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_about_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** Gallery Type ******************************/
/**************************************************/
$('body').on('click', '.gallery_type-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: galleryTypeDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#gallery_type_search').on('keyup', function () {
    var value = $("#gallery_type_search").val();
    $.ajax({
        type: 'POST',
        url: galleryTypeSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_gallery_type_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_gallery_type_contrent").html("");
            }
        }
    });
});
$('body').on('click', '.gallery-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: galaryDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id
        },
        success: function (msg) {
//            alert("sucess to delete");
//            console.log("id" + msg.id);
            $(".galleryTable tr").each(function () {
                console.log($(this).attr("class"));
                if ($(this).attr("class") == msg.id)
                {
                    $(this).remove();
                }
            });
        }
    });
});
/********************************************/
/*************** about achievement ******************************/
/**************************************************/
$('body').on('click', '.aboutAchievements-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: aboutAchievementDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#aboutAchievements_search').on('keyup', function () {
    var value = $("#aboutAchievements_search").val();
    $.ajax({
        type: 'POST',
        url: aboutAchievementSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_aboutAchievements_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_aboutAchievements_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** certification ******************************/
/**************************************************/
$('body').on('click', '.certification-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: certificationDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#certification_search').on('keyup', function () {
    var value = $("#certification_search").val();
    $.ajax({
        type: 'POST',
        url: certificationSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_certification_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_certification_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** Useful Category ******************************/
/**************************************************/
$('body').on('click', '.usefulCategory-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: UsefulCategoryDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#usefulCategory_search').on('keyup', function () {
    var value = $("#usefulCategory_search").val();
    $.ajax({
        type: 'POST',
        url: UsefulCategorySearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_usefulCategory_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_usefulCategory_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** Useful Link ******************************/
/**************************************************/
$('body').on('click', '.usefulLink-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: UsefulLinkDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#usefulLink_search').on('keyup', function () {
    var value = $("#usefulLink_search").val();
    $.ajax({
        type: 'POST',
        url: UsefulLinkSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_usefulLink_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_usefulLink_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** Contact ******************************/
/**************************************************/
$('body').on('click', '.contact-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: contactDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#contact_search').on('keyup', function () {
    var value = $("#contact_search").val();
    $.ajax({
        type: 'POST',
        url: contactSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_contact_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_contact_contrent").html("");
            }
        }
    });
});
/******************** contact******************************/
$('body').on('click', '#add-contact-value', function () {
    $.ajax({
        type: 'post',
        url: contactValues,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (msg) {
            $(".contact-values tbody").append(msg);
        }
    });
});
$('body').on('click', '.contact-value-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: contactValueDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
/********************************************/
/*************** News ******************************/
/**************************************************/
$('body').on('click', '.news-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: newsDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#news_search').on('keyup', function () {
    var value = $("#news_search").val();
    $.ajax({
        type: 'POST',
        url: newsSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_new_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_new_contrent").html("");
            }
        }
    });
});
/******************** news ******************************/
$('body').on('click', '#add-new-value', function () {
    $.ajax({
        type: 'post',
        url: newsValues,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (msg) {
            $(".news-values tbody").append(msg);
        }
    });
});
$('body').on('click', '.news-point-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: newsPointsDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
/********************************************/
/*************** product categories ******************************/
/**************************************************/
$('body').on('click', '.productCategory-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: productCategoryDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#productCategory_search').on('keyup', function () {
    var value = $("#productCategory_search").val();
    $.ajax({
        type: 'POST',
        url: productCategorySearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_productCategory_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_productCategory_contrent").html("");
            }
        }
    });
});
/********************************************/
/*************** product ******************************/
/**************************************************/
$('body').on('click', '.product-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: productDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('#product_search').on('keyup', function () {
    var value = $("#product_search").val();
    $.ajax({
        type: 'POST',
        url: productSearch,
        data: {
            '_token': $('input[name=_token]').val(),
            value: value
        },
        success: function (msg) {
            if (msg.flag == 0)
            {
                $(".seacrch_product_contrent").html(msg.view);
                $(".orginal-search").css("display", "none");
                $(".found").css("display", "none");
            }
            else if (msg.flag == 1)
            {
                $(".orginal-search").css("display", "block");
                $(".found").css("display", "inline-block");
                $(".seacrch_product_contrent").html("");
            }
        }
    });
});
/******************** product sheets ******************************/
$('body').on('click', '#add-product-sheet', function () {
    $.ajax({
        type: 'post',
        url: productSheets,
        data: {
            '_token': $('input[name=_token]').val(),
        },
        success: function (msg) {
            $(".product-sheets tbody").append(msg);
        }
    });
});
$('body').on('click', '.product-sheet-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: productSheetsDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});
$('body').on('click', '.deleteItem', function () {
    $(this).parents('tr').remove();
});
$('body').on('click', '.product-image-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: productImageDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id
        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});

/********************************************/
/***************slider image ******************************/
/**************************************************/
$('body').on('click', '.slider-Image-delete', function () {
    var id = $(this).data("id");
    $.ajax({
        type: 'post',
        url: sliderImageDelete,
        data: {
            '_method': 'delete',
            '_token': $('input[name=_token]').val(),
            id: id

        },
        success: function () {
            location.reload();
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            if (jqXHR.status === 500)
            {
                alert("Some Thing Went Wrong (لقد حدث خطا ما )");
            }
        }
    });
});