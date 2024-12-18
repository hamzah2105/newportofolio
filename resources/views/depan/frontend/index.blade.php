@extends('depan.layout')

@section('konten')
    <section class="header-section" id="header">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">
                    <p class="text-orange fw-semibold">
                        {{ get_meta_value('_nama') }}
                    </p>
                    <h1 class="header-title text-uppercase fw-bold">
                        {{ get_meta_value('_title') }} </h1>

                    <p class="fw-semibold">{!! $about->isi !!}</p>

                    <div class="d-flex align-items-center gap-6 mt-4">
                        <div class="d-flex align-items-center gap-2">
                            <!-- <h2 class="header-skill fw-bold mb-0 btn-dark text-white">10+</h2> -->
                            <a href="{{ asset('pdf') . '/' . get_meta_value('_pdf') }}"
                                class="header-skill fw-semibold mb-0 btn btn-dark text-white w-250 rounded-0"
                                target="_blank" rel="noopener noreferrer">Resume CV</a>
                            <!-- <p class="text-secondry fs-7 mb-0">Years of <br /> Experience</p> -->
                        </div>
                        <!-- <div class="d-flex align-items-center gap-2">
                                                    <h2 class="header-skill fw-bold mb-0">30k+</h2>
                                                    <p class="text-secondry fs-7 mb-0">Happy <br /> Curtomers</p>
                                                  </div> -->
                    </div>
                </div>
                <div class="col-md-5 mt-3">
                    <div class="header-img-wrapper">
                        <img src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" class="header-img" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Jumbotron -->

    >

    <!-- Projects -->
    <section class="portofolio-secrion" id="portofolio">
        <div class="container">
            <p class="text-orange fw-semibold">Portofolio</p>
            <h2 class="section-title mb-5">Selected Works</h2>
            <div class="swiper portofolio-swiper">
                <div class="swiper-wrapper">
                    @foreach ($portofolios as $item)
                        <!-- Pastikan ini sesuai dengan nama variabel di controller -->
                        <div class="swiper-slide">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset($item->image) }}" alt="" class="card-img-top rounded mb-3">
                                    <h6 class="fw-semibold">{{ $item->title }}</h6>
                                    <a href="{{ route('frontend.detail', $item->id) }}" class="text-orange">Detail
                                        Portofolio</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex align-items-center justify-content-end gap-3 mt-3">
                    <button class="btn btn-light d-flex align-items-center justify-content-center btn-next">
                        <i class="bx bx-left-arrow-alt fs-5"></i>
                    </button>
                    <button class="btn btn-light d-flex align-items-center justify-content-center btn-prev">
                        <i class="bx bx-right-arrow-alt fs-5"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>


    <!-- Skill -->
    <section class="skill-section" id="skill">
        <div class="container">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
              <p class="text-orange fw-semibold">Skills</p>
              <h2 class="section-title text-white mb-5">Programming Languages & Tools</h2>
              <div class="container mt-5">
                <div class="row">
                  <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_meta_value('_language')) as $item)
                    <li class="list-inline-item"><i class="devicon-{{ $item }}-plain"></i></li>
                        
                    @endforeach
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-md-5 mt-3">
                <div class="header-img-wrapper">
                    <img src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" class="header-img" alt="">
                </div>
            </div>
      </section>
    <!-- Akhir Skill -->

    <!-- Working Period -->
    <section class="timeline-section" id="timeline">
        <div class="container">
            <p class="text-orange fw-semibold">TimeLine</p>
            <h2 class="section-title mb-5">Working Period</h2>

            @foreach ($riwayats as $riwayat)
                <div class="row py-3 border-bottom">
                    <div class="col-md-4">
                        {{ \Carbon\Carbon::parse($riwayat->tgl_mulai)->format('F Y') }} -
                        {{ $riwayat->tgl_akhir ? \Carbon\Carbon::parse($riwayat->tgl_akhir)->format('F Y') : 'Today' }}
                    </div>
                    <div class="col-md-4">{{ $riwayat->info1 }}</div> <!-- Posisi -->
                    <div class="col-md-4">{{ $riwayat->info2 }}</div> <!-- Nama Perusahaan -->
                </div>
            @endforeach
        </div>
    </section>
    <!-- Akhir Working Period -->

    <!-- News Portofolio -->
    <!-- <div class="portofolio-section" id="portofolio">
                                        <div class="container">
                                          <p class="text-orange fw-semibold">Portofolio</p>
                                          <h2 class="section-title mb-5">Selected Works</h2>
                                        </div>
                                      </div> -->
    <!-- Akhir Projects -->

    <!-- Contact -->
    <section class="contact-secrion" id="contact">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6">

                    <p class="text-orange fw-semibold">Contact</p>
                    <h2 class="section-title mb-5">GET IN TOUCH</h2>

                    <p class="text-secondary mb-3">
                        Please fil out the form on this section to contact with me. Or call
                        between 08:00 a.m. and 09:00 p.m. Et, monday through friday
                    </p>

                    <div class="d-felx align-items-center gap-2 mb-3">
                        <i class="bx bx-map-pin text-orange fs-5"></i>
                        <div class="mb-0">{{ get_meta_value('_alamat') }}</div>
                    </div>
                    <div class="d-felx align-items-center gap-2 mb-3">
                        <i class="bx bx-phone-call text-orange fs-5"></i>
                        <div class="mb-0">{{ get_meta_value('_nohp') }}</div>
                    </div>
                    <div class="d-felx align-items-center gap-2 mb-3">
                        <i class="bx bx-envelope text-orange fs-5"></i>
                        <div class="mb-0">{{ get_meta_value('_email') }}</div>
                    </div>
                    <!-- <div class="d-felx align-items-center gap-2 mb-3">
                                                <i class="bx bx-globe text-orange fs-5"></i>
                                                <div class="mb-0">Hamzahdoank32@gmail.com</div>
                                              </div> -->
                </div>
                <div class="col-md-5">
                    <form action="#">
                        <input type="text" name="name" id="name" placeholder="Name"
                            class="form-control rounded-0 mb-2">
                        <input type="email" name="email" id="email" placeholder="Email"
                            class="form-control rounded-0 mb-2">


                        <textarea name="body" id="body" placeholder="Message" cols="30" rows="3"
                            class="form-control rounded-0 mb-3"></textarea>

                        <button class="btn btn-orange w-100 rounded-0">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Akhir Contact -->
@endsection
