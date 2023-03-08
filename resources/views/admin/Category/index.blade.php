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
                    <p class="text-primary">Total Count : {{ $totalCountOfCategories }} </p>
                    <div class="card">
                        <div class="card-header">
                            <a href="{{route('admin.categories.create')}}" class="btn btn-outline-primary">Add New</a>
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
                                    <th>Icon</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>IsNew</th>
                                    <th>IsPublished</th>
                                    <th>SortOrder</th>
                                    <th>CreatedAt</th>
                                    <th>UpdatedAt</th>
{{--                                    @foreach($categories as $category)--}}
{{--                                    @if($category->deleted_at !== NULL)--}}
                                        <th>DeletedAt</th>
                                        <th>Action</th>
{{--                                    @else--}}

{{--                                    @endif--}}
{{--                                    @endforeach--}}

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            <a href="{{route('admin.categories.show',$category->id) }}">{{$category->id}}</a>
{{--                                            <a href="/admin/categories/{{ $category->id }}">{{$category->id}}</a>--}}
                                        </td>
                                        <td>
                                            <img src="{{ $category->icon }}" class="w-25">
                                        <td>
                                            <img src="{{ $category->image }}" class="w-25">
                                        <td>
                                            {{ $category->name }}
                                        <td>
                                            {{ $category->description }}
                                        <td>
                                            @if($category->is_new == 1)
                                                yes
                                            @else
                                                no
                                            @endif
                                        </td>
                                        <td>
                                            @if($category->is_published == 1)
                                                yes
                                            @else
                                                no
                                            @endif
                                        </td>
                                        <td>
                                            {{ $category->sort_order }}
                                        </td>
                                        <td>
                                            {{ $category->created_at }}
                                        </td>
                                        <td>
                                            {{ $category->updated_at }}
                                        </td>

                                        @if($category->deleted_at !== NULL)
                                                <td>{{ $category->deleted_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.categories.restore', $category->id) }}" type="submit" class="btn btn-sm btn-warning"><span class="text-light">Restore</span></a>
                                                    <a href="{{ route('admin.categories.force-destroy', $category->id) }}" type="submit" class="btn btn-sm btn-danger"><span class="text-light">Force Delete</span></a>
                                                </td>
                                        @else
                                            <td></td>
                                            <td>
                                                <a href="{{ route('admin.categories.show',$category->id) }}" type="submit" class="btn btn-sm btn-primary">More Detail</a>
                                                <a href="{{ route('admin.categories.edit',$category->id) }}" type="submit" class="btn btn-sm btn-success">Edit</a>
                                                <a href="{{ route('admin.categories.destroy',$category->id ) }}" type="submit" class="btn btn-sm btn-danger">Delete</a>
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
