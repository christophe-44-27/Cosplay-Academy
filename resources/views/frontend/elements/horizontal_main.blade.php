<div class="header-style horizontal-main bg-dark-transparent clearfix">
    <div class="horizontal-mainwrapper container clearfix">
        <nav class="horizontalMenu clearfix d-md-flex">
            <ul class="horizontalMenu-list">
                <li><a href="{{ route('homepage') }}">@lang("Accueil")</a></li>
                <li aria-haspopup="true">
                    <a href="#">
                        @lang("Cosplay")
                        <span class="fe fe-chevron-down m-0"></span>
                    </a>
                    <ul class="sub-menu">
                        <li aria-haspopup="true">
                            <a href="{{ route('courses') }}">
                                @lang("Cours")
                            </a>
                        </li>
                        <li aria-haspopup="true">
                            <a href="{{ route('tutorials') }}">
                                @lang("Tutoriels")
                            </a>
                        </li>
                    </ul>
                </li>
                <li><a href="#">@lang("Steampunk")</a></li>
                <li><a href="#">@lang("Grandeurs natures")</a></li>
                <li><a href="#">@lang("Evénements")</a></li>
                <li><a href="{{ route('contact') }}">@lang("Contact")</a></li>
            </ul>
        </nav>
    </div>
</div>
