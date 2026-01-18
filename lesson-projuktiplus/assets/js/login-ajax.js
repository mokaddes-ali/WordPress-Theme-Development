jQuery("document").ready(function ($) {
  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    customClass: {
      popup: "custom-toast",
    },
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    },
  });

  $("#loginform").on("submit", function (e) {
    e.preventDefault();
    const form = $(this);
    let data = form.serialize();
    const submitButton = $("#wp-submit");

    data += "&action=lessonlms_block_unverified_otp_user_login";
    data += "&security=" + lessonlms_ajax_login_object.nonce;

    $.ajax({
      url: lessonlms_ajax_login_object.ajax_url,
      type: "POST",
      data: data,

      beforeSend: function () {
        submitButton.prop("disabled", true).text("submiting...");
      },

      success: function (response) {
        submitButton.prop("disabled", false).text("Log In");
        if (response.success) {
          Toast.fire({
            icon: "success",
            title: response.data.message,
          });
        } else {
          Toast.fire({
            icon: "error",
            title: response.data.message,
          });
        }
      },

      error: function () {
        submitButton.prop("disabled", false).text("login");

        Toast.fire({
          icon: "error",
          title: "Something went wrong",
        });
      },
    });
  });
});
