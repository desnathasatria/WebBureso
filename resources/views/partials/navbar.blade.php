<div class="container-fluid nav-bar px-0 px-lg-4 py-lg-0">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a href="#" class="navbar-brand p-0">
                <table>
                    <tr>
                        <td>
                            <img src="{{ asset('assets/img/logo.png') }}" alt="Logo">
                        </td>
                        <td>
                            <h1 class="text-primary mb-0">Warung Bureso</h1>
                        </td>
                    </tr>
                </table>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-0 mx-lg-auto">
                    <a href="{{ url('/') }}" class="nav-item nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
                    <a href="{{ url('/profile') }}" class="nav-item nav-link {{ request()->is('profile') ? 'active' : '' }}">Produk</a>
                    <a href="{{ url('/contact') }}" class="nav-item nav-link {{ request()->is('contact') ? 'active' : '' }}">Kontak</a>
                </div>
            </div>
            <div class="d-none d-xl-flex flex-shrink-0 ps-4">
                <a href="#" class="btn btn-light btn-lg-square rounded-circle position-relative">
                    <i class="fa fa-phone-alt fa-2x"></i>
                    <div class="position-absolute" style="top: 7px; right: 12px;">
                        <span><i class="fa fa-comment-dots text-secondary"></i></span>
                    </div>
                </a>
                <div class="d-flex flex-column ms-3">
                    <span>Hubungi Kami</span>
                    <a href="tel:+6281252776657"><span class="text-dark">081252776657</span></a>
                </div>
            </div>
        </nav>
    </div>
</div>
