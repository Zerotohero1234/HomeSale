@extends('testdesign.layout')

@section('body')
    <div class="container">
        @if (sizeOf($presentWorks) == 0)
            <div class="row pt-5 mt-5 mt-lg-1 justify-content-center">
                <div class="col-12 col-lg-6">
                    <img src="/img/design/not_found.jpg" class="img-fluid d-block" style="margin-inline: auto">
                    <p class="Text-secondary text-center font-weight-bolder h4 mt-5">
                        {{ __('home.no_result') }}
                    </p>
                </div>
            </div>
        @else
            <div class="row pt-5 mt-5 mt-lg-1">
                <div class="col-12">
                    <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                        ຜົນງານທີ່ຜ່ານມາ :
                    </p>
                </div>
                @foreach ($presentWorks as $presentWork)
                    <div class="col-12 col-lg-4 col-md-6 pt-3">
                        <a href="/presentWorkDetail/{{ $presentWork->id }}">
                            <div class="card bg-dark card-shadow plan-card">
                                <img class="card-img-top plan-card-image"
                                    src="/img/design/{{ $presentWork->thumbnail ? $presentWork->thumbnail : 'no_image.jpeg' }}"
                                    alt="Card image cap">
                                <div class="card-body plan-card-body bg-dark">
                                    <p class="text-white font-weight-bolder h5">
                                        {{ App::getLocale() == 'la' ? $presentWork->name : (App::getLocale() == 'en' ? ($presentWork->en_name ? $presentWork->en_name : $presentWork->name) : ($presentWork->cn_name ? $presentWork->cn_name : $presentWork->name)) }}
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
                                    href="/showPresentWorks?page={{ $pagination['offset'] - 1 }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item {{ $pagination['offset'] == '1' ? 'active' : '' }}">
                                <a class="Text-secondary bg-dark page-link" href="/showPresentWorks?page=1">1</a>
                            </li>
                            @for ($j = $pagination['offset'] - 25; $j < $pagination['offset'] - 10; $j++)
                                @if ($j % 10 == 0 && $j > 1)
                                    <li
                                        class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                        <a class="Text-secondary bg-dark page-link"
                                            href="/showPresentWorks?page={{ $j }}">{{ $j }}</a>
                                    </li>
                                @else
                                @endif
                            @endfor
                            @for ($i = $pagination['offset'] - 4; $i <= $pagination['offset'] + 4 && $i <= $pagination['offsets']; $i++)
                                @if ($i > 1 && $i <= $pagination['all'])
                                    <li class="page-item {{ $pagination['offset'] == $i ? 'active' : '' }}">
                                        <a class="Text-secondary bg-dark page-link"
                                            href="/showPresentWorks?page={{ $i }}">{{ $i }}</a>
                                    </li>
                                @else
                                @endif
                            @endfor
                            @for ($j = $pagination['offset'] + 5; $j <= $pagination['offset'] + 20 && $j <= $pagination['offsets']; $j++)
                                @if ($j % 10 == 0 && $j > 1)
                                    <li
                                        class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                        <a class="Text-secondary bg-dark page-link"
                                            href="/showPresentWorks?page={{ $j }}">{{ $j }}</a>
                                    </li>
                                @else
                                @endif
                            @endfor
                            <li class="page-item {{ $pagination['offset'] == $pagination['offsets'] ? 'disabled' : '' }}">
                                <a class="Text-secondary bg-dark page-link"
                                    href="/showPresentWorks?page={{ $pagination['offset'] + 1 }}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        @endif
    </div>
@endsection
