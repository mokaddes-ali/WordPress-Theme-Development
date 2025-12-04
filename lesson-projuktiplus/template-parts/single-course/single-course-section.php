 <?php
    /**
     * Template Name: Single Course
     * 
     * @package LessonLMS
     */

    echo '<div class="" style="margin-top: -60px">';
    get_header();
    echo '</div>'
    ?>

 <?php get_template_part('template-parts/single-course/single-course', 'breadcrumb'); ?>

 <?php
    $total_enrolled_student = get_post_meta(get_the_ID(), '_enrolled_students', true) ?: 0;


    ?>
 <section class="single-courses">
     <div class="container">
         <!-- course title -->
         <h2 class="course-heading">
             <?php echo esc_html(get_the_title($post_id)); ?>
         </h2>
         <div class="average-rating-student">
             <div class="student">
                 <?php
                    $stats = lessonlms_get_review_stats(get_the_ID());
                    $total_reviews = $stats['total_reviews'];
                    $avg_rating = $stats['average_rating'];

                    ?>
                 <?php for ($i = 1; $i <= 5; $i++) : ?>
                     <?php if ($i <= $avg_rating): ?>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                         </svg>
                     <?php elseif ($i - 0.5 <= $avg_rating): ?>
                         <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                             <defs>
                                 <!-- Gradient fill: 50% yellow, 50% gray -->
                                 <linearGradient id="half-yellow" x1="0" x2="100%" y1="0" y2="0">
                                     <stop offset="50%" stop-color="yellow" />
                                     <stop offset="50%" stop-color="lightgray" />
                                 </linearGradient>
                             </defs>

                             <path fill="url(#half-yellow)" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                 d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442
                    c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385
                    a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54
                    a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602
                    a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                         </svg>


                     <?php else: ?>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                             <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                         </svg>

                     <?php endif; ?>

                 <?php endfor; ?>

                 <span> <?php echo esc_html($avg_rating); ?> </span>

                 <h4> ( <?php echo esc_html($total_reviews); ?> reviews)</h4>

             </div>

             <div class="student">
                 <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" class="size-6">
                     <path stroke-linecap="round" stroke-linejoin="round"
                         d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                 </svg>

                 <h4 class="student-entrolled"> <?php echo number_format($total_enrolled_student) ?> student enrolled</h4>

             </div>

         </div>

         <div class="single-courses-wrapper">

             <!-- left -->
             <div class="left-courses-image-details">
                 <?php get_template_part('template-parts/single-course/single-course-image', 'card'); ?>

                <?php get_template_part('template-parts/single-course/single-course', 'tab'); ?>

                 <div class="courses-tab-content" id="overview">
                     <?php get_template_part('template-parts/single-course/course', 'overview'); ?>
                 </div>
                 
                 <div class="courses-tab-content" id="curriculum">Curriculum Content</div>
                 <div class="courses-tab-content" id="instructor">Instructor Content</div>

                 <?php get_template_part('template-parts/single-course/single-course', 'review'); ?>

             </div>
             <!-- right -->
             <div class="courses-card-right">

                 <!-- first card -->
                 <?php get_template_part('template-parts/single-course/course', 'details'); ?>

                 <!-- second card -->
                 <div class="course-right-info-card2">
                     <h2>Who this course is for:</h2>
                     <div class="course-right-info-card2-items item1">

                         <?php get_template_part('template-parts/single-course/svg/check-icon', 'svg'); ?>


                         <div class="text">
                             <span>Aspiring UI/UX designers</span>
                         </div>
                     </div>

                     <div class="course-right-info-card2-items item2">
                        <?php get_template_part('template-parts/single-course/svg/check-icon', 'svg'); ?>
                         <div class="text">
                             <span>Web developers wanting design skills</span>
                         </div>
                     </div>

                     <div class="course-right-info-card2-items item3">
                        <?php get_template_part('template-parts/single-course/svg/check-icon', 'svg'); ?>

                         <div class="text">
                             <span>Graphic desiners transitioning to digital</span>
                         </div>
                     </div>

                     <div class="course-right-info-card2-items item4">
                         <?php get_template_part('template-parts/single-course/svg/check-icon', 'svg'); ?>
                         <div class="text">
                             <span>Products manager</span>
                         </div>
                     </div>


                 </div>

             </div>
         </div>
     </div>
 </section>


 <script>
     document.querySelectorAll('.enroll-btn').forEach(button => {
         button.addEventListener('click', function() {
             const courseId = this.getAttribute('data-course-id');
             const courseElement = document.querySelector('.student-entrolled');

             fetch(ajax_object.ajaxurl, {
                     method: "POST",
                     headers: {
                         "Content-Type": "application/x-www-form-urlencoded",
                     },
                     body: 'action=lessonlms_enroll_course&course_id=' + courseId
                 })
                 .then(response => response.json())
                 .then(data => {
                     if (data.success) {
                         courseElement.textContent = data.data + ' student enrolled';
                         this.textContent = "Enrolled";
                         this.disabled = true;
                         this.style.cursor = "not-allowed";
                         document.querySelector(".review-warning").style.display = "none";
                          document.querySelector(".student-form-wrapper").style.display = "block";

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
                            Toast.fire({
                            icon: "success",
                            title: "Course Purchase in successfully"
                            });
                     } else {
                         if (data.data === 'Please login first to enroll') {
                             alert('Please login first to enroll');
                         } else {
                             alert("Enrollment Unsuccessful");
                         }
                     }
                 })
                 .catch(error => {
                     console.error('Error:', error);
                     alert("Try Again");
                 });
         });
     });
 </script>


 <?php get_footer(); ?>