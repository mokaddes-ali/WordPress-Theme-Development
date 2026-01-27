  document.addEventListener( 'DOMContentLoaded', function() {
    const loginError = document.querySelector( '.wp-login-error' );
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

  if( loginError ) {
    Toast.fire( {
      icon  : 'error',
      text  : loginError.dataset.error
    } );
  }
  } )
