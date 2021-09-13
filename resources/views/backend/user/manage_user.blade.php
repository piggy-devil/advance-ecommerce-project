@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- Add Brand Page -->
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">สิทธิผู้ใช้งาน</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('admin.update.role.user', $user->id) }}" enctype="multipart/form-data">
                                @csrf

                                    <div class="form-group">
                                        <h5 class="mt-2">ชื่อผู้ใช้งาน </h5>
                                        <div class="controls">
                                            <input type="text" name="name" class="form-control" value="{{ $user->name }}" disabled>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5 class="mt-2">อีเมลผู้ใช้งาน </h5>
                                        <div class="controls">
                                            <input type="text" name="email" class="form-control" value="{{ $user->email }}" disabled>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5>สิทธิผู้ใช้งาน <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <select name="role_id" id="role_id" class="form-control">
                                                <option value="" disabled>-- Select Role --</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{ $role->id }}" {{ $user->role_id == $role->id ? 'selected':''}}>{{ $role->name }}</option>
                                                @endforeach
                                                </select>
                                            @error('role_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="แก้ไข">
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

@endsection