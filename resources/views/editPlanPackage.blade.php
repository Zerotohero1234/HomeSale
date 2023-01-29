@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="/planPackages">
                        <i class="material-icons">keyboard_backspace</i>
                    </a>
                    <h3 class="d-inline pl-3">
                        ຕັ້ງຄ່າຮູບແບບການຂາຍ
                    </h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2 class="card-title">ແກ້ໄຂຮູບແບບການຂາຍ</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/updatePlanPackage">
                                @csrf
                                <input type="hidden" name="id" value="{{ $planPackage->id }}">
                                <input type="hidden" name="plan_id" value="{{ $planPackage->plan_id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input class="form-control" type="text" value="{{ $planPackage->name }}"
                                                name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາອັງກິດ</label>
                                            <input type="text" name="en_name" value="{{ $planPackage->en_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາຈີນ</label>
                                            <input type="text" name="cn_name" value="{{ $planPackage->cn_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາໄທ</label>
                                            <input type="text" name="th_name" value="{{ $planPackage->th_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລາຄາ</label>
                                            <input class="form-control" type="text" value="{{ $planPackage->price }}"
                                                name="price">
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
