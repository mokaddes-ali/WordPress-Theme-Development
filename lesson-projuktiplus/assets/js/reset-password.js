jQuery(document).ready(function ($) {

  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
  });

  $("#lostpasswordform").on("submit", function (e) {
    e.preventDefault();

    const form = $(this);
    let data = form.serialize();
    const submitButton = $("#wp-submit");

    data += "&action=lessonlms_reset_password_link_action";
    data += "&security=" + lessonlms_ajax_reset_password_object.nonce;

    $.ajax({
      url: lessonlms_ajax_reset_password_object.ajax_url,
      type: "POST",
      data: data,

      beforeSend: function () {
        submitButton.prop("disabled", true).val("Submitting...");
      },

      success: function (response) {
        submitButton.prop("disabled", false).val("Reset Password");

        if (response.success) {
          window.location.href = response.data.redirect_url;
        } else {
          Toast.fire({
            icon: "error",
            title: response.data.message,
          });
        }
      },

      error: function () {
        submitButton.prop("disabled", false).val("Reset Password");
        Toast.fire({
          icon: "error",
          title: "Something went wrong",
        });
      },
    });

    return false;
  });
});
