<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('depan') }}/vendors/boostraps/css/bootstrap.min.css">

    <!-- Boxicons -->
    <link rel="stylesheet" href="{{ asset('depan') }}/vendors/boxicons/css/boxicons.min.css">

    <!-- Swiper -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--MY CSS -->
    <link rel="stylesheet" href="{{ asset('depan') }}/css/styles.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"> 

    
    <link rel="stylesheet" type='text/css' href="https://cdn.jsdelivr.net/gh/devicons/devicon@latest/devicon.min.css" />
          


   
    


    <title>My Portofolio | Hamzah</title>
</head>

<body id="home">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">{{ $about->judul }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <!-- <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li> -->
                    <li class="nav-item">
                        <a class="nav-link" href="#portofolio">Portofolio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#skill">Skill</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#timeline">TimeLine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contacts</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Akhir Navbar -->

    <!-- Header -->
    @yield('konten')

    <!-- Footer -->
    <footer class="py-3">
        <div class="container">
            <p class="text-white fs-7 mb-0 text-center ">CopyRight & Copy; 2024 Hamzah. All Right Reserved </p>
        </div>
    </footer>
    <!-- Akhir Footer -->

    <!-- Javascript -->
    <script src="{{ asset('depan') }}/vendors/boostraps/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper Javascrip -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".portofolio-swiper", {
            slidesPerView: 3,
            spaceBetween: 30,
            navigation: {
                nextEl: '.btn-prev',
                prevEl: '.btn-next',
            },
            breakpoints: {
                // when window width is >= 320px
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                // when window width is >= 480px
                480: {
                    slidesPerView: 3,
                    spaceBetween: 30
                },
            }
        });
    </script>

</body>

</html>
