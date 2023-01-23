@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5 mt-3 mt-lg-1">
            <div class="col-12">
                <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                    {{ $category->cate_name }} :
                </p>
            </div>
            @foreach ($plans as $plan)
                <div class="col-12 col-lg-4 col-md-6 pt-3">
                    <a href="/detail/{{ $plan->id }}">
                        <div class="card bg-dark card-shadow plan-card">
                            <img class="card-img-top plan-card-image" src="/img/design/{{ $plan->thumbnail }}"
                                alt="Card image cap">
                            <div class="card-body plan-card-body bg-dark">
                                <p class="text-white font-weight-bolder h5">
                                    {{ $plan->plan_name }}
                                </p>
                                <p class="text-white font-weight-lighter mb-0">
                                    {{ $plan->cate_name }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
