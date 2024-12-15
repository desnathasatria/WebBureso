@extends('layouts.app')

@section('title', 'Profile - Warung Bu Reso')

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

<!-- Produk Start -->
<div class="container-fluid produk py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Produk Unggulan</h4>
            <h1 class="display-4 mb-4">Kategori Produk</h1>
            <p class="mb-0">
                Temukan beragam produk terbaik dari Warung Bu Reso Kertosono, mulai dari makanan tradisional hingga camilan kekinian.
            </p>
        </div>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="produk-item">
                    <div class="produk-img">
                        <img src="{{ asset('assets/img/produk1.jpg') }}" class="img-fluid w-100 rounded" alt="Produk 1">
                    </div>
                    <div class="produk-content p-4">
                        <h4 class="mb-2">Nasi Pecel</h4>
                        <p class="mb-2">Harga: Rp 15.000</p>
                        <p>Stok: Tersedia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="produk-item">
                    <div class="produk-img">
                        <img src="{{ asset('assets/img/produk2.jpg') }}" class="img-fluid w-100 rounded" alt="Produk 2">
                    </div>
                    <div class="produk-content p-4">
                        <h4 class="mb-2">Soto Ayam</h4>
                        <p class="mb-2">Harga: Rp 20.000</p>
                        <p>Stok: Tersedia</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="produk-item">
                    <div class="produk-img">
                        <img src="{{ asset('assets/img/produk3.jpg') }}" class="img-fluid w-100 rounded" alt="Produk 3">
                    </div>
                    <div class="produk-content p-4">
                        <h4 class="mb-2">Bakso</h4>
                        <p class="mb-2">Harga: Rp 18.000</p>
                        <p>Stok: Tersedia</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Produk End -->

@endsection
