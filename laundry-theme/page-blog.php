<?php
/* Template Name: Blog Page */
get_header(); 
?>

  <!-- Blog Hero Area -->
<?php 
get_template_part('sections/pagesTitle');
?>

<section class="blog-section px-[160px] py-[150px] flex gap-[60px]">
<!-- Blog Left  -->
 <div class="blog-left w-[1160px]">


  <!-- first card -->
  <div class="w-[1160px] h-[991px] flex-shrink-0 bg-[#EBEFF3]">
  <!-- Image Section -->
  <div class="h-[570px] w-[1160px]">
    <img src="./assets/images/blogBig1.png" alt="images" />
  </div>
  
  <!-- Text Section -->
   <div class="px-[41px] py-[37px] flex flex-col gap-[14px]">
  <!-- First Row -->
  <div class="flex items-center gap-[13px]">
    <!-- Avatar -->
    <div class="w-[54px] h-[54px] flex-shrink-0 aspect-square rounded-[6px] bg-[#CFD4C6] bg-cover bg-no-repeat"><img src="./assets/images/postclient1.jpg" /></div>
    
    <!-- Name -->
    <h2 class="text-[#142137] font-poppins text-[18px] font-semibold leading-none">Miles Tone</h2>
    
    
    <!-- Service Type -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[10px] flex gap-[5px] items-center text-center font-poppins text-[16px] font-medium leading-[26px]">
       <!-- Phone Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none" class="w-[22px] h-[22px] flex-shrink-0 aspect-square">
      <path d="M16.3906 0.00652348C17.3671 0.00652348 18.3446 0.0285093 19.3211 0.00102703C20.8363 -0.0411124 22.0281 1.21941 21.9997 2.69245C21.9631 4.58415 21.9887 6.47767 21.9915 8.37028C21.9933 9.80119 21.4821 11.0177 20.4726 12.0263C17.4386 15.0576 14.4064 18.0907 11.3696 21.1202C10.1998 22.2864 8.67634 22.2946 7.51568 21.1367C5.28962 18.9161 3.06814 16.691 0.849406 14.4631C-0.0190321 13.5901 -0.237974 12.4798 0.268615 11.4492C0.40053 11.1808 0.583745 10.9215 0.795358 10.7099C3.87245 7.6136 6.95412 4.52094 10.0459 1.43926C11.0078 0.480134 12.1913 0.0120199 13.5517 0.00743955C14.498 0.00377525 15.4443 0.00743955 16.3906 0.00743955V0.00652348ZM16.3503 1.73241C15.48 1.73241 14.6098 1.74981 13.7395 1.72783C12.6823 1.70034 11.8166 2.0796 11.0755 2.82528C8.11662 5.80252 5.14671 8.7706 2.18229 11.7423C2.07511 11.8504 1.96244 11.9576 1.87816 12.0822C1.66929 12.3891 1.68395 12.7665 1.90747 13.0642C1.98076 13.1613 2.07053 13.2456 2.15664 13.3327C4.32408 15.5047 6.49242 17.6758 8.66077 19.8469C8.73589 19.922 8.81009 20.0008 8.89345 20.0667C9.22599 20.3287 9.61074 20.337 9.94877 20.0869C10.0468 20.0145 10.1329 19.9275 10.2199 19.8414C13.2127 16.8531 16.2019 13.8631 19.1975 10.8776C19.9157 10.1612 20.2839 9.31842 20.2702 8.29516C20.2528 6.90639 20.2656 5.51671 20.2656 4.12794C20.2656 3.60853 20.2766 3.08911 20.2601 2.57062C20.2436 2.05853 19.9331 1.76264 19.4191 1.73424C19.3129 1.72874 19.2057 1.73149 19.0985 1.73149C18.1824 1.73149 17.2664 1.73149 16.3503 1.73149V1.73241Z" fill="#1D92CD"/>
      <path d="M15.747 3.57547C17.1935 3.56815 18.3377 4.70408 18.3358 6.14598C18.334 7.56315 17.1962 8.7119 15.7873 8.71832C14.3555 8.72473 13.1893 7.56773 13.1912 6.1414C13.1921 4.72881 14.3344 3.5828 15.747 3.57547ZM16.6127 6.14415C16.6127 5.66412 16.2582 5.30502 15.7791 5.29953C15.2991 5.29403 14.9317 5.6458 14.9225 6.12033C14.9125 6.61684 15.2844 6.99426 15.7791 6.98785C16.2591 6.98235 16.6136 6.62325 16.6136 6.14415H16.6127Z" fill="#1D92CD"/>
    </svg>
      <h1>Laundry Services</h1>
    </div>
    
    
    
    <!-- Date -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
      <!-- Calendar Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 19 20" fill="none" class="w-[16.201px] h-[18px] flex-shrink-0">
      <path d="M5.75195 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M12.9531 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M17.4528 6.84927V14.4997C17.4528 17.1999 16.1027 19 12.9525 19H5.75218C2.60202 19 1.25195 17.1999 1.25195 14.4997V6.84927C1.25195 4.14911 2.60202 2.349 5.75218 2.349H12.9525C16.1027 2.349 17.4528 4.14911 17.4528 6.84927Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 9.09912H12.9523" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 13.5994H9.35213" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
      <h2>March 16, 2025</h2>
    </div>
 
    
    <!-- Comment Count -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
         
    <!-- Comment Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 20 20" fill="none" class="w-[17.941px] h-[18px] flex-shrink-0">
      <path d="M18.9411 6.37784V10.8687C18.9411 11.1606 18.9298 11.4413 18.8962 11.7108C18.6379 14.7421 16.8528 16.2465 13.5632 16.2465H13.1142C12.8335 16.2465 12.564 16.3813 12.3956 16.6058L11.0484 18.4022C10.4533 19.1993 9.48776 19.1993 8.89272 18.4022L7.54544 16.6058C7.39949 16.4149 7.07392 16.2465 6.82692 16.2465H6.37784C2.79636 16.2465 1 15.3596 1 10.8687V6.37784C1 3.08827 2.51568 1.30314 5.5358 1.04492C5.80525 1.01124 6.08593 1 6.37784 1H13.5632C17.1447 1 18.9411 2.79636 18.9411 6.37784Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M13.904 9.13973H13.9141" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M9.98209 9.13973H9.99219" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M6.04849 9.13973H6.0586" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h2>02 Comment</h2></div>
  </div>
  
  <!-- Second Row - Title -->
  <div class="text-[#142137] font-poppins text-[34px] font-semibold leading-[64px] tracking-[-0.68px]"> <h1>Refresh Your Wardrobe, Refresh Your Life</h1>

  </div>
  
  <!-- Third Row - Description -->
  <div class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
    Cleaning is more than just visiting places—it's about creating lasting memories, discovering new cultures, and experiencing the extrinary. From breathtaking landscapes to immersive local adventures, we curate seamless travel experiences tailored to your dreams. Whether you seek relaxation, adventure, or cultural exploration.
  </div>
  
  <!-- Fourth Row - Button -->
