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

        data += '&action=lessonlms_ajax_comment'; 
        data += '&security=' + lessonlms_ajax_comment_obj.nonce;

        $.ajax({
            url: lessonlms_ajax_comment_obj.ajax_url,
            type: "POST",
            data: data,

            beforeSend: function(){
                Swal.fire({
                    title: 'Submitting...',
                    text: 'Please wait...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },

            success: function(response){
                if(response.success){
        
                            Toast.fire({
                            icon: "success",
                            title: 'Comment Submitted Successfully!',
                        text: response.data.message
                            });

                    $(".comments h3").text("Comments: (" + response.data.count + ")");
                    $(".comment-list").append(response.data.comment);



                    $('#ajax-comment-form')[0].reset();
                } else {
                    Toast.fire({
                        icon: 'error',
                        title: 'Please Check Error',
                        text: response.data
                    });
                }
            },

            error: function(){
                Toast.fire({
                    icon: 'error',
                    title: 'Please Check Error',
                    text: 'Something went wrong.'
                });
            }
        });

    });
});
