<?php
/**
 * Template Name: Blog Single Page
 * Description: Custom blog single page template based on SVG design
 */

get_header();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Blog Page</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: Arial, sans-serif;
      background: #f4f4f4;
      padding: 20px;
      color: #333;
    }

  </style>
</head>
<body>

<div class="container">
  <!-- Left Section -->
  <div class="left">
    <div class="dot-date">
      <div class="dot"></div>
      <div>21 November 2024</div>
    </div>
    <div class="heading">This is the blog title heading</div>
    <div class="author">
      <img src="https://i.pravatar.cc/40" alt="">
      <div>Mokaddes Ali</div>
    </div>
    <img class="blog-img" src="https://via.placeholder.com/800x400" alt="Blog Image">
    <div class="paragraph">
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque nec nisl id lorem tincidunt pharetra. Donec vel nisi vitae dolor feugiat tempor.
    </div>

    <div class="tags">
      <strong>Tags:</strong> <span>Web Design</span> <span>Development</span> <span>Background</span>
    </div>

    <div class="share">
      <strong>Share:</strong>
      <i>🌐</i>
      <i>📘</i>
      <i>🐦</i>
      <i>📸</i>
    </div>

    <div class="bottom-user">
      <img src="https://i.pravatar.cc/50" alt="">
      <div>
        <strong>Mokaddes Ali</strong>
        <p>Web Developer | Designer</p>
      </div>
    </div>

    <div class="comments">
      <h3>Comments: (3)</h3>

      <div class="comment-item">
        <img src="https://i.pravatar.cc/40?img=1" alt="">
        <div>
          <strong>John Doe</strong> - 2 days ago
          <p>Great blog post. Really informative and helpful.</p>
        </div>
      </div>

      <div class="comment-item" style="justify-content: flex-end;">
        <div>
          <strong>Jane Smith</strong> - 2 days ago
          <p>Thanks for sharing this content!</p>
        </div>
        <img src="https://i.pravatar.cc/40?img=2" alt="">
      </div>
    </div>

    <div class="leave-comment">
      <h3>Leave a Comment</h3>
      <form>
        <div class="form-row">
          <input type="text" placeholder="Your Name">
          <input type="email" placeholder="Your Email">
        </div>
        <div class="form-row">
          <textarea placeholder="Your Comment"></textarea>
        </div>
        <button type="submit">Submit</button>
      </form>
    </div>
  </div>

  <!-- Right Section -->
  <div class="right">

    <div class="card">
      <div class="search-box">
        <input type="text" placeholder="Search...">
        <button>Search</button>
      </div>
    </div>

    <div class="card">
  <h4>Recent Posts</h4>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title One</div>
      <div class="recent-date">1 day ago</div>
    </div>
  </div>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title Two</div>
      <div class="recent-date">2 days ago</div>
    </div>
  </div>

  <div class="recent-post">
    <img src="https://via.placeholder.com/60" alt="">
    <div class="recent-post-info">
      <div class="recent-title">Post Title Three</div>
      <div class="recent-date">3 days ago</div>
    </div>
  </div>
</div>


    <div class="card">
      <h4>Categories</h4>
      <div class="category">
        <span>Web Design</span><span>(12)</span>
      </div>
      <div class="category">
        <span>Development</span><span>(8)</span>
      </div>
      <div class="category">
        <span>Marketing</span><span>(5)</span>
      </div>
    </div>

    <div class="card">
      <h4>Follow Us</h4>
      <div class="social-icons">
        <i style="background:#4267B2">f</i>
        <i style="background:#1DA1F2">t</i>
        <i style="background:#E1306C">i</i>
        <i style="background:#333">g</i>
      </div>
    </div>

  </div>
</div>

</body>
</html>


<?php
get_footer();