<nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #00b646;" data-bs-theme="light">
    <div class="container-fluid px-3 px-md-4">
        
        <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
            <img src="{{ asset('images/logo-sena.png') }}" alt="logo Sena" class="img-fluid"
                style="width: 40px; height: 40px; margin-right: 10px;">
            <span class="fw-bold fs-5 text-white tracking-wide">Admin Sena</span>
        </a>

        <button class="navbar-toggler border-0 text-white shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav nav-underline navbar-dark ms-auto mb-2 mb-lg-0 gap-2 align-items-lg-center">
                
                <li class="nav-item">
                    <a class="nav-link text-white px-3 py-2 fw-semibold" href="{{ url('/about') }}">¿Quiénes Somos?</a>
                </li>

            </ul>
        </div>
    </div>
</nav>