<div class="flex flex-col items-start gap-3 mt-[38px]">
  <button class="w-[173px] h-[54px] flex items-center gap-3 pl-[30px] py-[22px] rounded-full border border-[rgba(20,33,55,0.20)] bg-[#142137] text-white font-poppins text-[16px] font-medium">
  Read More
  <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full bg-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 15 14" fill="none">
      <path d="M0.853516 7.1615L12.8535 7.1615" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M7.85352 13.1611L13.8535 7.16113L7.85352 1.16113" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>
</button>

</div>


  </div>
</div>
  

<!-- Second Card  -->
<div class="relative w-[1160px] h-[280px] mx-auto mt-14 bg-[#EBEFF3] flex flex-col items-center justify-center gap-4 text-center">
  
  <!-- SVG Icon -->
  <div class="absolute left-[48%] top-[45px] w-[34px] h-[30px]">
    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="30" viewBox="0 0 34 30" fill="none">
      <path d="M0 27.0588C3.52166 24.5098 6.11488 22.0588 7.77966 19.7059C9.44444 17.4183 10.2768 15.1961 10.2768 13.0392C10.2768 12.3856 10.0207 12.0588 9.50847 12.0588L7.39548 12.2549C5.41055 12.2549 3.80979 11.6993 2.59322 10.5882C1.37665 9.54248 0.768364 8.10457 0.768364 6.27451C0.768364 4.44444 1.40866 2.94118 2.68927 1.7647C3.90584 0.588234 5.44256 0 7.29943 0C9.73258 0 11.7175 0.882351 13.2542 2.64706C14.791 4.47712 15.5593 6.96078 15.5593 10.098C15.5593 13.7582 14.5028 17.1895 12.3898 20.3922C10.2128 23.6601 6.88324 26.8627 2.40113 30L0 27.0588ZM18.4407 27.0588C21.5141 25.098 24.0113 22.8105 25.9322 20.1961C27.8531 17.5817 28.8136 15.1961 28.8136 13.0392C28.8136 12.3856 28.5574 12.0588 28.0452 12.0588L26.0282 12.2549C23.9793 12.2549 22.3465 11.6993 21.1299 10.5882C19.9134 9.54248 19.3051 8.10457 19.3051 6.27451C19.3051 4.44444 19.9454 2.94118 21.226 1.7647C22.4426 0.588234 23.9793 0 25.8362 0C28.2693 0 30.2542 0.882351 31.791 2.64706C33.2637 4.47712 34 6.96078 34 10.098C34 13.7582 32.9435 17.1895 30.8305 20.3922C28.7175 23.6601 25.42 26.8627 20.9379 30L18.4407 27.0588Z" fill="#181616"/>
    </svg>
  </div>

  <!-- Paragraph -->
  <p class="absolute left-[5.5%] top-[82px] w-[1045px] -ml-[12px] mt-[10px] text-center text-[18px] leading-[28px] font-normal font-poppins text-[#142137B3]">
    Cleaning is more than just visiting places—it's about creating lasting memories, discovering new cultures periencing the extrinary. From breathtaking landscapes to immercal advres, ate seamless travel experiences tailored to
    your dreams. Whether  adventure exploration, we are here to turn your journey.
  </p>

  <!-- Heading -->
  <h2 class="absolute left-[43%] top-[210px] text-[#142137] text-[20px] leading-[34px] font-medium font-poppins tracking-[-0.4px]">
    Don Guidelines
  </h2>

