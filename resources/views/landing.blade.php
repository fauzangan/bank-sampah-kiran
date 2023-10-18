<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bank Sampah Kiran</title>
    <!-- import bootstrap, tailwind output and script.js -->
    @vite(['resources/css/app.css', 'resources/js/script.js', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- font tekstur -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tektur:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <header class="bg-transparent absolute top-0 left-0 w-full flex items-center justify-center z-10 bg-white h-28 ease-in-out duration-200">
        <div class="container justify-center w-full">
            <div class="flex items-center justify-between relative">
                <div class="justify-start">
                    <a href="#home" class="text-xl font-semibold text-md text-primary font-tektur block sm:px-5 py-3 ">KIRAN</a>
                </div>
                <div class="flex items-center px-1 -mr-1.5">
                    <button id="hamburger" name="hamburger" type="button" class="block absolute right-4 lg:hidden">
                        <span class="hamburger-line transition duration-600 ease-in-out origin-top-left"></span>
                        <span class="hamburger-line transition duration-600 ease-in-out"></span>
                        <span class="hamburger-line transition duration-600 ease-in-out origin-bottom-left"></span>
                    </button>
                    <nav id="nav-menu" class="bg-white hidden absolute shadow-lg rounded-lg py-5 max-w-[180px] w-full top-full right-2 lg:block lg:static lg:bg-transparent lg:max-w-full lg:shadow-none lg:rounded-none">
                        <ul class="block lg:flex">
                            <li class="group lg:flex">
                                <a href="#home" class="text-base text-black py-2 mx-8 flex hover:text-primary hover:font-semibold">Beranda</a>
                                <a href="#about" class="text-base text-black py-2 mx-8 flex hover:text-primary hover:font-semibold">Tentang Kami</a>
                                <a href="#visi-misi" class="text-base text-black py-2 mx-8 flex hover:text-primary hover:font-semibold">Visi & Misi</a>
                                <a href="#galeri" class="text-base text-black py-2 mx-8 flex hover:text-primary hover:font-semibold">Galeri</a>
                                <a href="#kontak" class="text-base text-black py-2 mx-8 flex hover:text-primary hover:font-semibold">Kontak</a>
                                <a href="{{ route('login') }}" class="text-base bg-blue-500 justify-center rounded-md text-white font-semibold px-3 py-2 mx-8 flex hover:bg-blue-700 hover:font-semibold">login</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- section home start -->
    <section id="home" class="pt-40 pb-72  bg-slate-800 opacity-90">
        <img src="../images/2.jpg" style="height: 1000px;" alt="" class="-z-50 w-full h-full object-cover absolute mix-blend-overlay bg-repeat -mt-40">
        <div class="">
            <div class="container mx-auto">
                <div class="flex flex-wrap">
                    <div class="w-full self-center px-4 mt-32">
                        <h1 class=" text-primary text-2xl text-center font-sans font-bold md:text-3xl ">Bank Sampah Kiran</h1>
                        <h2 class="mb-2 font-bold text-white text-center lg:text-xl">Bank sampah kintamani dan jimbaran</h2>
                        <p class="text-base text-white text-center font-thin mb-4 ">Bersih Lingkungan, Ekonomi Tumbuh</p>
                        
                        <a href="{{ route('login') }}" class="text-base flex justify-center text-center text-white font-semibold bg-primary py-2 px-6 mx-14 lg:mx-96  rounded-full hover:-translate-y-1 w-7hover:scale-110 hover:bg-lime-900 duration-480 mb-10">Mulai Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section home end -->

    <!-- section about start -->
    <section id="about" class="pt-34 pb-30 \ h-max">
        <div class="bg-gradient-to-b from-green-700 via-green-600 to-green-400 bg-blend-darken relative pb-48">
            <img src="../images/peresmian.jpg" alt="" class="w-full h-full object-cover absolute mix-blend-overlay bg-repeat">
            <div class="container mx-auto px-1">
                <div class="flex flex-wrap">
                    <div class="w-full self-center mt-20">
                        <h1 class="pt-5 text-white text-3xl font-sans font-bold md:text-4xl text-center mb-4">Tentang Kami</h1>
                        <p class="text-lg text-white font-thin mb-2 text-justify">Bank sampah kiran didirikan pada tanggal 16 Oktober 2021. Pada masa awal pendirian Bank Sampah Kiran, tercatat 30 nasabah yang meliputi warga Komplek Duta Bintaro pada kluster Kintamani dan Jimbaran. Pick-up perdana bank sampah kiran terjadi pada tanggal 20 Oktober 2022. Hingga saat ini, tercatat ada 82 nasabah yang terdaftar di bank sampah kiran.  </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section about end -->

    <!-- section visi dan misi start -->
    <section id="visi-misi" class="pt-34 pb-30 bg-gradient-to-b from-neutral-300 via-neutral-400 to-neutral-300">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full px-1 mb-8 self-center mt-5">
                    <h1 class="text-3xl text-center uppercase font-bold mt-4 mb-2">VISI</h1>
                    <h2 class="font-bold text-center text-xl text-stone-900 ">"Menjadi sarana pembelajaran masyarakat dalam menciptakan lingkungan yang nyaman dan bernilai ekonomis"</h2>
                    <h1 class="text-3xl text-center uppercase font-bold mt-10 mb-0">MISI</h1>    
                    <div class="container flex flex-wrap my-3 justify-center ">
                            
                <!-- card -->
                            <div class="lg:w-1/4 w-full lg:pr-4 py-3">
                                <div class="bg-slate-300 rounded-xl relative ">
                                    <img src= "../images/10.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
                                    <div class="p-6 pb-12">
                                        <p class="text-md text-justify">Mengajak masyarakat untuk peduli kebersihan lingkungan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/4 w-full lg:pr-4 py-3">
                                <div class="bg-slate-300 rounded-xl relative">
                                    <img src="../images/31.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
                                    <div class="p-6 pb-12">
                                        <p class="text-md">Menjadikan sampah anorganik bernilai ekonomis</p>
                                    </div>
                                </div>
                            </div>
                            <div class="lg:w-1/4 w-full lg:pr-4 py-3 ">
                                <div class="bg-slate-300 rounded-xl relative">
                                    <img src= "../images/32.jpg" alt="" class="object-cover h-48 w-full rounded-t-xl">
                                    <div class="p-6">
                                        <p class="text-md">Membentuk perilaku masyarakat peduli sampah anorganik</p>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section visi misi end -->

    <!-- section Galeri end -->
    <section id="galeri" class="pt-34 pb-30">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full px-1 mb-8 self-center">
                    <h1 class="text-3xl text-center uppercase font-bold mt-8 mb-2">Galeri</h1>
                    <h2 class="font-semibold text-stone-900 ">Dokumentasi kegiatan bank sampah</h2>
                        <div class="container flex flex-wrap my-15 justify-center items-center py-5">
                <!-- card -->
                            <div id="default-carousel" class="relative w-full" data-carousel="slide">
                                <!-- Carousel wrapper -->
                                <div class="relative h-64 overflow-hidden rounded-lg md:h-80">
                                    <!-- Item 1 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="../images/peresmian.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-2/3 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 2 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="../images/10.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 3 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="../images/1.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 4 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="../images/31.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                    <!-- Item 5 -->
                                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                                        <img src="../images/32.jpg" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                                    </div>
                                </div>
                                <!-- Slider indicators -->
                                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
                                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
                                </div>
                                <!-- Slider controls -->
                                <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                                        </svg>
                                        <span class="sr-only">Previous</span>
                                    </span>
                                </button>
                                <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                                    <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                                        <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                                        </svg>
                                        <span class="sr-only">Next</span>
                                    </span>
                                </button>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- section galeriend -->

    <!-- section contact start -->
    <section id="contact" class="pt-34 pb-30 bg-black bg-opacity-70">
        <div class="container mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full px-1 mb-8 self-center">
                    <h1 class="text-2xl text-center uppercase text-white font-bold mt-4 mb-2">KONTAK</h1>
                    <h2 class="font-semibold text-white text-xl">Hubungi kami melalui :</h2>
                        <div class="container flex flex-wrap my-15 justify-between items-center py-5">
                <!-- card -->
                            <div class="lg:w-1/4 w-full lg:pr-4 py-3">
                                <div class="bg-slate-300 rounded-xl px-2 py-5 justify-center text-center">
                                    <img src="../images/whatsapp_logo.png" class="block mx-auto pr-24 " style="height: 30px;" alt=""> <p class="-mt-6 ml-10 text-base font-semibold">0867541511</p>
                                </div>
                            </div>
                            
                            <div class="lg:w-5/12 2xl:w-1/4 w-full lg:pr-4 py-3">
                                <div class="bg-slate-300 rounded-xl px-2 py-5 justify-center">
                                    <img src="../images/web_logo.png" class="inline-block mx-auto pl-1 pr-24 " style="height: 30px;" alt=""> <p class="-mt-6 ml-10 text-base font-semibold text-center">www.banksampahkiran.com</p>
                                </div>
                            </div>

                            <div class="lg:w-1/4 w-full lg:pr-4 py-3">
                                <div class="bg-slate-300 rounded-xl px-2 py-5 justify-center text-center">
                                    <img src="../images/maps-logo.png" class="block pl-1 pr-24 " style="height: 30px;" alt=""> <p class="-mt-6 ml-10 text-base font-semibold">Perumahan Duta bintaro Kluster Kintamani RT 04/07</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- section contact end -->

    <!-- footer -->
    
    <!-- <footer class="bg-gray-900">
        <div class="w-full mx-auto max-w-screen-xl p-4 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="https://flowbite.com/" class="hover:underline">Bank Sampah Kiran</a>. All Rights Reserved.
        </span>
        <ul class="flex flex-wrap items-center mt-3 text-sm font-medium text-gray-500 dark:text-gray-400 sm:mt-0">
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6 ">About</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Privacy Policy</a>
            </li>
            <li>
                <a href="#" class="mr-4 hover:underline md:mr-6">Licensing</a>
            </li>
            <li>
                <a href="#" class="hover:underline">Contact</a>
            </li>
        </ul>
        </div>
    </footer> -->

    <footer>
        <div class="py-5 flex flex-wrap justify-center w-full bg-gray-900">
            <p class="text-white text-sm text-center">Copyright 2023 Bank Sampah Kiran</p>
        </div>
    </footer>
</body>
<script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
</html>