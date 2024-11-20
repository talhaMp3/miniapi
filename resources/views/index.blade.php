<x-app-layout>



    <!-- Carousel Start -->
    <div class="header-carousel owl-carousel">
        <div class="header-carousel-item bg-primary">
            <div class="carousel-caption">
                <div class="container">
                    <div class="row g-4 align-items-center">
                        <div class="col-lg-7 animated fadeInLeft">
                            <div class="text-sm-center text-md-start">
                                <h4 class="text-white text-uppercase fw-bold mb-4">Welcome To LifeSure</h4>
                                <h1 class="display-1 text-white mb-4">APIS Makes You Happy</h1>
                                {{-- <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy...  --}}
                                </p>
                                <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                    {{-- <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a> --}}
                                    <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn
                                        More</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 animated fadeInRight">
                            <div class="calrousel-img" style="object-fit: cover;">
                                <img src="img/carousel-2.png" class="img-fluid w-100" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Carousel End -->

    <!-- Feature Start -->
    <div class="container-fluid feature bg-light py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Explore the Power of APIs</h4>
                <h1 class="display-4 mb-4">Seamless Data Integration for Your Projects</h1>
                <p class="mb-0">Unlock the potential of your applications by leveraging various APIs. From fetching
                    real-time data to enhancing user experiences, our collection of APIs provides the tools you need to
                    create dynamic and engaging solutions. Discover how easy it is to integrate powerful functionalities
                    into your projects today!</p>
            </div>

            <div class="row g-4">
                @foreach ($apis as $api)
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4 pt-0">

                            <h4 class="pt-3 mb-4">{{ $api['title'] }}</h4>
                            <p class="mb-4">{{ $api['description'] }}</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="{{ $api['link'] }}">View API</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-fluid bg-light about pb-5">
        <div class="container pb-5">
            <div class="row g-5">
             <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
    <div class="about-item-content bg-white rounded p-5 h-100">
        <h4 class="text-primary">About Our Company</h4>
        <h1 class="display-4 mb-4">Your Trusted Partner in Protection</h1>
        <p>At [Your Company Name], we prioritize your safety and peace of mind. With a commitment to delivering high-quality protection solutions, we strive to create a secure environment for our clients. Our expert team works tirelessly to ensure that you have access to the best resources available.</p>
        <p>We believe in transparency and integrity, which is why we offer tailored solutions that meet your unique needs. Our customer-centric approach sets us apart as a leader in the protection industry.</p>
        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We help you save money without compromising on quality.</p>
        <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We specialize in both production and trading of goods.</p>
        <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Our life insurance policies are flexible and adaptable.</p>
        <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a>
    </div>
</div>

             <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
    <div class="bg-white rounded p-5 h-100">
        <div class="row g-4 justify-content-center">
            <div class="col-12">
                <div class="rounded bg-light">
                    <img src="img/about-1.png" class="img-fluid rounded w-100" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="counter-item bg-light rounded p-3 h-100">
                    <div class="counter-counting">
                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">10</span>
                        <span class="h1 fw-bold text-primary">+</span>
                    </div>
                    <h4 class="mb-0 text-dark">APIs Integrated</h4>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="counter-item bg-light rounded p-3 h-100">
                    <div class="counter-counting">
                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">500</span>
                        <span class="h1 fw-bold text-primary">+</span>
                    </div>
                    <h4 class="mb-0 text-dark">Data Points Accessed</h4>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="counter-item bg-light rounded p-3 h-100">
                    <div class="counter-counting">
                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">150</span>
                        <span class="h1 fw-bold text-primary">+</span>
                    </div>
                    <h4 class="mb-0 text-dark">User Interactions</h4>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="counter-item bg-light rounded p-3 h-100">
                    <div class="counter-counting">
                        <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">1000</span>
                        <span class="h1 fw-bold text-primary">+</span>
                    </div>
                    <h4 class="mb-0 text-dark">API Calls Made</h4>
                </div>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </div>
    <!-- About End -->





</x-app-layout>
