jQuery(document).ready(function($){
    /*----- menu icon toggle -----*/
   $(document).ready(function () {
 function toggleMenu() {
      $("#navPhone").toggleClass("opacity-100 opacity-0 visible invisible scale-100 scale-95");
      $("#openIcon").toggleClass("show");
    }

    // Open/Close toggle button
    $("#menuBtn").click(function() {toggleMenu();});

    // Top close button
    $("#menuClose").click(function() {toggleMenu();});
});

// console.log("Hello World");

  //scroll button

    $(window).on('load scroll', function () {
        if($(this).scrollTop() > 200){
          $('.scroll-top-btn').addClass('show');
    } else {
      $('.scroll-top-btn').removeClass('show');
    }
    });

     $('.scroll-top-btn').click(function () {
    $('html, body').animate({ scrollTop: 0 }, 60);
    return false;
  });


    $(".hero-slick-items").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 1500,
        dots: false,
        arrows: false,
        responsive: [
            { breakpoint: 768, settings: { slidesToShow: 1 } },
            { breakpoint: 576, settings: { slidesToShow: 1 } }
        ]
    });

    $('#custom-prev').click(function() { $('.hero-slick-items').slick('slickPrev'); });
    $('#custom-next').click(function() { $('.hero-slick-items').slick('slickNext'); });


    /*----- testimonial section slick -----*/
    $(".testimonial-items").slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: false
    });

    /*----- blog section slick add -----*/
    $(".blog-wrapper").slick({ 
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: true,
        arrows: false,
        pauseOnHover: false,
          responsive: [
        {
            breakpoint: 1280,
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 1024, 
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 768, 
            settings: {
                slidesToShow: 2
            }
        },
        {
            breakpoint: 480, 
            settings: {
                slidesToShow: 1
            }
        }
    ]
    });



// reply
    $('.reply-btn').on('click', function (e) {
    e.preventDefault();

    // Clear old reply forms
    $('.reply-form-container').empty();

    // Get comment ID
    let commentId = $(this).data('comment-id');

    // Get form HTML
    let formHtml = $('#hidden-reply-form').html();

    // Insert form into correct reply container
    $('#reply-form-' + commentId).html(formHtml);

    // Set parent ID
    $('#reply-form-' + commentId).find('.comment_parent_input').val(commentId);
  });
});
