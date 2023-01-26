@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5 mt-5 mt-lg-1">
            <div class="col-12">
                <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                    Search Result :
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
                                    {{ App::getLocale() == 'la' ? $plan->plan_name : (App::getLocale() == 'en' ? ($plan->plan_en_name ? $plan->plan_en_name : $plan->plan_name) : ($plan->plan_cn_name ? $plan->plan_cn_name : $plan->plan_name)) }}
                                </p>
                                <p class="text-white font-weight-lighter mb-0">
                                    {{ App::getLocale() == 'la' ? $plan->cate_name : (App::getLocale() == 'en' ? ($plan->cate_en_name ? $plan->cate_en_name : $plan->cate_name) : ($plan->cate_cn_name ? $plan->cate_cn_name : $plan->cate_name)) }}
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

            <div class="row mt-5">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item {{ $pagination['offset'] == 1 ? 'disabled' : '' }}">
                            <a class="Text-secondary bg-dark page-link"
                                href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page={{ $pagination['offset'] - 1 }}"
                                aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item {{ $pagination['offset'] == '1' ? 'active' : '' }}">
                            <a class="Text-secondary bg-dark page-link"
                                href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page=1">1</a>
                        </li>
                        @for ($j = $pagination['offset'] - 25; $j < $pagination['offset'] - 10; $j++)
                            @if ($j % 10 == 0 && $j > 1)
                                <li
                                    class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                    <a class="Text-secondary bg-dark page-link "
                                        href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page={{ $j }}">{{ $j }}</a>
                                </li>
                            @endif
                        @endfor
                        @for ($i = $pagination['offset'] - 4; $i <= $pagination['offset'] + 4 && $i <= $pagination['offsets']; $i++)
                            @if ($i > 1 && $i <= $pagination['all'])
                                <li class="page-item {{ $pagination['offset'] == $i ? 'active' : '' }}">
                                    <a class="Text-secondary bg-dark page-link"
                                        href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page={{ $i }}">{{ $i }}</a>
                                </li>
                            @endif
                        @endfor
                        @for ($j = $pagination['offset'] + 5; $j <= $pagination['offset'] + 20 && $j <= $pagination['offsets']; $j++)
                            @if ($j % 10 == 0 && $j > 1)
                                <li
                                    class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                    <a class="Text-secondary bg-dark page-link "
                                        href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page={{ $j }}">{{ $j }}</a>
                                </li>
                            @endif
                        @endfor
                        <li class="page-item {{ $pagination['offset'] == $pagination['offsets'] ? 'disabled' : '' }}">
                            <a class="Text-secondary bg-dark page-link"
                                href="{{ Request::route()->getName() }}?floor={{ Request::input('floor') }}&bedroom={{ Request::input('bedroom') }}&bath={{ Request::input('bath') }}&page={{ $pagination['offset'] + 1 }}"
                                aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
@endsection
