jQuery(document).ready(function ($) {

    $('#lessonlms-module-form').on('submit', function (e) {
        e.preventDefault();

        const form = $(this);
        const btn = form.find('button[type="submit"]');

        $.ajax( {
            url: ajaxurl,
            type: 'POST',
            data: form.serialize(),
            beforeSend: function () {
                    btn.prop('disabled', true).text('Saving...');
            },
            success: function (response) {
                if (response.success) {
                    alert(response.data);
                    form.trigger('reset');
                    form.find('input[name="course_module_id"]').val('');
                } else {
                    alert(response.data || 'Save failed!');
                }
            },
            error: function () {
                alert('Request failed');
            },
            complete: function () {
                btn.prop('disabled', true).text('Save Module');
            }
        } );
    });

});
