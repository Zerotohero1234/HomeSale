@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <a href="/floors">
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
                            <h2 class="card-title">ແກ້ໄຂຫ້ອງ</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/updateRoom">
                                @csrf
                                <input type="hidden" name="id" value="{{ $room->id }}">
                                <input type="hidden" name="floor_id" value="{{ $room->floor_id }}">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input class="form-control" type="text" value="{{ $room->room_name }}"
                                                name="room_name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາອັງກິດ</label>
                                            <input type="text" name="room_en_name" value="{{ $room->room_en_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາຈີນ</label>
                                            <input type="text" name="room_cn_name" value="{{ $room->room_cn_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາໄທ</label>
                                            <input type="text" name="room_th_name" value="{{ $room->room_th_name }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຂະໜາດ</label>
                                            <input class="form-control" type="text" value="{{ $room->size }}"
                                                name="size">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ເພດານ</label>
                                            <input class="form-control" type="text" value="{{ $room->ceiling }}"
                                                name="ceiling">
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
