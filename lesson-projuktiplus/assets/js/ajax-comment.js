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

    $('#ajax-comment-form').on('submit', function(e){
        e.preventDefault();

        let form = $(this);
        let data = form.serialize();
        let submit_btn = $('#comment_submit_btn');

        data += '&action=lessonlms_ajax_comment'; 
        data += '&security=' + lessonlms_ajax_comment_obj.nonce;

        $.ajax({
            url: lessonlms_ajax_comment_obj.ajax_url,
            type: "POST",
            data: data,

            beforeSend: function(){
                submit_btn.prop('disabled', true);
                submit_btn.val('Submitting...');
            },

            success: function(response){

                submit_btn.prop('disabled', false);
                submit_btn.val('Post Comment');

                if(response.success){

                    Toast.fire({
                        icon: 'success',
                        title: 'Comment Submitted Successfully!'
                    });

                    $(".comments h3").text("Comments: (" + response.data.count + ")");
                    $(".comment-list").append(response.data.comment);

                    form[0].reset();

                } else {

                    Toast.fire({
                        icon: 'error',
                        title: response.data || 'Please Check Error'
                    });

                }
            },

            error: function(){
                submit_btn.prop('disabled', false);
                submit_btn.val('Submit Comment');

                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong.'
                });
            }
        });

    });
});

