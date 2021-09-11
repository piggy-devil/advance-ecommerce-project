@extends('admin.admin_master')
@section('admin')

<div class="container-full">
    <!-- Content Header (Page header) -->
    

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">รายการประเภทพระเครื่อง <span class="badge badge-pill badge-danger"> {{ count($amulettypes) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ชื่อประเภท</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($amulettypes as $item)
                                        <tr>
                                            <td>{{ $item->amulettype_name }}</td>
                                            <td>
                                                <a href="{{ route('amulettype.edit', $item->id) }}" class="btn btn-info" title="แก้ไข ข้อมูล"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('amulettype.delete', $item->id) }}" class="btn btn-danger" id="delete" title="ลบ ข้อมูล"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>
            <!-- /.col -->

            <!-- Add Amulet Type Page -->
            <div class="col-4">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">เพิ่มประเภทพระเครื่อง</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('amulettype.store') }}">
                                @csrf
                                    <div class="form-group">
                                        <h5 class="pt-5">ชื่อประเภทพระเครื่อง <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="amulettype_name" class="form-control">
                                            @error('amulettype_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-primary mb-5" value="ใหม่">
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