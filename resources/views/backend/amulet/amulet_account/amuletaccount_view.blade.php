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
                        <h3 class="box-title">รายการพระเครื่องในบัญชี <span class="badge badge-pill badge-danger"> {{ count($amuletaccounts) }} </span></h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>รูปภาพ </th>
                                        <th>ชื่อเกจิ/รุ่น</th>
                                        <th>ค่าเช่า </th>
                                        <th>จำนวน </th>
                                        <th>Status </th>
                                        <th>Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($amuletaccounts as $item)
                                    <tr>
                                        <td> <img src="" style="width: 60px; height: 50px;"> </td>
                                        <td>{{ $item->namemodel }} {{ $item->namepra }}</td>
                                        <td>{{ $item->amuletrental }} $</td>
                                        <td>{{ $item->quantity }} Pic</td>
                                        <td>


                                        </td>
                                        <td width="30%">
                                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-primary" title="Product Details Data"><i class="fa fa-eye"></i> </a>
                                            <a href="{{ route('product.edit',$item->id) }}" class="btn btn-info" title="Edit Data"><i class="fa fa-pencil"></i> </a>
                                            <a href="{{ route('product.delete',$item->id) }}" class="btn btn-danger" title="Delete Data" id="delete">
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>




@endsection