</div>


<!-- third card vedio -->

 <div class="relative mt-[60px] w-[1160px] h-[993px] flex-shrink-0 bg-[#EBEFF3]">
  <!-- vedio button -->
   <div class="absolute top-[24%] left-[45.5%]">
     <img src="./assets/images/Video.png" alt="vedio button"/>
   </div>
  <!-- Image Section -->
  <div class="h-[570px] w-[1160px]">
    <img src="./assets/images/blogBig2.png" alt="images" />
  </div>
  
  <!-- Text Section -->
   <div class="px-[41px] py-[42px] flex flex-col gap-[14px]">
  <!-- First Row -->
  <div class="flex items-center gap-[13px]">
    <!-- Avatar -->
    <div class="w-[54px] h-[54px] flex-shrink-0 aspect-square rounded-[6px] bg-[#CFD4C6] bg-cover bg-no-repeat"><img src="./assets/images/postclient2.jpg" /></div>
    
    <!-- Name -->
    <h2 class="text-[#142137] font-poppins text-[18px] font-semibold leading-none">Indigo Violet</h2>
    
    
    <!-- Service Type -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[10px] flex gap-[5px] items-center text-center font-poppins text-[16px] font-medium leading-[26px]">
       <!-- Phone Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none" class="w-[22px] h-[22px] flex-shrink-0 aspect-square">
      <path d="M16.3906 0.00652348C17.3671 0.00652348 18.3446 0.0285093 19.3211 0.00102703C20.8363 -0.0411124 22.0281 1.21941 21.9997 2.69245C21.9631 4.58415 21.9887 6.47767 21.9915 8.37028C21.9933 9.80119 21.4821 11.0177 20.4726 12.0263C17.4386 15.0576 14.4064 18.0907 11.3696 21.1202C10.1998 22.2864 8.67634 22.2946 7.51568 21.1367C5.28962 18.9161 3.06814 16.691 0.849406 14.4631C-0.0190321 13.5901 -0.237974 12.4798 0.268615 11.4492C0.40053 11.1808 0.583745 10.9215 0.795358 10.7099C3.87245 7.6136 6.95412 4.52094 10.0459 1.43926C11.0078 0.480134 12.1913 0.0120199 13.5517 0.00743955C14.498 0.00377525 15.4443 0.00743955 16.3906 0.00743955V0.00652348ZM16.3503 1.73241C15.48 1.73241 14.6098 1.74981 13.7395 1.72783C12.6823 1.70034 11.8166 2.0796 11.0755 2.82528C8.11662 5.80252 5.14671 8.7706 2.18229 11.7423C2.07511 11.8504 1.96244 11.9576 1.87816 12.0822C1.66929 12.3891 1.68395 12.7665 1.90747 13.0642C1.98076 13.1613 2.07053 13.2456 2.15664 13.3327C4.32408 15.5047 6.49242 17.6758 8.66077 19.8469C8.73589 19.922 8.81009 20.0008 8.89345 20.0667C9.22599 20.3287 9.61074 20.337 9.94877 20.0869C10.0468 20.0145 10.1329 19.9275 10.2199 19.8414C13.2127 16.8531 16.2019 13.8631 19.1975 10.8776C19.9157 10.1612 20.2839 9.31842 20.2702 8.29516C20.2528 6.90639 20.2656 5.51671 20.2656 4.12794C20.2656 3.60853 20.2766 3.08911 20.2601 2.57062C20.2436 2.05853 19.9331 1.76264 19.4191 1.73424C19.3129 1.72874 19.2057 1.73149 19.0985 1.73149C18.1824 1.73149 17.2664 1.73149 16.3503 1.73149V1.73241Z" fill="#1D92CD"/>
      <path d="M15.747 3.57547C17.1935 3.56815 18.3377 4.70408 18.3358 6.14598C18.334 7.56315 17.1962 8.7119 15.7873 8.71832C14.3555 8.72473 13.1893 7.56773 13.1912 6.1414C13.1921 4.72881 14.3344 3.5828 15.747 3.57547ZM16.6127 6.14415C16.6127 5.66412 16.2582 5.30502 15.7791 5.29953C15.2991 5.29403 14.9317 5.6458 14.9225 6.12033C14.9125 6.61684 15.2844 6.99426 15.7791 6.98785C16.2591 6.98235 16.6136 6.62325 16.6136 6.14415H16.6127Z" fill="#1D92CD"/>
    </svg>
      <h1>Laundry Services</h1>
    </div>
    
    
    
    <!-- Date -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
      <!-- Calendar Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 19 20" fill="none" class="w-[16.201px] h-[18px] flex-shrink-0">
      <path d="M5.75195 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M12.9531 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M17.4528 6.84927V14.4997C17.4528 17.1999 16.1027 19 12.9525 19H5.75218C2.60202 19 1.25195 17.1999 1.25195 14.4997V6.84927C1.25195 4.14911 2.60202 2.349 5.75218 2.349H12.9525C16.1027 2.349 17.4528 4.14911 17.4528 6.84927Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 9.09912H12.9523" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 13.5994H9.35213" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
      <h2>April 12, 2025</h2>
    </div>
 
    
    <!-- Comment Count -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
         
    <!-- Comment Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 20 20" fill="none" class="w-[17.941px] h-[18px] flex-shrink-0">
      <path d="M18.9411 6.37784V10.8687C18.9411 11.1606 18.9298 11.4413 18.8962 11.7108C18.6379 14.7421 16.8528 16.2465 13.5632 16.2465H13.1142C12.8335 16.2465 12.564 16.3813 12.3956 16.6058L11.0484 18.4022C10.4533 19.1993 9.48776 19.1993 8.89272 18.4022L7.54544 16.6058C7.39949 16.4149 7.07392 16.2465 6.82692 16.2465H6.37784C2.79636 16.2465 1 15.3596 1 10.8687V6.37784C1 3.08827 2.51568 1.30314 5.5358 1.04492C5.80525 1.01124 6.08593 1 6.37784 1H13.5632C17.1447 1 18.9411 2.79636 18.9411 6.37784Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M13.904 9.13973H13.9141" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M9.98209 9.13973H9.99219" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M6.04849 9.13973H6.0586" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h2>02 Comment</h2></div>
  </div>
  
  <!-- Second Row - Title -->
  <div class="text-[#142137] font-poppins text-[34px] font-semibold leading-[64px] tracking-[-0.68px]"> <h1>Laundry Hacks Save Time, Money, & Effort</h1>

  </div>
  
  <!-- Third Row - Description -->
  <div class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
    Cleaning is more than just visiting places—it's about creating lasting memories, discovering new cultures, and experiencing the extrinary. From breathtaking landscapes to immersive local adventures, we curate seamless travel experiences tailored to your dreams. Whether you seek relaxation, adventure, or cultural exploration.
  </div>
  
  <!-- Fourth Row - Button -->
