<?php
/*
Template Name: Contact Us Page
Template Post Type: page
*/
get_header(); 
?>

<!-- Contact Page -->
<section class="contact">
  <div class="container">
    <h2>Contact Us</h2>
    <form>
      <input type="text" placeholder="Your Name" required>
      <input type="email" placeholder="Your Email" required>
      <textarea placeholder="Your Message" required></textarea>
      <button type="submit">Send Message</button>
    </form>
  </div>
</section>

<?php get_footer(); ?>