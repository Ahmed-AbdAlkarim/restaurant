@extends('client_layouts.master')
@section('about')
    @foreach($abouts as $about)
    <h1 class="mb-4 text-primary"><i class="fa fa-utensils text-primary me-2"></i>{{ $about->subtitle }}</h1>
    @endforeach
@endsection
@section('content')
        <!-- About Start -->
        @foreach($abouts as $about)
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-5 align-items-center">
                    <div class="col-lg-6">
                        <div class="row g-3">
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="img/about-1.jpg">
                            </div>
                            <div class="col-6 text-start">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="img/about-2.jpg" style="margin-top: 25%;">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="img/about-3.jpg">
                            </div>
                            <div class="col-6 text-end">
                                <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="img/about-4.jpg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">{{ $about->title }}</h5>
                        <h1 class="mb-4"><i class="fa fa-utensils text-primary me-2"></i>{{ $about->subtitle }}</h1>
                        <p class="mb-4 text-wrap text-break w-75">{{ $about->description_1 }}</p>
                        <p class="mb-4 text-wrap text-break w-75">{{ $about->description_2 }}</p>
                        <div class="row g-4 mb-4">
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $about->years_experience }}</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Years of</p>
                                        <h6 class="text-uppercase mb-0">Experience</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="d-flex align-items-center border-start border-5 border-primary px-3">
                                    <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $about->master_chefs }}</h1>
                                    <div class="ps-4">
                                        <p class="mb-0">Popular</p>
                                        <h6 class="text-uppercase mb-0">Master Chefs</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <!-- About End -->


        <!-- Team Start -->
        <div class="container-xxl pt-5 pb-3">
            <div class="container">
                <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Team Members</h5>
                    <h1 class="mb-5">Our Master Chefs</h1>
                </div>
                
                <div class="row g-4">
                    @foreach($chefs as $chef)    
                        <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="team-item text-center rounded overflow-hidden">
                                <div class="rounded-circle overflow-hidden m-4">
                                <img src="{{ asset('storage/' . $chef->image) }}" style="width: 100%; height: 250px; border-radius: 30%; object-fit: cover;">
                                </div>
                                <h5 class="mb-0">{{ $chef->name }}</h5>
                                <small>{{ $chef->specialty }}</small>
                                <div class="d-flex justify-content-center mt-3">
                                    @if($chef->facebook)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $chef->facebook }}"><i class="fab fa-facebook-f"></i></a>
                                    @endif
                                    @if($chef->instagram)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $chef->instagram }}"><i class="fab fa-instagram"></i></a>
                                    @endif
                                    @if($chef->twitter)
                                    <a class="btn btn-square btn-primary mx-1" href="{{ $chef->twitter }}"><i class="fab fa-twitter"></i></a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
                
            </div>
        </div>
        <!-- Team End -->
@endsection
    