<section class="bg-danger mt-0 z-index-1 position-relative">
    <h2 class="text-white fs-64 font-title text-center pt-2">Quer realizar seu sonho?</h2>
    <div class="d-flex justify-content-center">
        <a href="#form-contato">
            <button class="btn btn-dark rounded-0 fs-20" style="transform: translateY(50%);">
                SIM EU QUERO
            </button>
        </a>
    </div>
</section>
<section style="background-image: url({{ asset('front/images/backgrounds/depoiments.png') }}); background-repeat: no-repeat;background-size: cover;">
    <div style="background: rgba(255, 255, 255, 0.75);">
        <div class="container py-2">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="ratio ratio-21x9">
                        <img class="object-fit-contain w-100 h-100" src="{{ asset('front/images/backgrounds/madrid.png') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-1 d-flex justify-content-center px-lg-1 py-1 py-lg-0 pb-2 border-mobile w-70-mobile">
                    <svg class="divider d-none d-lg-flex" width="2" height="186" viewBox="0 0 2 186" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="2" width="186" height="1.99999" transform="rotate(90 2 0)" fill="#332D2D" fill-opacity="0.25"/>
                    </svg>                        
                </div>
                <div class="col-lg-4">
                    <div class="ratio ratio-21x9">
                        <img class="object-fit-contain w-100 h-100" src="{{ asset('front/images/backgrounds/mobile.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-lg-6 py-4 depoiments">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="swiper gallery-swiper col-lg-10 pb-4" style="position: initial">
                    <div class="swiper-wrapper">
                        @foreach (range(0,1) as $item)
                            <div class="swiper-slide ratio ratio-md-36 ratio-sm-1x1 ratio-6x9 bg-white m-auto position-relative">
                                <div class=" d-flex justify-content-center align-items-center px-1">
                                <div>
                                        <p class="col-lg-10 text-center m-auto text-depoiments" style="line-height: 200%">
                                            O Lorem Ipsum é um texto modelo da indústria tipográfica e de impressão. O Lorem Ipsum tem vindo a ser o texto padrão usado por estas indústrias desde o ano de 1500, quando uma misturou os caracteres de um texto para criar um espécime de livro.
                                        </p>
                                        <svg class="mt-2 mb-1 text-center w-100" width="216" height="1" viewBox="0 0 216 1" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="216" height="1" fill="#FF4242"/>
                                        </svg>                                    
                                        <p class="text-center m-auto fs-24">Andreo Simonetto</p>
                                </div>
                                    <svg class="end-0 position-absolute depoiment-content-end m-0-50" style="width: 66px;" width="66" height="60" viewBox="0 0 66 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.0642 59.7231C39.016 59.7567 38.972 59.796 38.9252 59.8315C38.7767 59.9438 38.5719 60 38.3109 60C37.8569 60 37.4787 59.6981 37.1761 59.0943C36.8735 58.4906 36.9491 58.0377 37.403 57.7359C47.5406 48.8302 53.4415 39.3208 55.1059 29.2076C55.2572 28.4528 55.3329 27.4717 55.3329 26.2641C55.3329 25.9385 55.3274 25.6404 55.3164 25.3696C55.2862 24.6277 54.449 24.363 53.7706 24.6648C52.7311 25.1273 51.3606 25.3585 49.6589 25.3585C45.8762 25.3585 42.9257 24.1509 40.8074 21.7358C38.6891 19.3208 37.63 16.4528 37.63 13.1321C37.63 9.50943 38.8404 6.41509 41.2613 3.84905C43.5309 1.28301 46.9353 -5.96271e-06 51.4745 -6.35954e-06C56.1651 -6.7696e-06 59.7964 1.43395 62.3686 4.30188C64.7895 7.1698 66 11.1698 66 16.3019C66 19.3207 65.6974 22.1132 65.0922 24.6792C63.8817 30.566 60.8556 36.7547 56.0138 43.2453C51.1899 49.7117 45.5401 55.2043 39.0642 59.7231ZM2.06973 59.7231C2.02155 59.7567 1.97752 59.796 1.93068 59.8315C1.78222 59.9438 1.57745 60 1.31637 60C0.86245 60 0.484184 59.6981 0.181572 59.0943C-0.12104 58.4906 -0.0453874 58.0377 0.408531 57.7359C10.5461 48.8302 16.447 39.3208 18.1114 29.2076C18.2627 28.4528 18.3384 27.4717 18.3384 26.2641C18.3384 25.9385 18.3329 25.6404 18.3219 25.3696C18.2917 24.6277 17.4546 24.363 16.7761 24.6648C15.7367 25.1273 14.3661 25.3585 12.6644 25.3585C8.88171 25.3585 5.93123 24.1509 3.81293 21.7358C1.69464 19.3208 0.635487 16.4528 0.635486 13.1321C0.635486 9.50943 1.84594 6.41509 4.26685 3.84906C6.53645 1.28302 9.94085 -2.72855e-06 14.48 -3.12538e-06C19.1706 -3.53544e-06 22.8019 1.43396 25.3741 4.30188C27.795 7.16981 29.0055 11.1698 29.0055 16.3019C29.0055 19.3208 28.7029 22.1132 28.0977 24.6792C26.8872 30.566 23.8611 36.7547 19.0193 43.2453C14.1954 49.7117 8.54559 55.2043 2.06973 59.7231Z" fill="#FF4242"/>
                                    </svg>
                                    <svg class="start-0 position-absolute depoiment-content-start m-0-50" style="width: 66px; transform: rotate(180deg)" width="66" height="60" viewBox="0 0 66 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M39.0642 59.7231C39.016 59.7567 38.972 59.796 38.9252 59.8315C38.7767 59.9438 38.5719 60 38.3109 60C37.8569 60 37.4787 59.6981 37.1761 59.0943C36.8735 58.4906 36.9491 58.0377 37.403 57.7359C47.5406 48.8302 53.4415 39.3208 55.1059 29.2076C55.2572 28.4528 55.3329 27.4717 55.3329 26.2641C55.3329 25.9385 55.3274 25.6404 55.3164 25.3696C55.2862 24.6277 54.449 24.363 53.7706 24.6648C52.7311 25.1273 51.3606 25.3585 49.6589 25.3585C45.8762 25.3585 42.9257 24.1509 40.8074 21.7358C38.6891 19.3208 37.63 16.4528 37.63 13.1321C37.63 9.50943 38.8404 6.41509 41.2613 3.84905C43.5309 1.28301 46.9353 -5.96271e-06 51.4745 -6.35954e-06C56.1651 -6.7696e-06 59.7964 1.43395 62.3686 4.30188C64.7895 7.1698 66 11.1698 66 16.3019C66 19.3207 65.6974 22.1132 65.0922 24.6792C63.8817 30.566 60.8556 36.7547 56.0138 43.2453C51.1899 49.7117 45.5401 55.2043 39.0642 59.7231ZM2.06973 59.7231C2.02155 59.7567 1.97752 59.796 1.93068 59.8315C1.78222 59.9438 1.57745 60 1.31637 60C0.86245 60 0.484184 59.6981 0.181572 59.0943C-0.12104 58.4906 -0.0453874 58.0377 0.408531 57.7359C10.5461 48.8302 16.447 39.3208 18.1114 29.2076C18.2627 28.4528 18.3384 27.4717 18.3384 26.2641C18.3384 25.9385 18.3329 25.6404 18.3219 25.3696C18.2917 24.6277 17.4546 24.363 16.7761 24.6648C15.7367 25.1273 14.3661 25.3585 12.6644 25.3585C8.88171 25.3585 5.93123 24.1509 3.81293 21.7358C1.69464 19.3208 0.635487 16.4528 0.635486 13.1321C0.635486 9.50943 1.84594 6.41509 4.26685 3.84906C6.53645 1.28302 9.94085 -2.72855e-06 14.48 -3.12538e-06C19.1706 -3.53544e-06 22.8019 1.43396 25.3741 4.30188C27.795 7.16981 29.0055 11.1698 29.0055 16.3019C29.0055 19.3208 28.7029 22.1132 28.0977 24.6792C26.8872 30.566 23.8611 36.7547 19.0193 43.2453C14.1954 49.7117 8.54559 55.2043 2.06973 59.7231Z" fill="#FF4242"/>
                                    </svg>  
                                </div>                               
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next d-none d-lg-flex"></div>
                    <div class="swiper-button-prev d-none d-lg-flex"></div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>
</section>