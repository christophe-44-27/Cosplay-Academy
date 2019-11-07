<header class="header-search header-logosec p-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="header-search-logo d-none d-lg-block">
                    <a class="header-logo" href="{{ route('homepage') }}">
                        <img src="{{ asset('themes/frontend/images/brand/logo1.png') }}" class="header-brand-img" alt=" logo">
                        <img src="{{ asset('themes/frontend/images/brand/logo.png') }}" class="header-brand-img header-white" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="header-icons float-right">
                    <ul class="header-icons-link">
                        @auth()
                            <li class="">
                                <a href="{{ route('instructor_dashboard') }}" class="header-icons-link1"><i class="fa fa-briefcase" data-toggle="tooltip"
                                                                          data-placement="bottom" title="" data-original-title="@lang('Section formateur')"></i></a>
                            </li>
                        @endauth
                        <li class="">
                            <a href="{{ route('cart') }}" class="header-icons-link1"><i class="fa fa-cart-plus"></i>
                                <span class="main-badge1 badge badge-danger badge-pill"> {{ $cart_items }}</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
