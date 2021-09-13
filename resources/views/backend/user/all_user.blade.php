@extends('admin.admin_master')
@section('admin')


<!-- Content Wrapper. Contains page content -->

<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">
        <div class="row">



            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Total User <span class="badge badge-pill badge-danger"> {{ count($users) }} </span> </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Image </th>
                                        <th>Name </th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Permission</th>
                                        <th>Status</th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td><img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/no_image.png') }}" style="width: 50px; height: 50px;"> </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role->name ?? 'Anonymous' }}</td>
                                        <td>
                                            <ul>
                                                @foreach ($user->role->permissions ?? [] as $permission)
                                                    <li>
                                                        {{$permission->name}}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </td>

                                        <td>
                                            @if($user->UserOnline())
                                            <span class="badge badge-pill badge-success">Active Now</span>
                                            @else
                                            <span class="badge badge-pill badge-danger">{{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="{{ route('admin.edit.role.user', ['user_id' => $user->id, 'role_id' => $user->role->id]) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('admin.delete.user', $user->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
                                                <i class="fa fa-trash"></i></a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->


            </div>
            <!-- /.end col-12 -->







        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection