@extends('layout.header')
@section('content')
    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->

    <!-- Content Wrapper. Contains page content -->
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
                                <h4>Edit Employee</h4>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('employee.update', $empData->id) }}" method="post"
                            enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Name</label>
                                        <input type="text" name="emp_name" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter name Here" value="{{ $empData->name }}">
                                        @if ($errors->has('emp_name'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('emp_name') }}
                                            </div>
                                        @endif
                                    </div>
                                   
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Address</label>
                                        <textarea type="text" name="address" class="form-control" id="summernote" placeholder="Enter description Here">{{$empData->address}}</textarea>
                                        @if ($errors->has('address'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('address') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                    <label for="dob">Date of Birth</label>
                                    <input type="date" name="dob" class="form-control" id="dob" placeholder="Select Date of Birth" value="{{$empData->dob}}">
                                    @if ($errors->has('dob'))
                                        <div class="text-danger small mt-1">
                                            {{ $errors->first('dob') }}
                                        </div>
                                    @endif
                                   </div>
                                   <div class="form-group">
                                        <label for="exampleInputEmail1">Skill</label>
                                        <input type="text" name="skill" value="{{$empData->skill}}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter skill Here">
                                        @if ($errors->has('skill'))
                                            <div class="text-danger small mt-1">
                                                {{ $errors->first('skill') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Employee Image</label>
                                        <!-- <small><span>(Please upload image height:189px & width:1351px)</span></small> -->

                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-upload image" id="image"
                                                    name="emp_image">
                                                 <!-- <input type="hidden" name="img" class="imageData"> -->
                                            </div>
                                        </div>
                                    </div>
                                    @if (!empty($empData) && !empty($empData->image))
                                        <div class="img-cat">
                                            <img src="{{ url('upload/emp_image/' . $empData->image) }}"
                                                class="me-75 bg-light-danger" alt="images" height="100"
                                                width="100" />
                                        </div>
                                    @endif
                                </div>
                                <input type="hidden" name="type" value="edit">
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