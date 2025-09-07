<?php 
/**
 * Testimonial Section
 */
?>

<section class="blog-area bg-[#ECF2FE] w-full flex flex-col py-8 md:py-12 items-center justify-center gap-5">
 <!-- heading -->
    <div class="heading px-[2.5%] lg:px-[5%] 2xl:px-[8%] flex flex-col gap-2 md:gap-4 justify-center items-center">
      <button
        class="w-[222px] h-[29px] border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-[16px] font-[500] leading-none text-[rgba(20,33,55,0.70)] py-2 px-[12px] font-poppins">
        <!-- Dot -->
        <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
        Our Happy Customers
      </button>
      <h1
        class="text-[#142137] max-w-[563px] text-center font-poppins text-[40px] md:text-[44px] xl:text-[54px] not-italic font-semibold leading-[64px] tracking-[-1.08px]">
        Raving Reviews From
        Satisfied Clients.</h1>
    </div>

<div class="w-full mx-auto pt-2 md:pt-5">
      <!-- left to right testimonial -->
    <div class="testimonial-items1" dir="rtl">
        <?php for($i=1; $i<=5; $i++): ?>
        <div class="w-[513px] h-[270px] sm:h-[240px] md:h-[300px] lg:h-[320px] xl:h-[280px] bg-white shadow-[0_10px_15px_0_rgba(20,33,55,0.2)] pl-7 py-7 pr-5 flex flex-col gap-6"
            dir="ltr">
            <div class="w-20 h-4 mb-3 flex gap-1">
                <?php for($j=1; $j<=5; $j++): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path
                        d="M11.1418 8.70889C10.9605 8.89383 10.8772 9.16128 10.9185 9.42358L11.5407 13.0486C11.5932 13.3558 11.47 13.6668 11.2257 13.8443C10.9864 14.0285 10.6679 14.0506 10.4069 13.9033L7.30696 12.2013C7.19917 12.1409 7.07949 12.1085 6.957 12.1048H6.76733C6.70154 12.1151 6.63715 12.1372 6.57835 12.1711L3.47776 13.8812C3.32448 13.9622 3.1509 13.991 2.98082 13.9622C2.56648 13.8797 2.29001 13.4642 2.3579 13.0258L2.98082 9.40074C3.02212 9.13623 2.93883 8.8673 2.75755 8.67942L0.230183 6.10065C0.0188106 5.88476 -0.0546798 5.56058 0.0419076 5.26807C0.135695 4.9763 0.375064 4.76337 0.664126 4.71547L4.14267 4.18425C4.40724 4.15551 4.63961 3.98605 4.75859 3.73554L6.29139 0.42734C6.32779 0.353661 6.37468 0.285876 6.43137 0.228406L6.49436 0.17683C6.52726 0.138517 6.56506 0.106835 6.60705 0.0810472L6.68334 0.0515755L6.80232 0H7.09699C7.36015 0.0287349 7.59182 0.194513 7.7129 0.442076L9.266 3.73554C9.37799 3.97647 9.59566 4.14372 9.84693 4.18425L13.3255 4.71547C13.6194 4.75968 13.8651 4.97335 13.9624 5.26807C14.0541 5.56352 13.975 5.88771 13.7594 6.10065L11.1418 8.70889Z"
                        fill="#F59E0B" />
                </svg>
                <?php endfor; ?>
            </div>
            <p class="text-[rgba(20,33,55,0.7)] font-poppins text-[16px] font-normal leading-[26px] mt-2">
                Maecenas eget ullamcorper dolor placerat ipsum, aliquam dictum massa eu libero vehicula id dapibus
                ligula vulputate.
            </p>
            <div class="flex justify-between items-center mt-6">
                <div class="flex items-center gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial01.png" alt="User"
                        class="w-14 h-14 rounded-md object-cover">
                    <div class="flex flex-col mt-1">
                        <h2 class="text-[#142137] font-poppins text-[18px] font-semibold leading-normal">Fletch Skinner
                        </h2>
                        <h4
                            class="text-[rgba(20,33,55,0.7)] font-poppins text-[15px] font-medium leading-[26px] uppercase">
                            Businessman</h4>
                    </div>
                </div>
                <!-- Right: Quote Icon -->
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="36" viewBox="0 0 48 36" fill="none">
                        <path
                            d="M28.6963 18.7847L46.3326 34.5144C46.9771 35.0893 47.9982 34.6318 47.9982 33.7682V1C47.9982 0.447715 47.5505 0 46.9982 0H29.3619C28.8096 0 28.3619 0.447714 28.3619 0.999998V18.0384C28.3619 18.3235 28.4835 18.595 28.6963 18.7847Z"
                            fill="#142137" fill-opacity="0.12" />
                        <path
                            d="M0.334209 18.7847L17.9705 34.5144C18.615 35.0893 19.6361 34.6318 19.6361 33.7682V1C19.6361 0.447715 19.1884 0 18.6361 0H0.999826C0.44754 0 -0.000173569 0.447714 -0.000173569 0.999998V18.0384C-0.000173569 18.3235 0.121475 18.595 0.334209 18.7847Z"
                            fill="#142137" fill-opacity="0.12" />
                    </svg>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>

     <!-- right to left testimonial -->
    <div class="testimonial-items2" >
        <?php for($i=1; $i<=5; $i++): ?>
        <div class="w-[513px] h-[270px] sm:h-[240px] md:h-[300px] lg:h-[320px] xl:h-[280px] bg-white shadow-[0_10px_15px_0_rgba(20,33,55,0.2)] pl-7 py-7 pr-5 flex flex-col gap-6"
            dir="ltr">
            <div class="w-20 h-4 mb-3 flex gap-1">
                <?php for($j=1; $j<=5; $j++): ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none">
                    <path
                        d="M11.1418 8.70889C10.9605 8.89383 10.8772 9.16128 10.9185 9.42358L11.5407 13.0486C11.5932 13.3558 11.47 13.6668 11.2257 13.8443C10.9864 14.0285 10.6679 14.0506 10.4069 13.9033L7.30696 12.2013C7.19917 12.1409 7.07949 12.1085 6.957 12.1048H6.76733C6.70154 12.1151 6.63715 12.1372 6.57835 12.1711L3.47776 13.8812C3.32448 13.9622 3.1509 13.991 2.98082 13.9622C2.56648 13.8797 2.29001 13.4642 2.3579 13.0258L2.98082 9.40074C3.02212 9.13623 2.93883 8.8673 2.75755 8.67942L0.230183 6.10065C0.0188106 5.88476 -0.0546798 5.56058 0.0419076 5.26807C0.135695 4.9763 0.375064 4.76337 0.664126 4.71547L4.14267 4.18425C4.40724 4.15551 4.63961 3.98605 4.75859 3.73554L6.29139 0.42734C6.32779 0.353661 6.37468 0.285876 6.43137 0.228406L6.49436 0.17683C6.52726 0.138517 6.56506 0.106835 6.60705 0.0810472L6.68334 0.0515755L6.80232 0H7.09699C7.36015 0.0287349 7.59182 0.194513 7.7129 0.442076L9.266 3.73554C9.37799 3.97647 9.59566 4.14372 9.84693 4.18425L13.3255 4.71547C13.6194 4.75968 13.8651 4.97335 13.9624 5.26807C14.0541 5.56352 13.975 5.88771 13.7594 6.10065L11.1418 8.70889Z"
                        fill="#F59E0B" />
                </svg>
                <?php endfor; ?>
            </div>
            <p class="text-[rgba(20,33,55,0.7)] font-poppins text-[16px] font-normal leading-[26px] mt-2">
                Maecenas eget ullamcorper dolor placerat ipsum, aliquam dictum massa eu libero vehicula id dapibus
                ligula vulputate.
            </p>
            <div class="flex justify-between items-center mt-6">
                <div class="flex items-center gap-4">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/testimonial01.png" alt="User"
                        class="w-14 h-14 rounded-md object-cover">
                    <div class="flex flex-col mt-1">
                        <h2 class="text-[#142137] font-poppins text-[18px] font-semibold leading-normal">Fletch Skinner
                        </h2>
                        <h4
                            class="text-[rgba(20,33,55,0.7)] font-poppins text-[15px] font-medium leading-[26px] uppercase">
                            Businessman</h4>
                    </div>
                </div>
                <!-- Right: Quote Icon -->
                <div class="">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="36" viewBox="0 0 48 36" fill="none">
                        <path
                            d="M28.6963 18.7847L46.3326 34.5144C46.9771 35.0893 47.9982 34.6318 47.9982 33.7682V1C47.9982 0.447715 47.5505 0 46.9982 0H29.3619C28.8096 0 28.3619 0.447714 28.3619 0.999998V18.0384C28.3619 18.3235 28.4835 18.595 28.6963 18.7847Z"
                            fill="#142137" fill-opacity="0.12" />
                        <path
                            d="M0.334209 18.7847L17.9705 34.5144C18.615 35.0893 19.6361 34.6318 19.6361 33.7682V1C19.6361 0.447715 19.1884 0 18.6361 0H0.999826C0.44754 0 -0.000173569 0.447714 -0.000173569 0.999998V18.0384C-0.000173569 18.3235 0.121475 18.595 0.334209 18.7847Z"
                            fill="#142137" fill-opacity="0.12" />
                    </svg>
                </div>
            </div>
        </div>
        <?php endfor; ?>
    </div>

</div>
</section>