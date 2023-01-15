@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ຕັ້ງຄ່າໝວດໝູ່</h3>
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
            @elseif(session()->get('error') == 'insert_success')
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                    </button>
                    <span>
                        <b> Success - </b>ບັນທຶກຂໍ້ມູນສຳເລັດ</span>
                </div>
            @endif
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12">
                    <div class="x_panel">
                        <div>
                            <h2>ເພີ່ມໝວດໝູ່</h2>
                        </div>
                        <div class="x_content">
                            <form method="POST" action="/addCategory">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input type="text" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລະດັບ</label>
                                            <select class="form-control" id="level" name="cate_level" required>
                                                <option value="main">
                                                    ໝວດໝູ່ຫຼັກ
                                                </option>
                                                <option value="sub">
                                                    ໝວດໝູ່ຮອງ
                                                </option>
                                                <option value="child">
                                                    ໝວດໝູ່ຍ່ອຍ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group d-none" id="cate-main-select">
                                            <label class="bmd-label-floating">ຢູ່ໃນໝວດໝູ່</label>
                                            <select class="form-control" id="select_parent" name="parent1">
                                                @foreach ($all_categories as $category)
                                                    @if ($category->cate_level == 'main')
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->cate_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group d-none" id="cate-sub-select">
                                            <label class="bmd-label-floating">ຢູ່ໃນໝວດໝູ່</label>
                                            <select class="form-control" id="select_parent" name="parent2">
                                                @foreach ($all_categories as $category)
                                                    @if ($category->cate_level == 'sub')
                                                        <option value="{{ $category->id }}">
                                                            {{ $category->cate_name }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary px-5">ເພີ່ມ</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="x_panel">
                        <div>
                            <h2>ຄົ້ນຫາ</h2>
                        </div>
                        <div class="x_content">
                            <form method="GET" action="/categories">
                                {{-- @csrf --}}
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ຊື່</label>
                                            <input class="form-control" value="{{ Request::input('name') }}" name="name">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ລະດັບ</label>
                                            <select class="form-control" id="level-search" name="cate_level" required>
                                                <option value="">
                                                    ເລືອກ
                                                </option>
                                                <option value="main">
                                                    ໝວດໝູ່ຫຼັກ
                                                </option>
                                                <option value="sub">
                                                    ໝວດໝູ່ຮອງ
                                                </option>
                                                <option value="child">
                                                    ໝວດໝູ່ຍ່ອຍ
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">ສະຖານະ</label>
                                            <select class="form-control" name="enabled">
                                                <option value="">
                                                    ທັງໝົດ
                                                </option>
                                                <option {{ Request::input('enabled') == '1' ? 'selected' : '' }}
                                                    value="1">
                                                    ເປີດໃຊ້ງານ
                                                </option>
                                                <option {{ Request::input('enabled') == '0' ? 'selected' : '' }}
                                                    value="0">
                                                    ປິດໃຊ້ງານ
                                                </option>
                                            </select>
                                        </div>
                                    </div> --}}
                                </div>
                                <button type="submit" class="btn btn-primary pull-right px-5">ຄົ້ນຫາ</button>
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
                            <h2>ໝວດໝູ່ທັງໝົດ</h2>
                        </div>
                        <div class="x_content">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class=" text-primary">
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            ຊື່
                                        </th>
                                        <th>
                                            ລະດັບ
                                        </th>
                                        <th>
                                            ຢູ່ໃນໝວດໝູ່
                                        </th>
                                        <th>

                                        </th>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $key => $cate)
                                            <tr>
                                                <td>
                                                    {{ $key + 1 }}
                                                </td>
                                                <td>
                                                    {{ $cate->cate_name }}
                                                </td>
                                                <td>
                                                    ໝວດໝູ່
                                                    {{ $cate->cate_level == 'main' ? 'ຫຼັກ' : ($cate->cate_level == 'sub' ? 'ຮອງ' : 'ຍ່ອຍ') }}
                                                </td>
                                                <td>
                                                    {{ $cate->parent_name }}
                                                </td>
                                                <td>
                                                    <a href="/editCategory/{{ $cate->id }}">
                                                        <i class="material-icons">create</i>
                                                    </a>
                                                </td>
                                                {{-- <td>
                                                    <a href="/deleteUser/{{ $cate->id }}">
                                                        {{ $cate->enabled == '1' ? 'ປິດໃຊ້ງານ' : 'ເປີດໃຊ້ງານ' }}
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


            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item {{ $pagination['offset'] == 1 ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page={{ $pagination['offset'] - 1 }}"
                            aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                    <li class="page-item {{ $pagination['offset'] == '1' ? 'active' : '' }}">
                        <a class="page-link"
                            href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page=1">1</a>
                    </li>
                    @for ($j = $pagination['offset'] - 25; $j < $pagination['offset'] - 10; $j++)
                        @if ($j % 10 == 0 && $j > 1)
                            <li
                                class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page={{ $j }}">{{ $j }}</a>
                            </li>
                        @else
                        @endif
                    @endfor
                    @for ($i = $pagination['offset'] - 4; $i <= $pagination['offset'] + 4 && $i <= $pagination['offsets']; $i++)
                        @if ($i > 1 && $i <= $pagination['all'])
                            <li class="page-item {{ $pagination['offset'] == $i ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page={{ $i }}">{{ $i }}</a>
                            </li>
                        @else
                        @endif
                    @endfor
                    @for ($j = $pagination['offset'] + 5; $j <= $pagination['offset'] + 20 && $j <= $pagination['offsets']; $j++)
                        @if ($j % 10 == 0 && $j > 1)
                            <li
                                class="page-item
                        {{ $pagination['offset'] == $j ? 'active' : '' }}">
                                <a class="page-link"
                                    href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page={{ $j }}">{{ $j }}</a>
                            </li>
                        @else
                        @endif
                    @endfor
                    <li class="page-item {{ $pagination['offset'] == $pagination['offsets'] ? 'disabled' : '' }}">
                        <a class="page-link"
                            href="{{ Request::route()->getName() }}?name={{ Request::input('name') }}&enabled={{ Request::input('enabled') }}&cate_level={{ Request::input('cate_level') }}&email={{ Request::input('email') }}&page={{ $pagination['offset'] + 1 }}"
                            aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
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
