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
$total_enrolled_student = get_post_meta( get_the_ID(), '_enrolled_students', true) ?: 0 ;
$current_user_id = get_current_user_id();

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
                 $stats = lessonlms_get_review_stats( get_the_ID());
                 $total_reviews = $stats['total_reviews'];
                 $avg_rating = $stats['average_rating'];
                
                ?>
                <?php for($i=1; $i<=5; $i++) : ?>
                    <?php if( $i<= $avg_rating):?>
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>
                <?php elseif( $i - 0.5 <= $avg_rating):?>
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <defs>
                    <!-- Gradient fill: 50% yellow, 50% gray -->
                    <linearGradient id="half-yellow" x1="0" x2="100%" y1="0" y2="0">
                    <stop offset="50%" stop-color="yellow"/>
                    <stop offset="50%" stop-color="lightgray"/>
                    </linearGradient>
                </defs>

                <path fill="url(#half-yellow)" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442
                    c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385
                    a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54
                    a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602
                    a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                </svg>


                <?php else:?>
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 0 1 1.04 0l2.125 5.111a.563.563 0 0 0 .475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 0 0-.182.557l1.285 5.385a.562.562 0 0 1-.84.61l-4.725-2.885a.562.562 0 0 0-.586 0L6.982 20.54a.562.562 0 0 1-.84-.61l1.285-5.386a.562.562 0 0 0-.182-.557l-4.204-3.602a.562.562 0 0 1 .321-.988l5.518-.442a.563.563 0 0 0 .475-.345L11.48 3.5Z" />
                    </svg>

                    <?php endif;?>
                    
                <?php endfor; ?>

                <span> <?php echo esc_html( $avg_rating ); ?> </span>

                <h4> ( <?php echo esc_html( $total_reviews ); ?> reviews)</h4>

            </div>

            <div class="student">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>

                <h4 class="student-entrolled"> <?php echo number_format( $total_enrolled_student ) ?> student enrolled</h4>

            </div>

        </div>

        <div class="single-courses-wrapper">

            <!-- left -->
            <div class="left-courses-image-details">
                <div class="single-couses-image-box">
                    <?php
                    if (has_post_thumbnail()): ?>

                        <?php the_post_thumbnail('full'); ?>

                    <?php endif; ?>

                    <!----- absolute card box ----->
                    <div class="courses-card-box">
                        <!-- prices -->
                        <?php
                        $regular_price  = get_post_meta(get_the_ID(), "regular_price", true) ?: '0.00';
                        $original_price  = get_post_meta(get_the_ID(), "original_price", true) ?: '0.00';
                           $video_hours  = get_post_meta(get_the_ID(), "video_hours", true) ?: '0.00';
                             $downlable_resource  = get_post_meta(get_the_ID(), "downlable_resource", true) ?: '0';
                        $total_articles  = get_post_meta(get_the_ID(), "total_articles", true) ?: '0';
                        if ($original_price > $regular_price && !empty($regular_price)) {
                            $discount_price = (($original_price - $regular_price) / $original_price) * 100;
                            $discount_price = round($discount_price, 2);
                        }

                        ?>

                        <div class="course-price-list">
                            <?php if ($regular_price): ?>
                                <h2>$<?php echo esc_html($regular_price); ?>
                                </h2>
                            <?php endif; ?>

                            <?php if ($original_price): ?>
                                <h3>$<?php echo esc_html($original_price); ?></h3>
                            <?php endif; ?>
                            <?php if ($discount_price): ?>
                                <p><?php echo esc_html($discount_price) . '%' . __('off', 'lessonlms'); ?>
                                </p>
                            <?php endif; ?>
                        </div>
                        <div class="enroll">
                            <?php if( $current_user_id > 0): ?>
                            <button class="enroll-btn" data-course-id="<?php echo get_the_ID(); ?>">
                                Enroll Now
                            </button>
                            <?php else: ?>
                                <div class="login-required">
                                    <p> Please Register or Login First</p>
                                    <a class="login-btn" href="<?php echo wp_login_url( get_permalink());?>">
                                        Login
                                    </a>

                                    <a class="register-btn" href="<?php echo wp_registration_url();?> ">
                                       
                                    </a>
                                </div>

                            <?php endif;?>
                        </div>
                        <h3>This courses includes:</h3>
                        <div class="courses-card-items item1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="36" height="36"
                                role="img" aria-label="Play">
                                <title>Play</title>
                                <circle cx="12" cy="12" r="11" fill="none" stroke="#FFB900" stroke-width="2" />
                                <polygon points="10,8 16,12 10,16" fill="#FFB900" />
                            </svg>

                            <div class="text">
                                <?php if ($video_hours): ?>
                                    <p>
                                        <?php echo esc_html($video_hours) . ' ' . __('hours on-demand vedio', 'lessonlms'); ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="courses-card-items item2">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#FFB900" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                            </svg>


                            <div class="text">
                                <p>
                                    <?php echo esc_html($total_articles) . ' ' . __('articles', 'lessonlms'); ?>
                                </p>
                            </div>
                        </div>

                        <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#FFB900" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                            </svg>

                            <div class="text">

                                <p>
                                    <?php echo esc_html($downlable_resource) . ' ' . __('downable resource', 'lessonlms'); ?>
                                </p>

                            </div>
                        </div>

                        <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#FFB900" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>

                            <div class="text">
                                <p>
                                    <?php echo esc_html_e('Full lifetime Access', 'lessonlms'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#FFB900" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M10.5 1.5H8.25A2.25 2.25 0 0 0 6 3.75v16.5a2.25 2.25 0 0 0 2.25 2.25h7.5A2.25 2.25 0 0 0 18 20.25V3.75a2.25 2.25 0 0 0-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                            </svg>


                            <div class="text">
                                <p>
                                    <?php echo esc_html_e('Access on mobile and TV', 'lessonlms'); ?>
                                </p>
                            </div>
                        </div>
                        <div class="courses-card-items item3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="#FFB900" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
                            </svg>


                            <div class="text">
                                <p>
                                    <?php echo esc_html_e('Certificate on completion', 'lessonlms'); ?>
                                </p>
                            </div>
                        </div>


                    </div>
                </div>

                <!-- courses tabs -->
                <div class="courses-tabs">
                    <div class="courses-tab" data-tab="overview">Overview</div>
                    <div class="courses-tab" data-tab="curriculum">Curriculum</div>
                    <div class="courses-tab" data-tab="instructor">Instructor</div>
                    <div class="courses-tab" data-tab="reviews">Reviews</div>
                    <div class="tab-divider"></div>
                </div>
                <div class="courses-tab-content" id="overview">Overview Content</div>
                <div class="courses-tab-content" id="curriculum">Curriculum Content</div>
                <div class="courses-tab-content" id="instructor">Instructor Content</div>

                <!-- Reviews Section -->
              <div class="courses-tab-content" id="reviews">
                    <h2 class="section-title">Students Review</h2>

                    <!-- Review Form -->
                    <div class="student-form">
                        <h2 class="form-title">Add Review</h2>
                        <form method="post" action="<?php echo esc_url(get_permalink()); ?>" class="review-form">
                        <input type="hidden" name="course_id" value="<?php echo get_the_ID(); ?>">

                        <!-- Star Rating -->
                        <div class="star-rating">
                            <?php for ($i = 5; $i >= 1; $i--): ?>

                            <input type="radio" name="rating" id="rating-<?php echo $i; ?>" value="<?php echo $i; ?>">

                            <label for="rating-<?php echo $i; ?>">★</label>
                            <?php endfor; ?>
                        </div>

                        <!-- Name -->
                        <div class="form-group">
                            <label for="reviewer_name">Your Name</label>
                            <input type="text" name="reviewer_name" id="reviewer_name" required />
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label for="review_text">Your Message</label>
                            <textarea name="review_text" id="review_text" required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="submit_review" class="review-btn">Submit Review</button>
                        </form>
                    </div>

                    <!-- Reviews List -->
                    <div class="student-reviews">
                        <h2 class="section-title">All Reviews</h2>
                        <?php 
                        $reviews = lessonlms_get_total_course_reviews(get_the_ID());
                        if (!empty($reviews)) : 
                            foreach (array_reverse($reviews) as $review) : ?>
                            <div class="single-review">

                                <div class="review-header">
                                <div class="reviewer-name">
                                    <?php echo esc_html($review['name']); ?>
                                </div>
                                 <div class="review-rating">
                                <?php 
                                    for ($i = 1; $i <= 5; $i++) {
                                    echo ($i <= $review['rating']) ? '<span> ★ </span>' : '<span> ☆ </span>';
                                    }
                                ?>
                                </div>
                                </div>
                               
                                <div class="review-text">
                                    <?php echo esc_html($review['review']); ?>
                                </div>
                                 <div class="review-date">
                                    <?php echo date('F j, Y', strtotime($review['date'])); ?>
                                </div>
                            </div>
                        <?php endforeach; else: ?> 
                        <p>No reviews yet. Be the first to review!</p>
                        <?php endif; ?>
                    </div>
                    </div>

            </div>
            <!-- right -->
            <div class="courses-card-right">

                <!-- first card -->
              <?php get_template_part('template-parts/single-course/course', 'details');?>

                <!-- second card -->
                <div class="course-right-info-card2">
                    <h2>Who this course is for:</h2>
                    <div class="course-right-info-card2-items item1">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>


                        <div class="text">
                            <span>Aspiring UI/UX designers</span>
                        </div>
                    </div>

                    <div class="course-right-info-card2-items item2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>


                        <div class="text">
                            <span>Web developers wanting design skills</span>
                        </div>
                    </div>

                    <div class="course-right-info-card2-items item3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>


                        <div class="text">
                            <span>Graphic desiners transitioning to digital</span>
                        </div>
                    </div>

                    <div class="course-right-info-card2-items item4">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="#f3b841" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                        </svg>


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
      if(data.success){
        courseElement.textContent = data.data + ' student enrolled';
        this.textContent = "Enrolled";
        this.disabled = true;
        alert("Enrolled Successfully");
      } else {
        if(data.data === 'Please login first to enroll'){
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