<div class="flex flex-col items-start gap-3 mt-[38px]">
  <button class="w-[173px] h-[54px] flex items-center gap-3 pl-[30px] py-[22px] rounded-full border border-[rgba(20,33,55,0.20)] bg-[#142137] text-white font-poppins text-[16px] font-medium">
  Read More
  <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full bg-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 15 14" fill="none">
      <path d="M0.853516 7.1615L12.8535 7.1615" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M7.85352 13.1611L13.8535 7.16113L7.85352 1.16113" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>
</button>

</div>


  </div>
</div>


<!-- Four Card -->

 <div class="relative mt-[60px] w-[1160px] h-[993px] flex-shrink-0 bg-[#EBEFF3]">
  <!-- Image Section -->
   <div class="w-[1160px] h-[570px]">
  <img src="./assets/images/blogBig3.png" alt="images" class="h- w-full object-cover" />
  </div>

  <!-- Array Buttons -->
  <div class="absolute top-[29%] left-0 right-0 transform -translate-y-1/2 flex justify-between px-[30px]">
    <img src="./assets/images/arrayleft.png" alt="array left" class="cursor-pointer" />
    <img src="./assets/images/arrayright.png" alt="array right" class="cursor-pointer" />
  </div>
  
  <!-- Text Section -->
   <div class="pl-[41px] pr-[10px] py-[42px] flex flex-col gap-[14px]">
  <!-- First Row -->
  <div class="flex items-center gap-[13px]">
    <!-- Avatar -->
    <div class="w-[54px] h-[54px] flex-shrink-0 aspect-square rounded-[6px] bg-[#CFD4C6] bg-cover bg-no-repeat"><img src="./assets/images/postclient3.jpg" /></div>
    
    <!-- Name -->
    <h2 class="text-[#142137] font-poppins text-[18px] font-semibold leading-none">Alan Fresco</h2>
    
    
    <!-- Service Type -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[10px] flex gap-[5px] items-center text-center font-poppins text-[16px] font-medium leading-[26px]">
       <!-- Phone Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" fill="none" class="w-[22px] h-[22px] flex-shrink-0 aspect-square">
      <path d="M16.3906 0.00652348C17.3671 0.00652348 18.3446 0.0285093 19.3211 0.00102703C20.8363 -0.0411124 22.0281 1.21941 21.9997 2.69245C21.9631 4.58415 21.9887 6.47767 21.9915 8.37028C21.9933 9.80119 21.4821 11.0177 20.4726 12.0263C17.4386 15.0576 14.4064 18.0907 11.3696 21.1202C10.1998 22.2864 8.67634 22.2946 7.51568 21.1367C5.28962 18.9161 3.06814 16.691 0.849406 14.4631C-0.0190321 13.5901 -0.237974 12.4798 0.268615 11.4492C0.40053 11.1808 0.583745 10.9215 0.795358 10.7099C3.87245 7.6136 6.95412 4.52094 10.0459 1.43926C11.0078 0.480134 12.1913 0.0120199 13.5517 0.00743955C14.498 0.00377525 15.4443 0.00743955 16.3906 0.00743955V0.00652348ZM16.3503 1.73241C15.48 1.73241 14.6098 1.74981 13.7395 1.72783C12.6823 1.70034 11.8166 2.0796 11.0755 2.82528C8.11662 5.80252 5.14671 8.7706 2.18229 11.7423C2.07511 11.8504 1.96244 11.9576 1.87816 12.0822C1.66929 12.3891 1.68395 12.7665 1.90747 13.0642C1.98076 13.1613 2.07053 13.2456 2.15664 13.3327C4.32408 15.5047 6.49242 17.6758 8.66077 19.8469C8.73589 19.922 8.81009 20.0008 8.89345 20.0667C9.22599 20.3287 9.61074 20.337 9.94877 20.0869C10.0468 20.0145 10.1329 19.9275 10.2199 19.8414C13.2127 16.8531 16.2019 13.8631 19.1975 10.8776C19.9157 10.1612 20.2839 9.31842 20.2702 8.29516C20.2528 6.90639 20.2656 5.51671 20.2656 4.12794C20.2656 3.60853 20.2766 3.08911 20.2601 2.57062C20.2436 2.05853 19.9331 1.76264 19.4191 1.73424C19.3129 1.72874 19.2057 1.73149 19.0985 1.73149C18.1824 1.73149 17.2664 1.73149 16.3503 1.73149V1.73241Z" fill="#1D92CD"/>
      <path d="M15.747 3.57547C17.1935 3.56815 18.3377 4.70408 18.3358 6.14598C18.334 7.56315 17.1962 8.7119 15.7873 8.71832C14.3555 8.72473 13.1893 7.56773 13.1912 6.1414C13.1921 4.72881 14.3344 3.5828 15.747 3.57547ZM16.6127 6.14415C16.6127 5.66412 16.2582 5.30502 15.7791 5.29953C15.2991 5.29403 14.9317 5.6458 14.9225 6.12033C14.9125 6.61684 15.2844 6.99426 15.7791 6.98785C16.2591 6.98235 16.6136 6.62325 16.6136 6.14415H16.6127Z" fill="#1D92CD"/>
    </svg>
      <h1>Laundry Services</h1>
    </div>
    
    
    
    <!-- Date -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
      <!-- Calendar Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 19 20" fill="none" class="w-[16.201px] h-[18px] flex-shrink-0">
      <path d="M5.75195 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M12.9531 1V3.70016" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M17.4528 6.84927V14.4997C17.4528 17.1999 16.1027 19 12.9525 19H5.75218C2.60202 19 1.25195 17.1999 1.25195 14.4997V6.84927C1.25195 4.14911 2.60202 2.349 5.75218 2.349H12.9525C16.1027 2.349 17.4528 4.14911 17.4528 6.84927Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 9.09912H12.9523" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M5.75195 13.5994H9.35213" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
      <h2>May 09, 2025</h2>
    </div>
 
    
    <!-- Comment Count -->
    <div class="text-[rgba(20,33,55,0.60)] pl-[7px] flex items-center gap-[7px] text-center font-poppins text-[16px] font-medium leading-[26px]">
         
    <!-- Comment Icon -->
    <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 20 20" fill="none" class="w-[17.941px] h-[18px] flex-shrink-0">
      <path d="M18.9411 6.37784V10.8687C18.9411 11.1606 18.9298 11.4413 18.8962 11.7108C18.6379 14.7421 16.8528 16.2465 13.5632 16.2465H13.1142C12.8335 16.2465 12.564 16.3813 12.3956 16.6058L11.0484 18.4022C10.4533 19.1993 9.48776 19.1993 8.89272 18.4022L7.54544 16.6058C7.39949 16.4149 7.07392 16.2465 6.82692 16.2465H6.37784C2.79636 16.2465 1 15.3596 1 10.8687V6.37784C1 3.08827 2.51568 1.30314 5.5358 1.04492C5.80525 1.01124 6.08593 1 6.37784 1H13.5632C17.1447 1 18.9411 2.79636 18.9411 6.37784Z" stroke="#1D92CD" stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M13.904 9.13973H13.9141" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M9.98209 9.13973H9.99219" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M6.04849 9.13973H6.0586" stroke="#1D92CD" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
    <h2>02 Comment</h2></div>
  </div>
  
  <!-- Second Row - Title -->
  <div class="text-[#142137] font-poppins text-[34px] font-semibold leading-[64px] tracking-[-0.68px]"> <h1>Keep Your Clothes Fresh & Clean for Longer.</h1>

  </div>
  
  <!-- Third Row - Description -->
  <div class="text-[rgba(20,33,55,0.70)] -mt-[8px] font-poppins text-[16px] font-normal leading-[26px]">
    Cleaning is more than just visiting places—it's about creating lasting memories, discovering new cultures, and experiencing the extrinary. From breathtaking landscapes to immersive local adventures, we curate seamless travel experiences tailored to your dreams. Whether you seek relaxation, adventure, or cultural exploration.
  </div>
  
  <!-- Fourth Row - Button -->
