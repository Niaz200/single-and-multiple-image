@extends('backend.layouts.master')

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Single Image Upload to Public Folder</h4>



                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <div class="row align-items-center g-3">
                                    <div class="col-lg-4">
                                        <div>
                                            <form action="{{ route('admin.pub-single-upload')}}" enctype="multipart/form-data" method="POST">

                                                @csrf

                                                <label for="formFile" class="form-label">Default File Input Example</label>
                                                <input class="form-control" type="file" name="image" id="formFile">

                                                @error('image')
                                                    <p class="text-danger">{{ $message }}</p>
                                                @enderror
                                                
                                                <button class="btn btn-primary mt-3">Upload</button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>

                      
                    
                        </div><!-- end card body -->

                </div>
            </div>
            
        </div>
        <!-- end page title -->




    </div>
    <!-- container-fluid -->
</div>
<!-- End Page-content -->



@endsection