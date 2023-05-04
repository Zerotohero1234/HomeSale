@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="/lampCategories">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                    <h3 class="d-inline pl-3">ແກ້ໄຂໝວດໝູ່ໂຄມໄຟ</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2 class="card-title">ແກ້ໄຂໝວດໝູ່ໂຄມໄຟ</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/updateLampCategory">
                                <input type="hidden" name="id" value="{{ $lamp_category->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input type="text" value="{{ $lamp_category->name }}" name="name"
                                                class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາອັງກິດ</label>
                                            <input type="text" name="en_name" value="{{ $lamp_category->en_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາຈີນ</label>
                                            <input type="text" name="cn_name" value="{{ $lamp_category->cn_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາໄທ</label>
                                            <input type="text" name="th_name" value="{{ $lamp_category->th_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary pull-right px-5">ບັນທຶກ</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
