@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="/plans">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                    <h3 class="d-inline pl-3">
                        ຕັ້ງຄ່າແບບເຮືອນ
                    </h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2 class="card-title">ແກ້ໄຂຊັ້ນ</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/updateFloor">
                                @csrf
                                <input type="hidden" name="id" value="{{ $floor->id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input class="form-control" type="text" value="{{ $floor->floor_name }}"
                                                name="floor_name">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary px-5">ບັນທຶກ</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
