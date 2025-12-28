jQuery(document).ready(function($){

    $(".sidebar-menu-tabs-items li[data-sidetab]").on("click", function(){

        const tab   = $(this).data("sidetab");
        const nonce = $(this).data("nonce");

        // Active menu
        $(".sidebar-menu-tabs-items li").removeClass("active-menu");
        $(this).addClass("active-menu");

        // Show tab container
        $(".student-sidebar-tab").removeClass("student-active");
        $("#" + tab).addClass("student-active");

        // AJAX call
        $.ajax({
            url: ajaxurl, // WordPress global
            type: "POST",
            data: {
                action: "sidebar_menu_ajax_action",
                nonce: nonce,
                tab: tab
            },
            beforeSend: function(){
                $("#" + tab).html('<p class="loading">Loading...</p>');
            },
            success: function(response){
                if ( response.success ) {
                    $("#" + tab).html( response.data );
                } else {
                    $("#" + tab).html('<p>Error loading data</p>');
                }
            }
        });

    });

});
