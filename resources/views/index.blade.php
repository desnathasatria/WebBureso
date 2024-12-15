@extends('layouts.app')

@section('title', 'Home - Warung Bu Reso')

@section('content')

<!-- Modal Search Start -->
<div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content rounded-0">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Produk atau Informasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center bg-primary">
                <div class="input-group w-75 mx-auto d-flex">
                    <input type="search" class="form-control p-3" placeholder="Cari produk atau info..." aria-describedby="search-icon-1">
                    <span id="search-icon-1" class="btn bg-light border input-group-text p-3">
                        <i class="fa fa-search"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Search End -->

<!-- Carousel Start -->
<div class="header-carousel owl-carousel">
    <div class="header-carousel-item bg-primary">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-start">
                            <h4 class="text-white text-uppercase fw-bold mb-4">Selamat Datang di Warung Bu Reso Kertosono</h4>
                            <h1 class="text-white display-4 mb-4">Rasakan Cita Rasa Tradisional dengan Sentuhan Modern!</h1>
                            <p class="text-white mb-4">
                                Nikmati beragam menu lezat, suasana nyaman, dan pelayanan ramah hanya di Warung Bu Reso Kertosono.
                                Kami hadir untuk memanjakan selera Anda dengan masakan khas rumahan yang tak terlupakan.
                            </p>
                            <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#">
                                    <i class="fas fa-play-circle me-2"></i> Lihat Video Profil
                                </a>
                                <a class="btn btn-outline-light rounded-pill py-3 px-4 px-md-5" href="#">Jelajahi Menu</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 animated fadeInRight">
                        <div class="carousel-img" style="object-fit: cover;">
                            <img src="{{ asset('assets/img/carousel-image.jpg') }}" class="img-fluid w-100" alt="Profil Warung Bu Reso Kertosono">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->

<!-- Start Gallery Section -->
<div class="container-fluid gallery py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Galeri Warung Bu Reso</h4>
            <h1 class="display-4 mb-4">Kenangan Lezat Kami</h1>
            <p class="mb-0">
                Berikut adalah momen spesial dari Warung Bu Reso Kertosono yang layak untuk dikenang dan diabadikan.
            </p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
                <div class="gallery-item">
                    <div class="gallery-img">
                        <img src="{{ asset('assets/img/gallery-1.jpg') }}" class="img-fluid w-100 rounded" alt="Menu Spesial">
                    </div>
                    <div class="gallery-content p-4">
                        <h4 class="mb-2">Menu Spesial</h4>
                        <p class="mb-2">Menu spesial dengan cita rasa istimewa dari dapur Warung Bu Reso.</p>
                    </div>
                </div>
            </div>
            <!-- Additional Gallery Items -->
        </div>
    </div>
</div>
<!-- End Gallery Section -->

<!-- Image Modal -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" class="img-fluid w-100" id="modalImage" alt="">
            </div>
        </div>
    </div>
</div>

<!-- Service Start -->
<div class="container-fluid service py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Layanan Warung Bu Reso</h4>
            <h1 class="display-4 mb-4">Layanan Unggulan Kami</h1>
            <p class="mb-0">Dari makan di tempat hingga layanan pesan antar, kami siap melayani Anda dengan sepenuh hati.</p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-1.jpg') }}" class="img-fluid rounded-top w-100" alt="Makan di Tempat">
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Makan di Tempat</a>
                            <p class="mb-4">Nikmati suasana nyaman dan bersantap langsung di Warung Bu Reso.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="service-item">
                    <div class="service-img">
                        <img src="{{ asset('assets/img/service-2.jpg') }}" class="img-fluid rounded-top w-100" alt="Pesan Antar">
                    </div>
                    <div class="service-content p-4">
                        <div class="service-content-inner">
                            <a href="#" class="d-inline-block h4 mb-4">Pesan Antar</a>
                            <p class="mb-4">Kami siap mengantarkan pesanan Anda ke lokasi Anda.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Additional Service Items -->
        </div>
    </div>
</div>
<!-- Service End -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var imageModal = document.getElementById('imageModal');
        imageModal.addEventListener('show.bs.modal', function(event) {
            var button = event.relatedTarget;
            var imgSrc = button.getAttribute('data-img-src');
            var imgTitle = button.getAttribute('data-img-title');
            var modalTitle = imageModal.querySelector('.modal-title');
            var modalImage = document.getElementById('modalImage');

            modalTitle.textContent = imgTitle;
            modalImage.src = imgSrc;
        });
    });
</script>

@endsection
