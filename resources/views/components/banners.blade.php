
    <section class="banner ratio ratio-6x9 ratio-md-16x9 ratio-xl-21x9 overflow-hidden">
        <div class="banner-swiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide banner-slide position-relative">
                    <picture>
                        {{-- Desktop --}}
                        <source srcset="{{ asset('front/images/backgrounds/banner.png') }}" media="(min-width: 767px)">
                        {{-- Mobile --}}
                        <img class="object-fit-cover w-100 h-100" src="{{ asset('front/images/backgrounds/banner.png') }}" alt="">
                    </picture>
                </div>
            </div>
        </div>
        <div class="position-absolute top-0 start-0 w-100 h-100 banner-content z-index-2">
            <div class="container w-100 mt-xxl-4 mt-lg-2">
                <div class="row">
                    <div class="col-lg-4 z-index-1 d-none d-lg-flex">
                        <img class="" width="336px" src="{{ asset('front/images/logos/logo.svg') }}" alt="">
                    </div>
                    <div class="col-lg-12 d-lg-flex justify-content-lg-between z-index-1 align-items-end text-center text-lg-start">
                            <h2 class="text-white fs-64 font-title title-banner">O seu espaço de <span class="fw-700 italic">tranquilidade</span> e <span class="fw-700 italic">qualidade de vida</span></h2>
                            <div class="d-flex d-lg-block justify-content-center">
                                <a href="#form-contato" class="">
                                    <button class="btn btn-danger rounded-0 fs-20 mt-2 mt-lg-0">QUERO SABER MAIS</button>
                                </a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <svg class="position-absolute end-0 bottom-0 z-index-1" style="width: initial;height: initial;top: initial;left: initial;" width="199" height="544" viewBox="0 0 199 544" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M196.573 0H199L2.42683 544H0L196.573 0Z" fill="#FF4242"/>
        </svg> 
    </section>
    <section class="mt-0 bg-dark position-relative">
        <svg class="position-absolute start-0 bottom-0 z-index-1 d-none d-lg-flex" width="199" height="544" viewBox="0 0 199 544" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M196.573 0H199L2.42683 544H0L196.573 0Z" fill="#FF4242"/>
        </svg>            
        <div class="container position-up position-relative z-index-1">
            <div class="row justify-content-between">
                <div class="col-lg-4 d-lg-block d-flex align-items-center flex-column">
                    <svg width="57" height="75" viewBox="0 0 57 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M28.5009 38.7717C34.1422 38.7717 38.7153 34.1915 38.7153 28.5415C38.7153 22.8915 34.1422 18.3113 28.5009 18.3113C22.8597 18.3113 18.2865 22.8915 18.2865 28.5415C18.2865 34.1915 22.8597 38.7717 28.5009 38.7717Z" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M55.9981 28.5415C55.9981 57.067 28.4991 73 28.4991 73C28.4991 73 1 57.0651 1 28.5415C1.00189 13.3308 13.3137 1 28.5009 1C43.6882 1 56 13.3308 56 28.5415H55.9981Z" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>  
                    <p class="text-white mt-2 mb-lg-4 fs-24 fw-400 pe-lg-2 text-center text-lg-start">Lozalizado na <span class="fw-600">região central de Nova Petrópolis</span></p>                      
                </div>
                <div class="col-lg-4 d-lg-block d-flex align-items-center flex-column">
                    <svg width="66" height="63" viewBox="0 0 66 63" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M36.9029 3L20.4695 19.2961H1V43.7039H20.4695L36.9029 60V3Z" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M54.9976 53.8442C67.4398 41.5059 67.4398 21.5016 54.9976 9.16333" stroke="#FF4242" stroke-width="2"/>
                        <path d="M43.3755 39.2627C47.6968 34.9775 47.6968 28.0298 43.3755 23.7446" stroke="#FF4242" stroke-width="2"/>
                        <path d="M49.3867 45.9752C57.4465 37.9828 57.4465 25.0245 49.3867 17.0321" stroke="#FF4242" stroke-width="2"/>
                    </svg>                        
                    <p class="text-white mt-2 mb-lg-4 fs-24 fw-400 pe-lg-2  text-center text-lg-start">Rua com baixo fluxo de carros,
                        <span class="fw-600">priorizando a sua tranquilidade</span></p>                      
                </div>
                <div class="col-lg-4 d-lg-block d-flex align-items-center flex-column">
                    <svg width="35" height="74" viewBox="0 0 35 74" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.4286 49.3155V7.54509C20.4286 3.92992 17.4779 1 13.837 1C10.1962 1 7.24548 3.92992 7.24548 7.54509V49.3155C3.50548 51.5421 1 55.6074 1 60.2534C1 67.2929 6.74762 73 13.837 73C20.9264 73 26.674 67.2929 26.674 60.2534C26.674 55.6074 24.1706 51.5441 20.4286 49.3155Z" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M21.989 60.2534C21.989 56.6222 19.5807 53.5496 16.2637 52.5227V33.3336C16.2637 32.0073 15.1708 30.9221 13.8351 30.9221C12.4994 30.9221 11.4065 32.0073 11.4065 33.3336V52.5227C8.08949 53.5496 5.68115 56.6222 5.68115 60.2534C5.68115 64.7247 9.3321 68.3499 13.8351 68.3499C18.3381 68.3499 21.989 64.7247 21.989 60.2534Z" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M31.5412 43.8314H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M34.9999 36.3479H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M31.5412 28.8644H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M34.9999 21.3788H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M31.5412 13.8953H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                        <path d="M34.9999 6.41174H27.2507" stroke="#FF4242" stroke-width="2" stroke-miterlimit="10"/>
                    </svg>                        
                    <p class="text-white mt-2 mb-lg-4 fs-24 fw-400 pe-lg-2  text-center text-lg-start">Construção pensada no melhor <span class="fw-600">conforto térmico e acústico</span></p>                      
                </div>
            </div>
        </div>
    </section>

