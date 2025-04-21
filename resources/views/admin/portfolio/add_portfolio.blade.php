
@extends('admin.admin_master') 
@section('admin') 

<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head> 
<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('store.portfolio')}}" enctype="multipart/form-data">
                @csrf
                
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='portfolio_name' value="">
                    @error('portfolio_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='portfolio_title' value="">
                    @error('portfolio_title')
                    <span class="text-danger">{{$message}}</span>   
                    @enderror
                </div>
            </div>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Description</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='portfolio_description' value="">

                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Portfolio Image</label>
                <div class="col-sm-10">
                    <input class="form-control" type="file"  id="image" name="portfolio_image">
                    @error('portfolio_image')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div>
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <img id="showImage" class="rounded avatar-lg" 
                src="{{url('upload/no_image.jpg')}}" alt="Card image cap">
            </div>
           
            </div>
<!-- end row -->
    <div class="row mb-3">
<div class="col-sm-10 offset-sm-2">
    <input type="submit" class="btn btn-primary" value="Insert Portfolio Image">
</div>
</div>
</form>
        </div>
    </div>
</div> <!-- end col -->
</div>
</div>
</div>


<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
           var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });

    })
   </script>




@endsection