@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<div class="container-full">
    <!-- Content Header (Page header) -->


    <!-- Main content -->
    <section class="content">

        <!-- Basic Forms -->
        <div class="box">
            <div class="box-header with-border">
                <h4 class="box-title">เพิ่มรายการพระเครื่องในบัญชี </h4>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col">

                        <form method="post" action="{{ route('amulet-account-store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-12">


                                    <div class="row">
                                        <!-- start 1st row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>ประเภทพระเครื่อง <span class="text-danger">*</span></h5>
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
                                                <h5>เนื้อ/วัสดุ <span class="text-danger">*</span></h5>
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
                                                <h5>ปีที่สร้าง <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                <?php $years = range(strftime("%Y", time()), 1900); ?>
                                                    <select name="year" class="form-control">
                                                        <option value="" selected="" disabled="">ปีที่สร้าง</option>
                                                        @foreach($years as $year)
                                                        <option value="{{ $year + 543 }}">{{ $year + 543 }}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('year')
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
                                                <h5>ชื่อรุ่น <span class="text-danger">*</span></h5>
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

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 2nd row  -->


                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>วันที่เช่า <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="rentaldate" class="form-control" value="{{ Carbon\Carbon::now()->format('d-m-Y') }}">
                                                    @error('rentaldate')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h5>เวลาที่เช่า <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="time" name="rentaltime" class="form-control" value="{{ Carbon\Carbon::now() }}">
                                                    @error('rentaltime')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <h5>จำนวน <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="number" name="quantity" class="form-control" min="1" value="1">
                                                    @error('quantity')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h5>สถานที่เช่า <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="placefrom" class="form-control">
                                                    @error('placefrom')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <!-- start 3RD row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>เช่าจากคุณ <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="rentfrom" class="form-control">
                                                    @error('rentfrom')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <h5 class="mt-2">ค่าเช่าพระ <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="amuletrental" class="form-control">
                                                    @error('amuletrental')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <h5 class="mt-2">ค่าส่ง(ถ้ามี) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="shippingfee" class="form-control">
                                                    @error('shippingfee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <h5 class="mt-2">ค่าเลี่ยม(ถ้ามี) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="framefee" class="form-control">
                                                    @error('framefee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <h5 class="mt-2">ค่าออกบัตรรับประกัน(ถ้ามี) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="warrantyfee" class="form-control">
                                                    @error('warrantyfee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <h5 class="mt-2">ค่าใช้จ่ายอื่นๆ(ถ้ามี) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="otherfee" class="form-control">
                                                    @error('otherfee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-8">

                                            <div class="form-group">
                                                <h5>หมายเหตุการเช่า(ถ้ามี) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea id="editor1" name="note" rows="3" cols="80"></textarea>
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 3RD row  -->

                                    <div class="row">
                                        <!-- start 6th row  -->
                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>รวมราคาต้นทุน (ซื้อ) <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="totalfee" class="form-control">
                                                    @error('totalfee')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                        </div> <!-- end col md 4 -->

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <h5>Main Thambnail <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="pic_thambnail" class="form-control" onChange="mainThamUrl(this)">
                                                    @error('pic_thambnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img src="" id="mainThmb">
                                                </div>
                                            </div>


                                        </div> <!-- end col md 4 -->


                                        <div class="col-md-4">

                                            <div class="form-group" id="preview_img">
                                                <h5>Multiple Image <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="file" name="multi_img[]" class="form-control" multiple="" id="multiImg">
                                                    @error('multi_img')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>


                                        </div> <!-- end col md 4 -->

                                    </div> <!-- end 6th row  -->

                                    <hr>

                                    <div class="row">

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_2" name="hot_deals" value="1">
                                                        <label for="checkbox_2">Hot Deals</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_3" name="featured" value="1">
                                                        <label for="checkbox_3">Featured</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">

                                                <div class="controls">
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_4" name="special_offer" value="1">
                                                        <label for="checkbox_4">Special Offer</label>
                                                    </fieldset>
                                                    <fieldset>
                                                        <input type="checkbox" id="checkbox_5" name="special_deals" value="1">
                                                        <label for="checkbox_5">Special Deals</label>
                                                    </fieldset>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Add Product">
                                    </div>
                        </form>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>

<script type="text/javascript">
    function getSubSubCat() {
        var subcategory_id = $(this).val();
        if (subcategory_id) {
            $.ajax({
                url: "{{  url('/category/sub-subcategory/ajax') }}/" + subcategory_id,
                type: "GET",
                dataType: "json",
                success: function(data) {
                    var d = $('select[name="subsubcategory_id"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="subsubcategory_id"]').append('<option value="' + value.id + '">' + value.subsubcategory_name_en + '</option>');
                    });
                },
            });
        } else {
            // alert('No Value');
        }
    }
    $(document).ready(function() {
        $('select[name="category_id"]').on('change', function() {
            var category_id = $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{  url('/category/subcategory/ajax') }}/" + category_id,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('select[name="subsubcategory_id"]').html('');
                        var d = $('select[name="subcategory_id"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.id + '">' + value.subcategory_name_en + '</option>');
                        });
                    },
                });
            } else {
                alert('No Value');
            }
        });
        $('select[name="subcategory_id"]').on('change', getSubSubCat);
        $('select[name="subcategory_id"]').on('click', getSubSubCat);

    });
</script>


<script type="text/javascript">
    function mainThamUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#mainThmb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


<script>
    $(document).ready(function() {
        $('#multiImg').on('change', function() { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function(index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function(file) { //trigger function on successful read
                            return function(e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                    .height(80); //create image element 
                                $('#preview_img').append(img); //append image to output element
                            };
                        })(file);
                        fRead.readAsDataURL(file); //URL representing the file's data.
                    }
                });

            } else {
                alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });
</script>




@endsection