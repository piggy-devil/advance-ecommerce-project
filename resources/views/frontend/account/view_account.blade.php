@extends('frontend.main_master')
@section('content')

<div class="body-content">
    <div class="container">
        <div class="row">
            @include('frontend.common.user_sidebar')
            <div class="col-md-10">

                <form method="post" action="{{ route('amulet-account-store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12">


                            <div class="row">
                                <!-- start 1st row  -->
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>ชื่อพระ(เกจิ) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="controls">
                                                <input type="text" name="namepra" class="form-control">
                                                @error('namepra')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>



                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>ประเภทพระเครื่อง </h5>
                                        <div class="controls">
                                            <select name="amulettype_id" class="form-control">
                                                <option value="" selected="" disabled="">เลือกประเภทพระเครื่อง</option>
                                                @foreach($amulettypes as $amulettype)
                                                <option value="{{ $amulettype->id }}">{{ $amulettype->amulettype_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('amulettype_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div> <!-- end col md 4 -->


                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>เช่าจากคุณ </h5>
                                        <div class="controls">
                                            <input type="text" name="rentfrom" class="form-control">
                                            @error('rentfrom')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                            </div> <!-- end 1st row  -->



                            <div class="row">
                                <!-- start 2nd row  -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>ชื่อรุ่น/พิมพ์ <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="namemodel" class="form-control">
                                            @error('namemodel')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5>เนื้อ/วัสดุ </h5>
                                        <div class="controls">
                                            <select name="amuletmaterial_id" class="form-control">
                                                <option value="" selected="" disabled="">เลือก (เนื้อ/วัสดุ)</option>
                                                @foreach($amuletmaterials as $amuletmaterial)
                                                <option value="{{ $amuletmaterial->id }}">{{ $amuletmaterial->amuletmaterial_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('amuletmaterial_id')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->


                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>สถานที่เช่า </h5>
                                        <div class="controls">
                                            <input type="text" name="placefrom" class="form-control">
                                            @error('placefrom')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                            </div> <!-- end 2nd row  -->


                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <h5>ชื่อวัด <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <div class="controls">
                                                <input type="text" name="tample" class="form-control">
                                                @error('tample')
                                                <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5>วันที่เช่า </h5>
                                        <div class="controls">
                                            <input type="date" name="rentaldate" class="form-control pl-3" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
                                            @error('rentaldate')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <h5>เวลาเช่า </h5>
                                        <div class="controls">
                                            <input type="time" name="rentaltime" class="form-control" value="{{ Carbon\Carbon::now() }}">
                                            @error('rentaltime')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <h5 class="mt-2">ค่าเช่าพระ <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="amuletrental" class="form-control">
                                            @error('amuletrental')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="form-group">
                                        <h5>จำนวน </h5>
                                        <div class="controls">
                                            <input type="number" name="quantity" class="form-control" min="1" value="1">
                                            @error('quantity')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <!-- start 3RD row  -->

                                <div class="col-md-8">

                                    <div class="form-group">
                                        <h5>รายละเอียดเพิ่มเติม(ถ้ามี) <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea id="editor1" name="note" rows="3" cols="80"></textarea>
                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->
                                
                                <div class="col-md-4">

                                    <div class="form-group">
                                        <h5 class="mt-2">ค่าส่ง(ถ้ามี) </h5>
                                        <div class="controls">
                                            <input type="text" name="shippingfee" class="form-control">
                                            @error('shippingfee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <h5 class="mt-2">ค่าเลี่ยม(ถ้ามี) </h5>
                                        <div class="controls">
                                            <input type="text" name="framefee" class="form-control">
                                            @error('framefee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <h5 class="mt-2">ค่าออกบัตรรับประกัน(ถ้ามี) </h5>
                                        <div class="controls">
                                            <input type="text" name="warrantyfee" class="form-control">
                                            @error('warrantyfee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <h5 class="mt-2">ค่าใช้จ่ายอื่นๆ(ถ้ามี) </h5>
                                        <div class="controls">
                                            <input type="text" name="otherfee" class="form-control">
                                            @error('otherfee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <h5>รวมราคาต้นทุน (ซื้อ) </h5>
                                        <div class="controls">
                                            <input type="text" name="totalfee" class="form-control">
                                            @error('totalfee')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <h5>รูปภาพ <span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                            @error('multi_img')
                                            <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        </div>
                                    </div>

                                </div> <!-- end col md 4 -->

                            </div> <!-- end 3RD row  -->

                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="เพิ่ม">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-8">

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
</div>
</div>

@endsection