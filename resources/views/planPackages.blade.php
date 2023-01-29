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
                        ຕັ້ງຄ່າຮູບແບບການຂາຍ
                    </h3>
                </div>
            </div>
            <div class="clearfix"></div>

            @if (session()->get('error') == 'not_insert')
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        <b> Danger - </b>ເກີດຂໍ້ຜິດພາດ ກະລຸນາລອງໃໝ່</span>
                </div>
            @elseif(session()->get('error') == 'delete_success')
                <div class="alert alert-warning">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        <b> Success - </b>ລົບຂໍ້ມູນສຳເລັດ</span>
                </div>
            @elseif(session()->get('error') == 'insert_success')
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        <b> Success - </b>ບັນທຶກຂໍ້ມູນສຳເລັດ</span>
                </div>
            @elseif(session()->get('error') == 'edit_success')
                <div class="alert alert-info">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        <b> Success - </b>ແກ້ໄຂຂໍ້ມູນສຳເລັດ</span>
                </div>
            @endif
            <div class="clearfix"></div>

            <div class="row mt-3">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2 class="card-title">ເພີ່ມຮູບແບບການຂາຍ</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/addPlanPackage">
                                @csrf
                                <input type="hidden" name="plan_id" value="{{ $id }}">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input class="form-control" type="text" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາອັງກິດ</label>
                                            <input type="text" name="en_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາຈີນ</label>
                                            <input type="text" name="cn_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່ພາສາໄທ</label>
                                            <input type="text" name="th_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລາຄາ</label>
                                            <input type="text" name="price" class="form-control">
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

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2>ຊັ້ນທັງໝົດ</h2>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            ຊື່
                                        </th>
                                        <th>
                                            ຊື່ພາສາອັງກິດ
                                        </th>
                                        <th>
                                            ຊື່ພາສາຈີນ
                                        </th>
                                        <th>
                                            ຊື່ພາສາໄທ
                                        </th>
                                        <th>
                                            ລາຄາ
                                        </th>
                                        <th>

                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($planPackages as $planPackage)
                                            <tr>
                                                <td class="w-50">
                                                    {{ $planPackage->name }}
                                                </td>
                                                <td>
                                                    {{ $planPackage->en_name }}
                                                </td>
                                                <td>
                                                    {{ $planPackage->cn_name }}
                                                </td>
                                                <td>
                                                    {{ $planPackage->th_name }}
                                                </td>
                                                <td>
                                                    {{ $planPackage->price }}
                                                </td>
                                                <td>
                                                    <a class="pl-5" href="/editPlanPackage/{{ $planPackage->id }}">
                                                        <i class="material-icons">create</i>
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <a href="/deletePlan/{{ $planPackage->id }}">
                                                        {{ $planPackage->enabled == '1' ? 'ປິດໃຊ້ງານ' : 'ເປີດໃຊ້ງານ' }}
                                                    </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
