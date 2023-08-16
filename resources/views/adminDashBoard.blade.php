@extends('layout')

@section('body')
    <!-- End Navbar -->
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>ລາຍງານຂໍ້ມູນ</h3>
                </div>
                    @php
    $countPlans = count($all_plans);
    $countCate = ($total_categories);
    $countUser = ($total_users);
    $countCategory14 = ($countCategory14);
    $countCategory15 = ($plans12);
 @endphp

 <!-- <p>There are {{ $countPlans }} plans.</p>
 <p>There are {{ $countCate }} Cate.</p>
 <p>There are {{ $total_users }} User.</p>
 <p>There are {{ $countCategory14 }} countCategory14.</p>
 <p>There are {{ $countCategory15 }} countCategory15.</p> -->


                                        
            </div>
            <div class="clearfix"></div>
            <div class="row mt-3">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ຈຳນວນຜູ້ໃຊ້</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $total_users }} ຄົນ</div>
                                        </div>
                                        <div class="col-auto text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M313.6 304c-28.7 0-42.5 16-89.6 16-47.1 0-60.8-16-89.6-16C60.2 304 0 364.2 0 438.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-25.6c0-74.2-60.2-134.4-134.4-134.4zM400 464H48v-25.6c0-47.6 38.8-86.4 86.4-86.4 14.6 0 38.3 16 89.6 16 51.7 0 74.9-16 89.6-16 47.6 0 86.4 38.8 86.4 86.4V464zM224 288c79.5 0 144-64.5 144-144S303.5 0 224 0 80 64.5 80 144s64.5 144 144 144zm0-240c52.9 0 96 43.1 96 96s-43.1 96-96 96-96-43.1-96-96 43.1-96 96-96z"/></svg>
                                            <!-- <i class="fas fa-user-o fa-2x text-gray-300" aria-hidden="true"></i> -->
                                            <!-- <i class="bi bi-calendar"></i> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                ແບບເຮືອນ</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countPlans }} ຫຼັງ</div>
                                        </div>
                                        <!-- <div class="col-auto text-success"> -->
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 640 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M320 384H128V224H64v256c0 17.7 14.3 32 32 32h256c17.7 0 32-14.3 32-32V224h-64v160zm314.6-241.8l-85.3-128c-6-8.9-16-14.2-26.7-14.2H117.4c-10.7 0-20.7 5.3-26.6 14.2l-85.3 128c-14.2 21.3 1 49.8 26.6 49.8H608c25.5 0 40.7-28.5 26.6-49.8zM512 496c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16V224h-64v272z"/></svg>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">ປະເພດເຮືອນ
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $countCate }} ປະເພດ</div>
                                        </div>
                                        <div class="col-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5rem" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M12.41 148.02l232.94 105.67c6.8 3.09 14.49 3.09 21.29 0l232.94-105.67c16.55-7.51 16.55-32.52 0-40.03L266.65 2.31a25.607 25.607 0 0 0-21.29 0L12.41 107.98c-16.55 7.51-16.55 32.53 0 40.04zm487.18 88.28l-58.09-26.33-161.64 73.27c-7.56 3.43-15.59 5.17-23.86 5.17s-16.29-1.74-23.86-5.17L70.51 209.97l-58.1 26.33c-16.55 7.5-16.55 32.5 0 40l232.94 105.59c6.8 3.08 14.49 3.08 21.29 0L499.59 276.3c16.55-7.5 16.55-32.5 0-40zm0 127.8l-57.87-26.23-161.86 73.37c-7.56 3.43-15.59 5.17-23.86 5.17s-16.29-1.74-23.86-5.17L70.29 337.87 12.41 364.1c-16.55 7.5-16.55 32.5 0 40l232.94 105.59c6.8 3.08 14.49 3.08 21.29 0L499.59 404.1c16.55-7.5 16.55-32.5 0-40z"/></svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->
                        <!-- <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    <!-- @foreach ($plans12 as $count)
                                                <p>
                                                    {{ $count->category }} count = {{ $count->plan_count }}
                                                </p>
                                        @endforeach -->
                                        <!-- @foreach ($categories as $count)
                                                <p>
                                                    {{ $count->cate_name }}
                                                </p>
                                        @endforeach -->
                                        <script>
    window.onload = function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            theme: "light2",
            title: {
                text: "Top Oil Reserves"
            },
            axisY: {
                title: "Reserves(MMbbl)"
            },
            data: [{
                type: "column",
                showInLegend: true,
                legendMarkerColor: "grey",
                legendText: "MMbbl = one million barrels",
                dataPoints: [
                    @foreach ($plans12 as $count)
                        @foreach ($categories as $category)
                            @if ($count->category == $category->id)
                                { y: {{ $count->plan_count }}, label: "{{ $category->cate_name }}" },
                            @endif
                        @endforeach
                    @endforeach
                ]
            }]
        });
        chart.render();
    }
</script>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    </div>
                                    
    </div> 
    <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script> 
@endsection
