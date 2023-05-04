@extends('testdesign.layout')

@section('body')
    <div class="container">
        @if (sizeOf($lamps) == 0)
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
                {{-- <div class="col-12">
                    <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                        dd
                    </p>
                </div> --}}
                @foreach ($lamps as $lamp)
                    <div class="col-4 col-lg-4 col-md-4 pt-3 px-1">
                        <a type="button" data-toggle="modal" data-target="#lampModal-{{ $lamp->id }}">
                            <div class="card bg-dark card-shadow plan-card">
                                <img class="card-img-top plan-card-image"
                                    src="/img/design/{{ $lamp->thumbnail ? $lamp->thumbnail : 'no_image.jpeg' }}"
                                    alt="Card image cap">
                            </div>
                        </a>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade mt-5" id="lampModal-{{ $lamp->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="lampModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-body p-0">
                                    <div class="card bg-dark card-shadow plan-card" bis_skin_checked="1">
                                        <img class="card-img-top plan-card-image"
                                            src="/img/design/{{ $lamp->thumbnail ? $lamp->thumbnail : 'no_image.jpeg' }}"
                                            alt="Card image cap">
                                        <div class="card-body plan-card-body bg-dark" bis_skin_checked="1">
                                            <p class="text-white font-weight-bolder h5 mb-0">
                                                {{ App::getLocale() == 'la' ? $lamp->name : (App::getLocale() == 'en' ? ($lamp->en_name ? $lamp->en_name : $lamp->name) : ($lamp->cn_name ? $lamp->cn_name : $lamp->name)) }}
                                            </p>
                                            <p class="text-white font-weight-lighter mb-0">
                                                {{ App::getLocale() == 'la' ? $lamp->cate_name : (App::getLocale() == 'en' ? ($lamp->cate_en_name ? $lamp->cate_en_name : $lamp->cate_name) : ($lamp->cate_cn_name ? $lamp->cate_cn_name : $lamp->cate_name)) }}
                                            </p>
                                            <p class="text-white font-weight-lighter">
                                                <?php echo html_entity_decode($lamp->desc); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="row mt-5">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item {{ $pagination['offset'] == 1 ? 'disabled' : '' }}">
                                <a class="Text-secondary bg-dark page-link"
                                    href="/plansByCategory?page={{ $pagination['offset'] - 1 }}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item {{ $pagination['offset'] == '1' ? 'active' : '' }}">
                                <a class="Text-secondary bg-dark page-link" href="/plansByCategory?page=1">1</a>
                            </li>
                            @for ($j = $pagination['offset'] - 25; $j < $pagination['offset'] - 10; $j++)
                                @if ($j % 10 == 0 && $j > 1)
                                    <li
                                        class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                        <a class="Text-secondary bg-dark page-link"
                                            href="/plansByCategory?page={{ $j }}">{{ $j }}</a>
                                    </li>
                                @else
                                @endif
                            @endfor
                            @for ($i = $pagination['offset'] - 4; $i <= $pagination['offset'] + 4 && $i <= $pagination['offsets']; $i++)
                                @if ($i > 1 && $i <= $pagination['all'])
                                    <li class="page-item {{ $pagination['offset'] == $i ? 'active' : '' }}">
                                        <a class="Text-secondary bg-dark page-link"
                                            href="/plansByCategory?page={{ $i }}">{{ $i }}</a>
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
                                            href="/plansByCategory?page={{ $j }}">{{ $j }}</a>
                                    </li>
                                @else
                                @endif
                            @endfor
                            <li class="page-item {{ $pagination['offset'] == $pagination['offsets'] ? 'disabled' : '' }}">
                                <a class="Text-secondary bg-dark page-link"
                                    href="/plansByCategory?page={{ $pagination['offset'] + 1 }}" aria-label="Next">
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
