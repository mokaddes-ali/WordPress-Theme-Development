<?php 
/**
 * Sevices Section
 */
?>

<!-- company service -->
<section class="w-full mx-auto relative h-auto mt-[150px] bg-[#ECF2FE] px-[2.5%] lg:px-[5%] 2xl:px-[8%] pt-[50px] pb-[60px] 2xl:pt-[100px] 2xl:pb-[135px] flex flex-col gap-[34px]">
    <!-- heading -->
    <div class="heading flex flex-col gap-[20px] justify-center items-center">
        <button class="w-[142px] h-[29px] border border-[rgba(20,33,55,0.14)] flex items-center gap-2 flex-shrink-0 text-[16px] font-[500] leading-none text-[rgba(20,33,55,0.70)] py-2 px-[12px] font-poppins">
            <!-- Dot -->
            <span class="w-[5px] h-[5px] bg-[#142137] flex-shrink-0 aspect-square"></span>
            Our Services
        </button>
        <h1 class="text-[#142137] w-full md:w-[663px] text-center font-poppins text-[36px] md:text-[54px] not-italic font-semibold leading-[44px] md:leading-[64px] tracking-[-0.72px] md:tracking-[-1.08px] px-4">
            The Solutions We Provide For Our Clients.
        </h1>
    </div>

    <!-- Cards -->
    <div class="relative grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 px-4 sm:px-0">
      <!-- Card --01 -->
<div class="relative w-full flex flex-col items-center md:items-start gap-[20px] pb-5 sm:pb-0 sm:border-b-0 border-b border-b-[rgba(20,33,55,0.14)] sm:pr-4 sm:border-r border-[rgba(20,33,55,0.14)]">
    
    <!-- Icon Image -->
    <div class="image pt-9 pb-[22px]">
        <img src="<?php echo get_template_directory_uri()?>/assets/images/service1.png" class="w-[60px]" />
    </div>

    <!-- Card Content -->
    <div class="flex flex-col items-center md:items-start gap-[15px]">
          <div class="group">
            <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[24px] md:text-[30px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                Laundry Service
            </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[80%] group-hover:block pt-4">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/service5.png" class="w-[350px]" />
                </div>
           </div>

        <!-- Description -->
        <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[16px] leading-[26px]">
            Our expert team ensures that your garments are cleaned to the highest standards, using eco-friendly detergents.
        </p>

        <!-- Button -->
        <button class="hover:text-[#4375E7] text-[#142137] mt-[20px] md:mt-[30px] flex gap-[10px] font-poppins text-[15px] font-medium leading-none cursor-pointer">
            Read More
            <span class="pt-1">
                <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" fill="none" viewBox="0 0 12 12">
                    <path d="M1 6L11 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M6 1L11 6L6 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>
        </button>
    </div>
</div>


        <!-- Card 2 -->
        <div class="relative w-full flex flex-col items-center md:items-start gap-[30px] md:pr-4 md:border-r border-[rgba(20,33,55,0.14)]">
            <div class="image pt-9 pb-[22px]">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/service2.png" />
            </div>
            <div class="card-body flex flex-col gap-[22px] items-center md:items-start">
                <div class="group">
                   <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[24px] md:text-[30px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                  Laundry Service
                 </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[80%] group-hover:block pt-4">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/service5.png" class="w-[350px]" />
                </div>
               </div>
                <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[16px] not-italic font-normal leading-[26px]">
                    Our expert team ensures that your garments are cleaned to the highest standards, using eco-friendly detergents.
                </p>
                <button class="text-[#142137] mt-[20px] md:mt-[46px] flex gap-[10px] font-poppins text-[15px] not-italic font-medium leading-none">
                    Read More
                    <span class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M1 6L11 6" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 1L11 6L6 11" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="w-full flex flex-col gap-[30px] items-center md:items-start sm:pr-4 md:pr-6 sm:border-r border-[rgba(20,33,55,0.14)]">
            <div class="image pt-8 pb-[18px]">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/service3.png"/>
            </div>
            <div class="card-body flex flex-col gap-[22px] items-center md:items-start">
                <div class="group">
                   <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[24px] md:text-[30px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                  Laundry Service
                 </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[80%] group-hover:block pt-4">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/service5.png" class="w-[350px]" />
                </div>
               </div>
                <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[16px] not-italic font-normal leading-[26px]">
                    Our expert team ensures that your garments are cleaned to the highest standards, using eco-friendly
                    detergents.
                </p>
                <button class="text-[#142137] mt-[20px] md:mt-[46px] flex gap-[10px] font-poppins text-[15px] not-italic font-medium leading-none">
                    Read More
                    <span class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M1 6L11 6" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 1L11 6L6 11" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="w-full flex flex-col items-center md:items-start gap-[30px]">
            <div class="image pt-8 pb-[20px]">
                <img src="<?php echo get_template_directory_uri()?>/assets/images/service4.png" />
            </div>
            <div class="card-body flex flex-col gap-[22px] items-center md:items-start">
                 <div class="group">
                   <h1 class="text-[#142137] hover:text-[#4375E7]  font-poppins text-[24px] md:text-[30px] font-semibold leading-none tracking-[-0.48px] cursor-pointer">
                  Laundry Service
                 </h1>

            <!-- Hover Image -->
               <div class="hidden absolute top-[80%] group-hover:block pt-4">
                   <img src="<?php echo get_template_directory_uri()?>/assets/images/service5.png" class="w-[350px]" />
                </div>
               </div>
                <p class="text-[rgba(20,33,55,0.7)] text-center md:text-start font-poppins text-[16px] not-italic font-normal leading-[26px]">
                    Our expert team ensures that your garments are cleaned to the highest standards, using eco-friendly
                    detergents.
                </p>
                <button class="text-[#142137] mt-[20px] md:mt-[46px] flex gap-[10px] font-poppins text-[15px] not-italic font-medium leading-none">
                    Read More
                    <span class="pt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12" fill="none">
                            <path d="M1 6L11 6" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6 1L11 6L6 11" stroke="#142137" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </button>
            </div>
        </div>
    </div>
</section>