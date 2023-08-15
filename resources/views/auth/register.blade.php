@extends('layouts.app')

@section('content')
<div class="container row justify-content-center align-items-center mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header row justify-content-center">{{ __('ສະໝັກສະມາຊິກ') }}</div>

                <div class="card-body">
                <form method="POST" action="/addUser">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input type="text" name="name" class="form-control rounded-left rounded-right">
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ນາມສະກຸນ</label>
                                            <input type="text" name="last_name" class="form-control rounded-left rounded-right">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-8">
                                        {{-- <div class="form-group">
                                            <label class="bmd-label-floating">ສາຂາ</label>
                                            <select class="form-control" id="select_branch" name="branch_id" required>
                                                <option value="">
                                                    ເລືອກ
                                                </option>
                                                @foreach ($branchs as $branch)
                                                    <option value="{{ $branch->id }}">
                                                        {{ $branch->branch_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div> --}}
                                    </div> -->
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ອີເມວ</label>
                                            <input type="text" name="email" class="form-control rounded-left rounded-right" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ເບີໂທ</label>
                                            <input type="text" name="phone_no" class="form-control rounded-left rounded-right" required>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລະຫັດຜ່ານ</label>
                                            <input type="password" name="password" class="form-control rounded-left rounded-right" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary px-5">ສະໝັກສະມາຊິກ</button>
                                </div>
                                <div class="clearfix"></div>
                            </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
