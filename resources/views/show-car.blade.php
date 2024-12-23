@extends("layouts.public-pages")
@section("content")
 <div><section class="py-8 bg-white md:py-16 dark:bg-gray-900 antialiased">
         <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0">
             <div class="grid lg:grid-cols-2 gap-8">
                 <div class="max-w-md lg:max-w-lg mx-auto">
                     <div id="product-1-tab-content">
                         <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-900" id="product-1-image-1" role="tabpanel" aria-labelledby="product-1-image-1-tab">
                             <img class="w-full mx-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg" alt="" />
                             <img class="w-full mx-auto hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg" alt="" />
                         </div>
                         <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-900" id="product-1-image-2" role="tabpanel" aria-labelledby="product-1-image-2-tab">
                             <img class="w-full mx-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back.svg" alt="" />
                             <img class="w-full mx-auto hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back-dark.svg" alt="" />
                         </div>
                         <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-900" id="product-1-image-3" role="tabpanel" aria-labelledby="product-1-image-3-tab">
                             <img class="w-full mx-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg" alt="" />
                             <img class="w-full mx-auto hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg" alt="" />
                         </div>
                         <div class="hidden p-4 rounded-lg bg-white dark:bg-gray-900" id="product-1-image-4" role="tabpanel" aria-labelledby="product-1-image-4-tab">
                             <img class="w-full mx-auto dark:hidden" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg" alt="" />
                             <img class="w-full mx-auto hidden dark:block" src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side-dark.svg" alt="" />
                         </div>
                     </div>

                     <ul class="grid grid-cols-4 gap-4 mt-8" id="product-1-tab" data-tabs-toggle="#product-1-tab-content" data-tabs-active-classes="border-gray-200 dark:border-gray-700" data-tabs-inactive-classes="border-transparent hover:border-gray-200 dark:hover:dark:border-gray-700 dark:border-transparent" role="tablist">
                         <li class="me-2" role="presentation">
                             <button class="h-20 w-20 overflow-hidden border-2 rounded-lg sm:h-20 sm:w-20 md:h-24 md:w-24 p-2 cursor-pointer mx-auto" id="product-1-image-1-tab" data-tabs-target="#product-1-image-1" type="button" role="tab" aria-controls="product-1-image-1" aria-selected="false">
                                 <img
                                     class="object-contain w-full h-full dark:hidden"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front.svg"
                                     alt=""
                                 />
                                 <img
                                     class="object-contain w-full h-full hidden dark:block"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-front-dark.svg"
                                     alt=""
                                 />
                             </button>
                         </li>
                         <li class="me-2" role="presentation">
                             <button class="h-20 w-20 overflow-hidden border-2 rounded-lg sm:h-20 sm:w-20 md:h-24 md:w-24 p-2 cursor-pointer mx-auto" id="product-1-image-2-tab" data-tabs-target="#product-1-image-2" type="button" role="tab" aria-controls="product-1-image-2" aria-selected="false">
                                 <img
                                     class="object-contain w-full h-full dark:hidden"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back.svg"
                                     alt=""
                                 />
                                 <img
                                     class="object-contain w-full h-full hidden dark:block"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-back-dark.svg"
                                     alt=""
                                 />
                             </button>
                         </li>
                         <li class="me-2" role="presentation">
                             <button class="h-20 w-20 overflow-hidden border-2 rounded-lg sm:h-20 sm:w-20 md:h-24 md:w-24 p-2 cursor-pointer mx-auto" id="product-1-image-3-tab" data-tabs-target="#product-1-image-3" type="button" role="tab" aria-controls="product-1-image-3" aria-selected="false">
                                 <img
                                     class="object-contain w-full h-full dark:hidden"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components.svg"
                                     alt=""
                                 />
                                 <img
                                     class="object-contain w-full h-full hidden dark:block"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-components-dark.svg"
                                     alt=""
                                 />
                             </button>
                         </li>
                         <li class="me-2" role="presentation">
                             <button class="h-20 w-20 overflow-hidden border-2 rounded-lg sm:h-20 sm:w-20 md:h-24 md:w-24 p-2 cursor-pointer mx-auto" id="product-1-image-4-tab" data-tabs-target="#product-1-image-4" type="button" role="tab" aria-controls="product-1-image-4" aria-selected="false">
                                 <img
                                     class="object-contain w-full h-full dark:hidden"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side.svg"
                                     alt=""
                                 />
                                 <img
                                     class="object-contain w-full h-full hidden dark:block"
                                     src="https://flowbite.s3.amazonaws.com/blocks/e-commerce/imac-side-dark.svg"
                                     alt=""
                                 />
                             </button>
                         </li>
                     </ul>

                 </div>

                 <div class="mt-6 md:mt-0">
        <span
            class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300"
        >
          In stock
        </span>
                     <p
                         class="mt-4 text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white"
                     >
                         Apple iMac 24" All-In-One Computer, Apple M1, 8GB RAM, 256GB SSD,
                         Mac OS, Pink
                     </p>
                     <div class="mt-4 xl:items-center xl:gap-4 xl:flex">
                         <div class="flex items-center gap-2">
                             <div class="flex items-center gap-1">
                                 <svg
                                     class="w-4 h-4 text-yellow-300"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                     />
                                 </svg>
                                 <svg
                                     class="w-4 h-4 text-yellow-300"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                     />
                                 </svg>
                                 <svg
                                     class="w-4 h-4 text-yellow-300"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                     />
                                 </svg>
                                 <svg
                                     class="w-4 h-4 text-yellow-300"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                     />
                                 </svg>
                                 <svg
                                     class="w-4 h-4 text-yellow-300"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="currentColor"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z"
                                     />
                                 </svg>
                             </div>
                             <p
                                 class="text-sm font-medium leading-none text-gray-500 dark:text-gray-400"
                             >
                                 (5.0)
                             </p>
                             <a
                                 href="#"
                                 class="text-sm font-medium leading-none text-gray-900 underline hover:no-underline dark:text-white"
                             >
                                 345 Reviews
                             </a>
                         </div>

                         <div class="flex items-center gap-1 mt-4 xl:mt-0">
                             <svg
                                 class="w-5 h-5 text-primary-700 dark:text-primary-500"
                                 aria-hidden="true"
                                 xmlns="http://www.w3.org/2000/svg"
                                 width="24"
                                 height="24"
                                 fill="none"
                                 viewBox="0 0 24 24"
                             >
                                 <path
                                     stroke="currentColor"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     stroke-width="2"
                                     d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"
                                 />
                                 <path
                                     stroke="currentColor"
                                     stroke-linecap="round"
                                     stroke-linejoin="round"
                                     stroke-width="2"
                                     d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z"
                                 />
                             </svg>
                             <p
                                 class="text-sm font-medium text-primary-700 dark:text-primary-500"
                             >
                                 Deliver to Bonnie Green- Sacramento 23647
                             </p>
                         </div>
                     </div>

                     <div class="flex items-center justify-between gap-4 mt-6 sm:mt-8">
                         <p
                             class="text-2xl font-extrabold text-gray-900 sm:text-3xl dark:text-white"
                         >
                             $1,249.99
                         </p>

                         <form class="flex items-center gap-2 sm:hidden">
                             <div class="flex items-center gap-1">
                                 <label
                                     for="quantity"
                                     class="text-sm font-medium text-gray-900 dark:text-white"
                                 >Quantity</label
                                 >
                                 <button
                                     data-tooltip-target="quantity-desc-1"
                                     data-tooltip-trigger="hover"
                                     class="text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white"
                                 >
                                     <svg
                                         class="w-4 h-4"
                                         aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         fill="currentColor"
                                         viewBox="0 0 24 24"
                                     >
                                         <path
                                             fill-rule="evenodd"
                                             d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                             clip-rule="evenodd"
                                         />
                                     </svg>
                                 </button>
                                 <div
                                     id="quantity-desc-1"
                                     role="tooltip"
                                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                                 >
                                     Quantity: Number of units to purchase.
                                     <div class="tooltip-arrow" data-popper-arrow></div>
                                 </div>
                             </div>
                             <select
                                 id="quantity"
                                 class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                             >
                                 <option selected>Choose quantity</option>
                                 <option value="2" selected>1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                             </select>
                         </form>
                     </div>

                     <div class="mt-6 sm:gap-4 sm:flex sm:items-center sm:mt-8">
                         <div class="sm:gap-4 sm:items-center sm:flex">
                             <a
                                 href="#"
                                 title=""
                                 class="flex items-center justify-center py-2.5 px-5 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                                 role="button"
                             >
                                 <svg
                                     class="w-5 h-5 -ms-2 me-2"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         stroke="currentColor"
                                         stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2"
                                         d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"
                                     />
                                 </svg>
                                 Add to favorites
                             </a>

                             <a
                                 href="#"
                                 title=""
                                 class="text-white mt-4 sm:mt-0 bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-primary-600 dark:hover:bg-primary-700 focus:outline-none dark:focus:ring-primary-800 flex items-center justify-center"
                                 role="button"
                             >
                                 <svg
                                     class="w-5 h-5 -ms-2 me-2"
                                     aria-hidden="true"
                                     xmlns="http://www.w3.org/2000/svg"
                                     width="24"
                                     height="24"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                 >
                                     <path
                                         stroke="currentColor"
                                         stroke-linecap="round"
                                         stroke-linejoin="round"
                                         stroke-width="2"
                                         d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6"
                                     />
                                 </svg>

                                 Add to cart
                             </a>
                         </div>

                         <form class="items-center hidden gap-2 sm:flex">
                             <div class="flex items-center gap-1">
                                 <label
                                     for="quantity"
                                     class="text-sm font-medium text-gray-900 dark:text-white"
                                 >Quantity</label
                                 >
                                 <button
                                     data-tooltip-target="quantity-desc-2"
                                     data-tooltip-trigger="hover"
                                     class="text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white"
                                 >
                                     <svg
                                         class="w-4 h-4"
                                         aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg"
                                         width="24"
                                         height="24"
                                         fill="currentColor"
                                         viewBox="0 0 24 24"
                                     >
                                         <path
                                             fill-rule="evenodd"
                                             d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                             clip-rule="evenodd"
                                         />
                                     </svg>
                                 </button>
                                 <div
                                     id="quantity-desc-2"
                                     role="tooltip"
                                     class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"
                                 >
                                     Quantity: Number of units to purchase.
                                     <div class="tooltip-arrow" data-popper-arrow></div>
                                 </div>
                             </div>
                             <select
                                 id="quantity"
                                 class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-16 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                             >
                                 <option selected>0</option>
                                 <option value="2" selected>1</option>
                                 <option value="2">2</option>
                                 <option value="3">3</option>
                                 <option value="4">4</option>
                                 <option value="5">5</option>
                             </select>
                         </form>
                     </div>

                     <hr class="mt-6 border-gray-200 sm:mt-8 dark:border-gray-700" />

                     <div
                         class="grid grid-cols-1 gap-6 mt-6 sm:grid-cols-2 sm:mt-8 sm:gap-y-8"
                     >
                         <div>
                             <p class="text-base font-medium text-gray-900 dark:text-white">
                                 Colour
                             </p>

                             <div class="flex flex-wrap items-center gap-2 mt-2">
                                 <label for="green" class="relative block">
                                     <input
                                         type="radio"
                                         name="colour"
                                         id="green"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">Green</p>
                                     </div>
                                 </label>

                                 <label for="pink" class="relative block">
                                     <input
                                         type="radio"
                                         name="colour"
                                         id="pink"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">Pink</p>
                                     </div>
                                 </label>

                                 <label for="silver" class="relative block">
                                     <input
                                         type="radio"
                                         name="colour"
                                         id="silver"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">Silver</p>
                                     </div>
                                 </label>

                                 <label for="blue" class="relative block">
                                     <input
                                         type="radio"
                                         name="colour"
                                         id="blue"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">Blue</p>
                                     </div>
                                 </label>
                             </div>
                         </div>

                         <div>
                             <p class="text-base font-medium text-gray-900 dark:text-white">
                                 SSD capacity
                             </p>

                             <div class="flex flex-wrap items-center gap-2 mt-2">
                                 <label for="256gb" class="relative block">
                                     <input
                                         type="radio"
                                         name="capacity"
                                         id="256gb"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">256GB</p>
                                     </div>
                                 </label>

                                 <label for="512gb" class="relative block">
                                     <input
                                         type="radio"
                                         name="capacity"
                                         id="512gb"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">512GB</p>
                                     </div>
                                 </label>

                                 <label for="1tb" class="relative block">
                                     <input
                                         type="radio"
                                         name="capacity"
                                         id="1tb"
                                         class="absolute appearance-none top-2 left-2 peer"
                                     />
                                     <div
                                         class="relative flex items-center justify-center gap-4 px-2 py-1 overflow-hidden text-gray-500 hover:bg-gray-100 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 peer-checked:bg-primary-50 peer-checked:text-primary-700 peer-checked:border-primary-700 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-400 dark:peer-checked:bg-primary-900 dark:peer-checked:border-primary-600 dark:peer-checked:text-primary-300 dark:hover:bg-gray-600"
                                     >
                                         <p class="text-sm font-medium">1TB</p>
                                     </div>
                                 </label>
                             </div>
                         </div>

                         <div class="sm:col-span-2">
                             <p class="text-base font-medium text-gray-900 dark:text-white">
                                 Pickup
                             </p>

                             <div class="flex flex-col gap-4 mt-2 sm:flex-row">
                                 <div class="flex">
                                     <div class="flex items-center h-5">
                                         <input
                                             id="shipping-checkbox"
                                             aria-describedby="shipping-checkbox-text"
                                             name="shipping"
                                             type="radio"
                                             value=""
                                             class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                         />
                                     </div>
                                     <div class="text-sm ms-2">
                                         <label
                                             for="shipping-checkbox"
                                             class="font-medium text-gray-900 dark:text-white"
                                         >
                                             Shipping - $19
                                         </label>
                                         <p
                                             id="shipping-checkbox-text"
                                             class="text-xs font-normal text-gray-500 dark:text-gray-400"
                                         >
                                             Arrives Nov 17
                                         </p>
                                     </div>
                                 </div>

                                 <div class="flex">
                                     <div class="flex items-center h-5">
                                         <input
                                             id="pickup-checkbox"
                                             aria-describedby="pickup-checkbox-text"
                                             name="shipping"
                                             type="radio"
                                             value=""
                                             class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                         />
                                     </div>
                                     <div class="text-sm ms-2">
                                         <label
                                             for="pickup-checkbox"
                                             class="font-medium text-gray-900 dark:text-white"
                                         >
                                             Pickup from Flowbox- $9
                                         </label>
                                         <a
                                             href="#"
                                             title=""
                                             id="pickup-checkbox-text"
                                             class="block text-xs font-medium underline text-primary-700 hover:no-underline dark:text-primary-500"
                                         >
                                             Pick a Flowbox near you
                                         </a>
                                     </div>
                                 </div>

                                 <div class="flex">
                                     <div class="flex items-center h-5">
                                         <input
                                             id="pickup-store-checkbox"
                                             aria-describedby="pickup-store-checkbox-text"
                                             name="shipping"
                                             type="radio"
                                             value=""
                                             class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                             disabled
                                         />
                                     </div>
                                     <div class="text-sm ms-2">
                                         <label
                                             for="pickup-store-checkbox"
                                             class="font-medium text-gray-400 dark:text-gray-500"
                                         >
                                             Pickup from our store
                                         </label>
                                         <p
                                             id="pickup-store-checkbox-text"
                                             class="text-xs font-normal text-gray-400 dark:text-gray-500"
                                         >
                                             Not available
                                         </p>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="sm:col-span-2">
                             <p class="text-base font-medium text-gray-900 dark:text-white">
                                 Add extra warranty
                             </p>

                             <div class="flex flex-wrap items-center gap-4 mt-2">
                                 <div class="flex items-center">
                                     <input
                                         id="1-year"
                                         name="warranty"
                                         type="radio"
                                         value=""
                                         class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                     />
                                     <label
                                         for="1-year"
                                         class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
                                     >
                                         1 year - $39
                                     </label>
                                 </div>

                                 <div class="flex items-center">
                                     <input
                                         id="2-years"
                                         type="radio"
                                         name="warranty"
                                         value=""
                                         class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                     />
                                     <label
                                         for="2-years"
                                         class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
                                     >
                                         2 years - $69
                                     </label>
                                 </div>

                                 <div class="flex items-center">
                                     <input
                                         id="3-years"
                                         type="radio"
                                         name="warranty"
                                         value=""
                                         class="w-4 h-4 bg-gray-100 border-gray-300 rounded-full text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                     />
                                     <label
                                         for="3-years"
                                         class="text-sm font-medium text-gray-900 ms-2 dark:text-gray-300"
                                     >
                                         3 years - $991
                                     </label>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section></div>

@endsection
