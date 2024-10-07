@extends('layout.header')
@section('content')
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card">
                            <div class="card-header">
                                <h4>Add Employee</h4>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="emp_name" value="{{ old('emp_name') }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter Title Here">
                                        @if ($errors->has('emp_name'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('emp_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <textarea type="text" name="address" class="form-control" id="summernote" placeholder="Enter description Here">{{ old('address') }}</textarea>
                                        @if ($errors->has('address'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Select Date of Birth" value="{{ old('dob') }}">
                                    @if ($errors->has('dob'))
                                        <div class="text-danger small mt-1">
                                            {{ $errors->first('dob') }}
                                        </div>
                                    @endif
                                   </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Skill</label>
                                        <input type="text" name="skill" value="{{ old('skill') }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter skill Here">
                                        @if ($errors->has('skill'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('skill') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Employee Image</label>
                                        <!-- <small><span>(Please upload image height:389px & width:1351px)</span></small> -->
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" value="{{ old('emp_image') }}" class="custom-file-upload image"
                                                    id="emp_images" name= "emp_image" value="emp_image">
                                                    <input type="hidden" name="img" value="img" class="imageData">
                                            </div>
                                        </div>
                                        @if ($errors->has('emp_image'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('emp_image') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-warning">Submit</button>
                                    <a href="{{ url('employee') }}"><button type="button"
                                            class="btn button-outline">Back</button></a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            
        </section>
        <!-- /.content -->
    </div>

    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
@endsection
@push('script')
    
@endpush