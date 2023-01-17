@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light card-shadow"
                    id="ftco-category-navbar" style="display: block">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-cate-nav"
                        aria-controls="ftco-cate-nav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="fa fa-bars text-white"></span>
                    </button>
                    <div class="d-inline" id="ftco-cate-nav">
                        <ul class="navbar-nav" id="category-nav">
                            @foreach ($categories_results as $main)
                                <li class="nav-item dropdown dropdown-category">
                                    <a class="nav-link text-wrap text-break py-3" href="#" id="dropdown04"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ $main->cate_name }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-1 dropdown-category-menu rounded-0"
                                        aria-labelledby="dropdown04">
                                        <div class="bg-dark ml-1" id="ftco-nav-1">
                                            <ul class="navbar-nav" id="category-nav">
                                                @if (isset($main->child))
                                                    @foreach ($main->child as $sub)
                                                        <li class="nav-item dropdown dropdown-category-2">
                                                            <a class="nav-link text-wrap text-break py-3" href="#"
                                                                id="dropdown041" data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">
                                                                {{ $sub->cate_name }}
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-2 dropdown-category-menu rounded-0"
                                                                aria-labelledby="dropdown04">
                                                                <div class="bg-dark ml-1" id="ftco-nav-2">
                                                                    <ul class="navbar-nav" id="category-nav">
                                                                        @if (isset($sub->child))
                                                                            @foreach ($sub->child as $child)
                                                                                <li
                                                                                    class="nav-item dropdown dropdown-category-2">
                                                                                    <a class="nav-link py-3"
                                                                                        href="#">{{ $child->cate_name }}</a>
                                                                                </li>
                                                                            @endforeach
                                                                        @endif
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            {{-- @for ($i = 0; $i < 5; $i++)
                                <li class="nav-item dropdown dropdown-category">
                                    <a class="nav-link text-wrap text-break py-3" href="#" id="dropdown04"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        House-{{ $i + 1 }}
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-1 dropdown-category-menu rounded-0"
                                        aria-labelledby="dropdown04">
                                        <div class="bg-dark ml-1" id="ftco-nav-1">
                                            <ul class="navbar-nav" id="category-nav">
                                                <li class="nav-item dropdown dropdown-category-2">
                                                    <a class="nav-link text-wrap text-break py-3" href="#"
                                                        id="dropdown041" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">home</a>
                                                    <div class="dropdown-menu dropdown-menu-2 dropdown-category-menu rounded-0"
                                                        aria-labelledby="dropdown04">
                                                        <div class="bg-dark ml-1" id="ftco-nav-2">
                                                            <ul class="navbar-nav" id="category-nav">
                                                                <li class="nav-item dropdown dropdown-category-2">
                                                                    <a class="nav-link py-3" href="#">Cate3</a>
                                                                </li>
                                                                <li class="nav-item dropdown dropdown-category-2">
                                                                    <a class="nav-link" href="#">Cate3</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="nav-item dropdown dropdown-category-2">
                                                    <a class="nav-link text-wrap text-break py-3" href="#"
                                                        id="dropdown041" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">home</a>
                                                    <div class="dropdown-menu dropdown-menu-2 dropdown-category-menu rounded-0"
                                                        aria-labelledby="dropdown04">
                                                        <div class="bg-dark ml-1" id="ftco-nav-2">
                                                            <ul class="navbar-nav" id="category-nav">
                                                                <li class="nav-item dropdown dropdown-category-2">
                                                                    <a class="nav-link py-3" href="#">Cate3</a>
                                                                </li>
                                                                <li class="nav-item dropdown dropdown-category-2">
                                                                    <a class="nav-link" href="#">Cate3</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endfor --}}
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-12">
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <a href="/detail/1"><img src="{{ URL::asset('/img/design/1.jpeg') }}" class="d-block w-100"
                                    alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a href="/detail/1"><img src="{{ URL::asset('/img/design/2.jpeg') }}" class="d-block w-100"
                                    alt="..."></a>
                        </div>
                        <div class="carousel-item">
                            <a href="/detail/1"><img src="{{ URL::asset('/img/design/3.jpeg') }}" class="d-block w-100"
                                    alt="..."></a>
                        </div>
                    </div>
                    <button class="carousel-control-prev Text-secondary" type="button"
                        data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <div class="card bg-dark card-shadow">
                    <div class="card-header">
                        <p class="h5 Text-secondary">ຄົ້ນຫາແບບເຮືອນ</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-3 py-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>ຈຳນວນຊັ້ນ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 py-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>ຫ້ອງນອນ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 py-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>ຫ້ອງນ້ຳ</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 py-2">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>ລາຄາ</option>
                                    <option value="1">100,000,000-200,000,000</option>
                                    <option value="1">200,000,000-400,000,000</option>
                                    <option value="1">400,000,000-700,000,000</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 col-lg-3 pt-3">
                                <button type="button" class="btn Btn-outline-secondary px-5">ຄົ້ນຫາ</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                    Recommended
                </p>
            </div>
            @foreach ($recommendeds as $recommended)
                <div class="col-12 col-lg-4 col-md-6 pt-3">
                    <a href="/detail/{{ $recommended->id }}">
                        <div class="card bg-dark card-shadow plan-card">
                            <img class="card-img-top plan-card-image" src="/img/design/{{ $recommended->thumbnail }}"
                                alt="Card image cap">
                            <div class="card-body plan-card-body bg-dark">
                                <p class="text-white font-weight-bolder h5">
                                    {{ $recommended->plan_name }}
                                </p>
                                <p class="text-white font-weight-lighter mb-0">
                                    {{ $recommended->cate_name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
