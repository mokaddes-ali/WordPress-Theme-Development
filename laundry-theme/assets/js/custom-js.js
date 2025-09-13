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
        autoplaySpeed: 2000,
        dots: false,
        pauseOnHover: false,
        arrows: false,
        responsive: [
            { breakpoint: 768, settings: { slidesToShow: 1 } },
            { breakpoint: 576, settings: { slidesToShow: 1 } }
        ]
    });

    $('#custom-prev').click(function() { $('.hero-slick-items').slick('slickPrev'); });
    $('#custom-next').click(function() { $('.hero-slick-items').slick('slickNext'); });

 // Slick init with SVG arrows
    $('.blog-post-fade').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        dots: false,
        pauseOnHover: false,
        infinite: true,
        speed: 700,
        arrows: false,
        fade: true,
        cssEase: 'linear',
      
    });

        $('#blog-prev').click(function() { $('.blog-post-fade').slick('slickPrev'); });
    $('#blog-next').click(function() { $('.blog-post-fade').slick('slickNext'); });


    /*----- testimonial section slick -----*/
    $(".testimonial-items1").slick({
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 1000,
        pauseOnHover: false,
        infinite: true,
        dots: false,
         rtl: true,
        centerMode: true,
        centerPadding: '60px',
        arrows: false,
        responsive: [
          {
            breakpoint: 1280, settings: {
              arrows: false,
              slidesToShow: 3
            }
          },
          {
      breakpoint: 1024, settings: {
        arrows: false,
        slidesToShow: 2
      }
    },
          {
      breakpoint: 768, settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 576, settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
    });



     $(".testimonial-items2").slick({
        slidesToShow: 3,
        autoplay: true,
        autoplaySpeed: 1000,
        pauseOnHover: false,
        infinite: true,
        dots: false,
         rtl: false,
        centerMode: true,
        centerPadding: '60px',
        arrows: false,
        responsive: [
          {
            breakpoint: 1280, settings: {
              arrows: false,
              slidesToShow: 3
            }
          },
          {
      breakpoint: 1024, settings: {
        arrows: false,
        slidesToShow: 2
      }
    },
          {
      breakpoint: 768, settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 576, settings: {
        arrows: false,
        slidesToShow: 1
      }
    },
    {
      breakpoint: 480,
      settings: {
        arrows: false,
        slidesToShow: 1
      }
    }
  ]
    });


   

   $(".blog-wrapper").slick({ 
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    dots: true,
    arrows: false,
    pauseOnHover: false,
    infinite: true,
    responsive: [
        {
            breakpoint: 1280,
            settings: {
                slidesToShow: 4
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




  $('.gallery-container').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        dots: true,
        infinite: true,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            { breakpoint: 640, settings: { slidesToShow: 1 } },   
            { breakpoint: 768, settings: { slidesToShow: 2 } },   
            { breakpoint: 1024, settings: { slidesToShow: 3 } },  
            { breakpoint: 1280, settings: { slidesToShow: 4 } },  
            { breakpoint: 1536, settings: { slidesToShow: 5 } }  
        ]
    });
    });



// GSap For Animation

gsap.registerPlugin(ScrollTrigger);


document.querySelectorAll(".counter").forEach(counter => {
  const endValue = +counter.getAttribute("data-count");
  const suffix = counter.getAttribute("data-suffix") || "";

  gsap.fromTo(counter,
    { innerText: 10 },
    { 
      innerText: endValue,
      duration: 1,
      ease: "power1.inOut",
      snap: { innerText: 2 },
      scrollTrigger: {
        trigger: counter,
        start: "top 80%",
        toggleActions: "play none none none"
      },
      onUpdate: function() {
        counter.innerText = Math.floor(counter.innerText) + suffix;
      }
    }
  );
});



  console.log("GSAP is working!");

