@extends('admin.layouts.master')
@section('title','Tổng quan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $genres }}</h3>
                        <p>Thể loại</p>
                    </div>
                    <div class="icon"><i class="nav-icon fas fa-solid fa-list"></i></div>
                    <a href="{{ route('admin.genre') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $books }}</h3>
                        <p>Sách truyện</p>
                    </div>
                    <div class="icon"><i class="nav-icon fas fa-solid fa-book"></i></div>
                    <a href="{{ route('admin.book') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $users }}</h3>
                        <p>Tài khoản</p>
                    </div>
                    <div class="icon"> <i class="ion ion-person-add"></i></div>
                    <a href="{{ route('admin.user') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-chart-pie mr-1"></i>
                Sales
            </h3>
            <div class="card-tools">
                <ul class="nav nav-pills ml-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sales-chart" data-toggle="tab">Donut</a>
                </li>
                </ul>
            </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content p-0">
                    <!-- Morris chart - Sales -->
                    <div class="chart tab-pane active" id="revenue-chart"
                        style="position: relative; height: 300px;">
                        <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                    <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                    <canvas id="sales-chart-canvas" height="300" style="height: 300px;"></canvas>
                    </div>
                </div>
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
        <!-- Calendar -->
        <div class="card bg-gradient-success">
            <div class="card-header border-0">
                <h3 class="card-title"><i class="far fa-calendar-alt"></i>Calendar</h3>
                <!-- tools card -->
                <div class="card-tools">
                    <!-- button with a dropdown -->
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
            <!-- /. tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body pt-0">
            <!--The calendar -->
            <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </section>
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

        <!-- Map card -->
        <div class="card bg-gradient-primary">
            <div class="card-header border-0">
            <h3 class="card-title">
                <i class="fas fa-map-marker-alt mr-1"></i>
                Visitors
            </h3>
            <!-- card tools -->
            <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                <i class="far fa-calendar-alt"></i>
                </button>
                <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                <i class="fas fa-minus"></i>
                </button>
            </div>
            <!-- /.card-tools -->
            </div>
            <div class="card-body">
            <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.card-body-->
            <div class="card-footer bg-transparent">
            <div class="row">
                <div class="col-4 text-center">
                <div id="sparkline-1"></div>
                <div class="text-white">Visitors</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <div id="sparkline-2"></div>
                <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <div id="sparkline-3"></div>
                <div class="text-white">Sales</div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            </div>
        </div>
        <!-- /.card -->

        <!-- solid sales graph -->
        <div class="card bg-gradient-info">
            <div class="card-header border-0">
            <h3 class="card-title">
                <i class="fas fa-th mr-1"></i>
                Sales Graph
            </h3>

            <div class="card-tools">
                <button type="button" class="btn bg-info btn-sm" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn bg-info btn-sm" data-card-widget="remove">
                <i class="fas fa-times"></i>
                </button>
            </div>
            </div>
            <div class="card-body">
            <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
            </div>
            <!-- /.card-body -->
            <div class="card-footer bg-transparent">
            <div class="row">
                <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="20" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="text-white">Mail-Orders</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="50" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="text-white">Online</div>
                </div>
                <!-- ./col -->
                <div class="col-4 text-center">
                <input type="text" class="knob" data-readonly="true" value="30" data-width="60" data-height="60"
                        data-fgColor="#39CCCC">

                <div class="text-white">In-Store</div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            </div>
            <!-- /.card-footer -->
        </div>
        <!-- /.card -->


        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->
    </div>
@endsection
