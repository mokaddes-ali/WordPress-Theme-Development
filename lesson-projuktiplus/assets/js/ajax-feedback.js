jQuery(document).ready(function($){

    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        customClass: {
            popup: 'custom-toast'
        },
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    $('#ajax-feedback-form').on('submit', function(e){
        e.preventDefault();

        let form = $(this);
        let data = form.serialize();
        let submit_btn = $('#feedback_submit_btn');

        data += '&action=lessonlms_ajax_feedback'; 
        data += '&security=' + lessonlms_ajax_feedback_obj.nonce;

        $.ajax({
            url: lessonlms_ajax_feedback_obj.ajax_url,
            type: "POST",
            data: data,

            beforeSend: function(){
                submit_btn.prop('disabled', true);
                submit_btn.html('Submitting...');
            },

            success: function(response){

                if(response.success){

                submit_btn.prop('disabled', false);
                submit_btn.html('Update Feedback');

                   $('#student_name').val(response.data.student_name);
                   
                    $('#student_designation').val(response.data.student_designation);
                    $('#student_feedback').val(response.data.student_feedback);

                    // BUTTON TEXT CHANGE
                    $('#feedback_submit_btn').text("Update Feedback");

                    Toast.fire({
                        icon: 'success',
                        title: response.data.message,
                    });

                } else {
                    Toast.fire({
                        icon: 'error',
                        title: response.data || 'Please Check Error'
                    });

                }
            },

            error: function(){
                submit_btn.prop('disabled', false);
                submit_btn.val('Submit Feedback');

                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong.'
                });
            }
        });

    });
});

