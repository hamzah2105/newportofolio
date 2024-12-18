@extends('depan.layout')

@section('konten')
    <!-- Portfolio Detail -->
    <section class="portfolio-detail-section py-5">
        <div class="container">
            <div style="height: 60px;"></div>
            <p class="text-orange fw-semibold ">Detail Portofolio</p>
            <h2 class="section-title mb-5 ">{{ $portofolio->title }}</h2>

            <div class="card shadow-lg">
                <div id="portfolioCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-item active">
                        <img src="{{ asset($portofolio->image) }}" alt="Project Title"
                            class="d-block w-100 img-fluid rounded">
                    </div>
                    <!-- Add more images as needed -->
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="card-body">
                <h6 class="fw-semibold">{{ $portofolio->title }}</h6>
                <p class="mb-4">{!! $portofolio->description !!}</p>
                <a href="{{ route('frontend.index') }}" class="btn btn-primary">Back to Portfolio</a>
            </div>
        </div>
        </div>
        </div>
    </section>
@endsection
