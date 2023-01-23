@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5">
            <div class="col-lg-8">
                <div id="carouselInteriorPlanIndicators" class="carousel slide" data-bs-ride="carousel">
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
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselInteriorPlanIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselInteriorPlanIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-4 mt-5 mt-lg-1">
                <div class="card bg-dark card-shadow"card-shadow>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">WIDTH</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->width }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">DEPTH</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->depth }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">LIVING AREA</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->leaving_area }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">BEDROOM(S)</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->bedroom }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">BATHS</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->bath }}</p>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="row">
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">FLOOR</p>
                            </div>
                            <div class="col-lg-6 col-6">
                                <p class="text-white mb-0">{{ $plan->floor }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row pt-5">
            <div class="col-12">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
            </div>
        </div>

        <div class="mt-2">
        </div>

        @foreach ($floor_with_rooms as $floor_with_room)
            <div class="row pt-3">
                <div class="col-12">
                    <p class="h5 font-weight-bolder Text-secondary">
                        {{ $floor_with_room->floor_name }}
                    </p>
                </div>
                <div class="col-12">
                    <div class="card bg-dark card-shadow"card-shadow>
                        <div class="card-body d-lg-block d-none">
                            <div class="row">
                                <div class="col-lg-4">
                                    <p class="text-white mb-0 h5 font-weight-bolder">ຫ້ອງ</p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="text-white mb-0 h5 font-weight-bolder">SIZES</p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="text-white mb-0 h5 font-weight-bolder">CEILING</p>
                                </div>
                            </div>
                            <hr class="my-2">
                            @foreach ($floor_with_room->rooms as $room)
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="text-white font-weight-lighter mb-0 ">{{ $room->room_name }}</p>
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
                                        <p class="text-white mb-0 font-weight-bolder">ຫ້ອງ</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-white font-weight-lighter mb-0 ">Kitchen</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-white mb-0 font-weight-bolder">SIZES</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="text-white font-weight-lighter mb-0 ">{{ $room->size }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <p class="text-white mb-0 font-weight-bolder">CEILING</p>
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

        <div class="row pt-5">
            <div class="col-12">
                <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                    Description
                </p>
            </div>
            <div class="col-12">
                <div class="card bg-dark card-shadow"card-shadow>
                    <div class="card-body">
                        <?php echo html_entity_decode($plan->description) ?>
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
        <br />
    </div>
@endsection
