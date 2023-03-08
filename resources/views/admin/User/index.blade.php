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
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin.users.create')}}" class="btn btn-outline-primary">Add New</a>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>EmailVerifiedAt</th>
                                    <th>PhoneNumber</th>
                                    <th>CreatedAt</th>
                                    <th>UpdatedAt</th>
                                    <th>DeletedAt</th>
                                    <th>Action</th>


                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.users.show',$user->id) }}">{{$user->id}}</a>
                                        </td>
                                        <td>
                                            <img src="{{ $user->image }}" class="w-50">
                                        </td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            <a href="mailto: {{ $user->email }} ">{{ $user->email }}</a>
                                        </td>
                                        @if($user->role === 'blocked')
                                            <td><span class="text-danger">BLOCKED</span><br>by: <a href="{{ route('admin.users.show', $auth_user->id) }}">{{ $auth_user->name }}</a></td>
                                        @else
                                        <td>
                                            {{ $user->role }}
                                        </td>
                                        @endif
                                        <td>
                                            {{ $user->email_verified_at }}
                                        </td>
                                        <td>
                                           <a href="tel: {{ $user->phone_number }}">{{ $user->phone_number }}</a>
                                        </td>
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            {{ $user->updated_at }}
                                        </td>

                                        @if($user->deleted_at !== NULL)
                                                <td>{{ $user->deleted_at }}</td>
                                                <td><a href="{{ route('admin.users.restore', $user->id) }}" type="submit" class="btn btn-sm btn-warning"><span class="text-light">Restore</span></a></td>
                                        @else
                                            <td></td>
                                            <td>
                                                <a href="{{ route('admin.users.show',$user->id) }}" type="submit" class="btn btn-sm btn-primary">More Detail</a>
                                                <a href="{{ route('admin.users.edit',$user->id) }}" type="submit" class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{ route('admin.users.destroy',$user->id ) }}" type="submit" class="btn btn-sm btn-danger">Delete</a>
                                            </td>

                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>


            </div>
            <!-- /.row (Main row) -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
