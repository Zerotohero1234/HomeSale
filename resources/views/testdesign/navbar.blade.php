<!-- top navigation -->
<section class="ftco-section">
    <div class="container-fluid fixed-top">
        <div class="row justify-content-between" style="background-color: black">
            <div class="col-md-12 order-md-last">
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a class="navbar-brand" href="/"><img src="{{ URL::asset('/img/design/JSK-logo.jpeg') }}"
                                class="img-fluid" style="max-height: 50px"></a>
                    </div>
                    <div class="col-md-6 d-none d-md-flex justify-content-end mb-md-0 mb-3 align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle Text-secondary" href="#"
                                id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                {{ Config::get('languages')[App::getLocale()] }}
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                @foreach (Config::get('languages') as $lang => $language)
                                    @if ($lang != App::getLocale())
                                        <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}">
                                            {{ $language }}</a>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light mt-0 mt-lg-5 pt-lg-2"
        id="ftco-navbar">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fa fa-bars text-white"></span>
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item active">
                        <a href="/home" class="nav-link">{{ __('home.home') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04111" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ __('home.categories') }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04111">
                            @foreach ($categories as $category)
                                <a class="dropdown-item" href="/plansByCategory/{{ $category->id }}">
                                    {{ App::getLocale() == 'la' ? $category->cate_name : (App::getLocale() == 'en' ? ($category->cate_en_name ? $category->cate_en_name : $category->cate_name) : ($category->cate_cn_name ? $category->cate_cn_name : $category->cate_name)) }}
                                </a>
                            @endforeach
                        </div>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">ໂຄງການ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04111" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">{{ __('home.work') }}</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04111">
                            <a class="dropdown-item" href="/showPastWorks">
                                ຜົນງານທີ່ຜ່ານມາ
                            </a>
                            <a class="dropdown-item" href="/presentWorks">
                                ຜົນງານປະຈຸບັນ
                            </a>
                            <a class="dropdown-item" href="/futureWorks">
                                ອະນາຄົດ
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="social-float-div" class="card card-body p-2 bg-dark rounded-0">
        <div class="social-media mb-2">
            <p class="mb-0 d-flex">
                <a href="https://www.facebook.com/Jskgroup.lao" target="_blank"
                    class="d-flex align-items-center justify-content-center"><span class="fa fa-facebook"><i
                            class="sr-only">Facebook</i></span></a>
            </p>
        </div>
        <div class="social-media mb-2">
            <p class="mb-0 d-flex">
                <a href="https://wa.me/8562097899656" target="_blank"
                    class="d-flex align-items-center justify-content-center"><span class="fa fa-whatsapp"><i
                            class="sr-only">Whatsapp</i></span></a>
            </p>
        </div>
    </div>
    <!-- END nav -->

</section>
