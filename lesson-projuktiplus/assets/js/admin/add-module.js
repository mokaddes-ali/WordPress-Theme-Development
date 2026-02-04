jQuery(document).ready(function ($) {
    $('#lessonlms-module-form').on('submit', function (e) {
        e.preventDefault();
        const form = $(this);
        const btn = form.find('#submit-course-module');
        const action = 'lessonlms_add_module';
        const modName = $('#module_name').val();
        const modStatus = $('#module_status').is(':checked') ? 'enabled' : 'disabled';
        const course = $('#select_course').val();
        const nonce = $('input[name="add_module_nonce_field"]').val();
        let lastHTML = '';

        const formData = {
                        action                 : action,
                        select_course          : course,
                        module_name            : modName,
                        module_status          : modStatus,
                        add_module_nonce_field : nonce
                    };
        $.ajax( {
            url: ajaxurl,
            type: 'POST',
            data: formData,
            beforeSend: function () {
                lastHTML = $('#course-modules-table-wrapper').html();
                    btn.prop('disabled', true).text('Saving...');
          $('#course-modules-table-wrapper').html(
            '<div class="lessonlms-loading">Loading modules...</div>'
        );
            },
           success: function (response) {
    if (response.success) {
        $('#course-modules-table-wrapper').html(response.data.html);
        form.trigger('reset');
        // alert(response.data.message);
    } else {
         $('#course-modules-table-wrapper').html(lastHTML);
        // alert(response.data || 'Save failed!');

    }
            },
            error: function () {
                 $('#course-modules-table-wrapper').html(lastHTML);
                // alert('Request failed');
            },
            complete: function () {
                btn.prop('disabled', false).text('Save Module');
                $('#course-modules-table-wrapper').html(lastHTML);
            }
        } );
    });
});
