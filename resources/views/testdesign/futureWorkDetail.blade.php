@extends('testdesign.layout')

@section('body')
    <div class="container">
        <div class="row pt-5 mt-5 mt-lg-1">
            <div class="col-lg-12">
                @foreach ($futureWorkImages as $futureWorkImage)
                    <img src="/img/design/slide/{{ $futureWorkImage->img_src }}" class="img-fluid img-gallery pt-1"
                        alt="Responsive image">
                @endforeach
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <div class="row">
                    <div class="col-12">
                        <p class="h4 font-weight-bolder text-uppercase headertext-symbol Text-secondary">
                            {{ __('home.description') }}
                        </p>
                    </div>
                    <div class="col-12">
                        <div class="card bg-dark card-shadow"card-shadow>
                            <div class="card-body">
                                <?php echo html_entity_decode($futureWork->description); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br />
    </div>
@endsection
