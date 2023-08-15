@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5 mt-5 mt-lg-1">
            <div class="col-lg-8">
                @if (sizeOf($planSlideImages) == 0)
                    <img src="/img/design/no_image.jpeg" class="img-fluid d-block" style="margin-inline: auto">
                @else
                    <div id="carouselInteriorPlanIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($planSlideImages as $key => $planSlideImage)
                                <button type="button" data-bs-target="#carouselInteriorPlanIndicators"
                                    data-bs-slide-to={{ $key }} class="{{ $key == 0 ? 'active' : '' }}"
                                    aria-current="true">
                                </button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($planSlideImages as $key => $planSlideImage)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="/img/design/slide/{{ $planSlideImage->img_src }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button"
                            data-bs-target="#carouselInteriorPlanIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button"
                            data-bs-target="#carouselInteriorPlanIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-lg-4 mt-5 mt-lg-1">
                <div class="card bg-dark card-shadow"card-shadow>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.width') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->width }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.depth') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->depth }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.leaving_area') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->leaving_area }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.bedroom') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->bedroom }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.bath') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->bath }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0 text-uppercase">{{ __('home.floor') }}</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->floor }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="row pt-5">
            <div class="col-lg-8">
                @if (sizeOf($floorPlanSlideImages) == 0)
                    <img src="/img/design/no_image.jpeg" class="img-fluid d-block" style="margin-inline: auto">
                @else
                    <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            @foreach ($floorPlanSlideImages as $key => $floorPlanSlideImage)
                                <button type="button" data-bs-target="#carouselExampleIndicators"
                                    data-bs-slide-to={{ $key }} class="{{ $key == 0 ? 'active' : '' }}"
                                    aria-current="true">
                                </button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                            @foreach ($floorPlanSlideImages as $key => $floorPlanSlideImage)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <img src="/img/design/slide/{{ $floorPlanSlideImage->img_src }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                @endif
            </div>
            <div class="col-lg-4 mt-5 mt-lg-1">
                <div class="card bg-dark card-shadow"card-shadow>
                    <div class="card-body">
                        @foreach ($planPackages as $planPackage)
                            <div class="row">
                                <div class="col-lg-7 col-7">
                                    <p class="text-white mb-0 text-uppercase">
                                        {{ App::getLocale() == 'la' ? $planPackage->name : (App::getLocale() == 'en' ? ($planPackage->en_name ? $planPackage->en_name : $planPackage->name) : ($planPackage->cn_name ? $planPackage->cn_name : $planPackage->name)) }}
                                    </p>
                                </div>
                                <div class="col-lg-5 col-5">
                                    <p class="text-white mb-0">{{ number_format($planPackage->price) }} &#x24;</p>
                                </div>
                            </div>
                            <hr />
                        @endforeach
                        <div class="row">
                            <div class="col-12">
                                <p class="Text-secondary mb-0 text-uppercase">
                                    {{ __('home.contact') }} :
                                </p>
                            </div>
                            <div class="col-12">
                                <a href="https://wa.me/8562055966596" target="_blank">
                                    <p class="Text-secondary mb-0 text-uppercase">
                                        <span class="fa fa-whatsapp"><i class="sr-only">Whatsapp</i></span> +856 20
                                        55 966 596
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="mt-2">
        </div>

        <div class="row mt-5">
            {{-- <div class="col-12 col-lg-8">
                @foreach ($floor_with_rooms as $floor_with_room)
                    <div class="row mt-3">
                        <div class="col-12">
                            <p class="h5 font-weight-bolder Text-secondary">
                                {{ App::getLocale() == 'la' ? $floor_with_room->floor_name : (App::getLocale() == 'en' ? ($floor_with_room->floor_en_name ? $floor_with_room->floor_en_name : $floor_with_room->floor_name) : ($floor_with_room->floor_cn_name ? $floor_with_room->floor_cn_name : $floor_with_room->floor_name)) }}
                            </p>
                        </div>
                        <div class="col-12">
                            <div class="card bg-dark card-shadow"card-shadow>
                                <div class="card-body d-lg-block d-none">
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.room') }}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.size') }}</p>
                                        </div>
                                        <div class="col-lg-4">
                                            <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.ceiling') }}</p>
                                        </div>
                                    </div>
                                    <hr class="my-2">
                                    @foreach ($floor_with_room->rooms as $room)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <p class="text-white font-weight-lighter mb-0 ">
                                                    {{ App::getLocale() == 'la' ? $room->room_name : (App::getLocale() == 'en' ? ($room->room_en_name ? $room->room_en_name : $room->room_name) : ($room->room_cn_name ? $room->room_cn_name : $room->room_name)) }}
                                                </p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="text-white font-weight-lighter mb-0 ">{{ $room->size }}</p>
                                            </div>
                                            <div class="col-lg-4">
                                                <p class="text-white font-weight-lighter mb-0 ">{{ $room->ceiling }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    @endforeach
                                </div>

                                <div class="card-body d-lg-none">
                                    @foreach ($floor_with_room->rooms as $room)
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.room') }} :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="text-white font-weight-lighter mb-0 ">
                                                    {{ App::getLocale() == 'la' ? $room->room_name : (App::getLocale() == 'en' ? ($room->room_en_name ? $room->room_en_name : $room->room_name) : ($room->room_cn_name ? $room->room_cn_name : $room->room_name)) }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.size') }} :</p>
                                            </div>
                                            <div class="col-6">
                                                <p class="text-white font-weight-lighter mb-0 ">{{ $room->size }}</p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <p class="text-white mb-0 h5 font-weight-bolder">{{ __('home.ceiling') }} :
                                                </p>
                                            </div>
                                            <div class="col-6">
                                                <p class="text-white font-weight-lighter mb-0 ">{{ $room->ceiling }}</p>
                                            </div>
                                        </div>
                                        <hr class="my-2">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                            {{ __('home.description') }}
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="card bg-dark card-shadow"card-shadow>
                            <div class="card-body">
                                <?php echo html_entity_decode($plan->description); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                    {{ __('home.recommended') }}
                </p>
            </div>
            @foreach ($recommendeds as $recommended)
                <div class="col-12 col-lg-4 col-md-6 pt-3">
                    <a href="/detail/{{ $recommended->id }}">
                        <div class="card bg-dark card-shadow plan-card">
                            <img class="card-img-top plan-card-image"
                                src="/img/design/{{ $recommended->thumbnail ? $recommended->thumbnail : 'no_image.jpeg' }}"
                                alt="Card image cap">
                            <div class="card-body plan-card-body bg-dark">
                                <p class="text-white font-weight-bolder h5">
                                    {{ App::getLocale() == 'la' ? $recommended->plan_name : (App::getLocale() == 'en' ? ($recommended->plan_en_name ? $recommended->plan_en_name : $recommended->plan_name) : ($recommended->plan_cn_name ? $recommended->plan_cn_name : $recommended->plan_name)) }}
                                </p>
                                <p class="text-white font-weight-lighter mb-0">
                                    {{ App::getLocale() == 'la' ? $recommended->cate_name : (App::getLocale() == 'en' ? ($recommended->cate_en_name ? $recommended->cate_en_name : $recommended->cate_name) : ($recommended->cate_cn_name ? $recommended->cate_cn_name : $recommended->cate_name)) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <br />
    </div>
@endsection
