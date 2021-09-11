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
                        <h3 class="box-title">แก้ไข ประเภทพระเครื่อง</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <form method="post" action="{{ route('amulettype.update',$amulettype->id) }}">
                                @csrf

                                    <div class="form-group">
                                        <h5>ชื่อประเภทพระเครื่อง <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="amulettype_name" class="form-control" value="{{ $amulettype->amulettype_name }}">
                                            @error('amulettype_name')
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