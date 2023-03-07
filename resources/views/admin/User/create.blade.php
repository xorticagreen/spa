@extends('admin.layouts.main')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.Main.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">{{ $title }}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>

                            <p>New Orders</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>53<sup style="font-size: 20px">%</sup></h3>

                            <p>Bounce Rate</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $user_registrations }}</h3>

                            <p>User Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>65</h3>

                            <p>Unique Visitors</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->
            <!-- Main row -->
            <div class="row">

                <div class="col col-sm-12 col-md-4 border border-4 dark:border-gray-700 p-4 mx-auto my-2" >
{{--                    <form action="{{route('admin.categories.store')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <div class="mb-3">--}}
{{--                            <label class="form-label">Category Name</label>--}}
{{--                            <input type="text" name="name" class="form-control" id="InputName">--}}
{{--                            <div id="nameHelp" class="form-text">Input Name</div>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <label for="description" class="form-label">Description</label>--}}
{{--                            <textarea class="form-control"  name="description" id="description"></textarea>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 form-check">--}}
{{--                            <input type="checkbox" name="is_published" class="form-check-input" id="exampleCheck1">--}}
{{--                            <label class="form-check-label" for="exampleCheck1">Is Published</label>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3 form-check">--}}
{{--                            <input type="checkbox" name="is_new" class="form-check-input" id="exampleCheck1">--}}
{{--                            <label class="form-check-label" for="exampleCheck1">Is New</label>--}}
{{--                        </div>--}}
{{--                        <div class="mb-3">--}}
{{--                            <input type="number" name="sort_order"  min="1" value="10">--}}
{{--                            <label class="form-check-label">Sort Order</label>--}}
{{--                        </div>--}}
{{--                        <button type="submit" class="btn btn-sm btn-primary">Submit</button>--}}
{{--                    </form>--}}
{{--                </div>--}}

                    <form action="{{route('admin.users.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputPassword1">Name</label>
                                <input type="text" name="name" class="form-control" id="name" placeholder="name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
            <!-- /.row (Main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
