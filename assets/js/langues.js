$('.flag').on("click",function () {
    var langue = $(this).attr("value");
     $.ajax({
        type: 'POST',
        url: 'changeLocale',
        data: {langue: langue},
        success: function (data) {location.reload();}
            });
})