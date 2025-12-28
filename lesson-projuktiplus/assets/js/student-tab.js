jQuery(document).ready(function ($) {

    $(".sidebar-menu-tabs-items li[data-sidetab]").on("click", function () {

        const tab = $(this).data("sidetab");
        //? Nonce create in html
        // const nonce = $(this).data("nonce");

        $(".sidebar-menu-tabs-items li").removeClass("active-menu");
        $(this).addClass("active-menu");

        $(".student-sidebar-tab").removeClass("student-active");
        $("#" + tab).addClass("student-active");

        $.ajax({
            url: studentDashboard.ajaxurl,
            type: "POST",
            data: {
                action: "sidebar_menu_ajax_action",
                //? nonce from enqueue wp_localize
                nonce: studentDashboard.nonce,
                tab: tab
            },
            beforeSend: function () {
                $("#" + tab).empty();
                $("#" + tab).html('<p class="loading">Loading...</p>');
            },
            success: function (response) {
                if (response.success) {
                    $("#" + tab).empty();
                    $("#" + tab).html(response.data);
                } else {
                    $("#" + tab).html('<p>' + response.data + '</p>');
                }
            }
        });
    });

});
