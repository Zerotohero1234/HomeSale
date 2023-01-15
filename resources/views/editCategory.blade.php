@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ແກ້ໄຂໝວດໝູ່</h3>
                </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2 class="card-title">ແກ້ໄຂໝວດໝູ່</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/updateCategory">
                                <input type="hidden" name="id" value="{{ $category->id }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input type="text" value="{{ $category->cate_name }}" name="name"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລະດັບ</label>
                                            <select class="form-control" id="level" name="cate_level" required>
                                                <option value="main"
                                                    {{ $category->cate_level == 'main' ? 'selected' : '' }}>
                                                    ໝວດໝູ່ຫຼັກ
                                                </option>
                                                <option value="sub"
                                                    {{ $category->cate_level == 'sub' ? 'selected' : '' }}>
                                                    ໝວດໝູ່ຮອງ
                                                </option>
                                                <option value="child"
                                                    {{ $category->cate_level == 'child' ? 'selected' : '' }}>
                                                    ໝວດໝູ່ຍ່ອຍ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group {{ $category->cate_level == 'sub' ? '' : 'd-none' }}"
                                            id="cate-main-select">
                                            <label class="bmd-label-floating">ຢູ່ໃນໝວດໝູ່</label>
                                            <select class="form-control" id="select_parent" name="parent">
                                                @foreach ($all_categories as $cate)
                                                    @if ($cate->cate_level == 'main')
                                                        <option value="{{ $cate->id }}"
                                                            {{ $category->id == $cate->parent ? 'selected' : '' }}>
                                                            {{ $cate->cate_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group {{ $category->cate_level == 'child' ? '' : 'd-none' }}"
                                            id="cate-sub-select">
                                            <label class="bmd-label-floating">ຢູ່ໃນໝວດໝູ່</label>
                                            <select class="form-control" id="select_parent" name="parent">
                                                @foreach ($all_categories as $cate)
                                                    @if ($cate->cate_level == 'sub')
                                                        <option value="{{ $cate->id }}"
                                                            {{ $category->id == $cate->parent ? 'selected' : '' }}>
                                                            {{ $cate->cate_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $("#level").change(function() {
            if ($(this).val() == "main") {
                $("#cate-main-select").addClass("d-none")
                $("#cate-sub-select").addClass("d-none")
            } else if ($(this).val() == "sub") {
                $("#cate-main-select").removeClass("d-none")
                $("#cate-sub-select").addClass("d-none")
            } else {
                $("#cate-main-select").addClass("d-none")
                $("#cate-sub-select").removeClass("d-none")
            }
        });
    </script>
@endsection
