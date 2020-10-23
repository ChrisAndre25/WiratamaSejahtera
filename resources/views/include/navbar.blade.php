<nav class="navbar navbar-expand-md navbar-light bg-white fixed-top shadow-sm fh-fixedHeader pr-lg-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('images/wisLogo.png') }}" alt="" height="45">
        </a>
        {{-- <div class="col-lg-5" id="navbar-brand-details">
            <div class="col-lg-12">
                <span style="color:rgba(0, 0, 0, 0.5);">PT. Wiratama Sejahtera</span>
            </div>
            <div class="col-lg-12">
                <i class="fas fa-map-marker-alt text-red"></i> <a class="text-decoration-none" style="color:rgba(0, 0, 0, 0.5);" href="https://g.page/wisrefrigeration"> Lindeteves Trade Center Lt. GF 1 Blok C19 No. 1 & 5 Jakarta</a>
            </div>
        </div> --}}
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link mt-1 mr-2" href="#about-us">{{ __('About Us') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle mt-1 mr-2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Products') }}</a>
                        <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('products.index') }}">
                                {{ __('Search by Categories') }}
                            </a>
                            <a class="dropdown-item" href="{{ route('products.brands_index') }}">
                                {{ __('Search by Brands') }}
                            </a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mt-1 mr-2" href="#contact-us">{{ __('Contact Us') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-green rounded-0 mt-1 mr-2" href="https://api.whatsapp.com/send?phone=6287737962053"><i class="fab fa-whatsapp"></i> 0877-3796-2053</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-dark-blue rounded-0 mt-1 mr-2" href="tel:02162201455"><i class="fas fa-phone-alt"></i> 021-6220-1455</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>