<div class="flex flex-col items-start gap-3 mt-[38px]">
  <button class="w-[173px] h-[54px] flex items-center gap-3 pl-[30px] py-[22px] rounded-full border border-[rgba(20,33,55,0.20)] bg-[#142137] text-white font-poppins text-[16px] font-medium">
  Read More
  <div class="w-[34px] h-[34px] flex items-center justify-center rounded-full bg-white">
    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12" viewBox="0 0 15 14" fill="none">
      <path d="M0.853516 7.1615L12.8535 7.1615" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
      <path d="M7.85352 13.1611L13.8535 7.16113L7.85352 1.16113" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
    </svg>
  </div>
</button>

</div>


  </div>
</div>




  <!-- Pagination -->

  <div class="flex items-center justify-center pt-16 pb-1.5">
  <div class="flex gap-2.5">
    <!-- Left Arrow -->
    <button class="w-[44px] h-[44px]">
      <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
  <path d="M43.5 0.5V43.5H0.5V0.5H43.5Z" stroke="#142137" stroke-opacity="0.1"/>
  <path opacity="0.6" d="M25 17L20 22L25 27" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
    </button>

    <!-- Page 01 -->
    <button class="w-[44px] h-[44px] border border-[#1421371A] bg-transparent text-[#14213799] text-[16px] font-medium leading-[26px] font-[Poppins]">
      01
    </button>

    <!-- Page 02 - Active -->
    <button class="w-[44px] h-[44px] bg-[#4375E7] text-white text-[16px] font-medium leading-[26px] font-[Poppins]">
      02
    </button>

    <!-- Page 03 -->
    <button class="w-[44px] h-[44px] border border-[#1421371A] bg-transparent text-[#14213799] text-[16px] font-medium leading-[26px] font-[Poppins]">
      03
    </button>

    <!-- Right Arrow -->
    <button class="w-[44px] h-[44px] flex items-center justify-center border border-[#1421371A] ">
     <svg xmlns="http://www.w3.org/2000/svg" width="44" height="44" viewBox="0 0 44 44" fill="none">
  <path d="M43.5 0.5V43.5H0.5V0.5H43.5Z" stroke="#142137" stroke-opacity="0.1"/>
  <path opacity="0.6" d="M20 17L25 22L20 27" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
    </button>
  </div>
</div>

 </div>



 <!-- Blog Right Sidebar -->
     <!-- Right Sidebar from sidebar.php -->
<?php get_sidebar(); ?>



 </section>

<?php get_footer(); ?>
