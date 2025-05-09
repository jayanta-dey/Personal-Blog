
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
            <form method="post" action="{{route('update.slider')}} "enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{$homeslide->id}}">
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='title' value="{{$homeslide->title}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='short_title' value="{{$homeslide->short_title}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Video URL</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='url' value="{{$homeslide->url}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Home Page Image</label>
                
                <div class="col-sm-10">
                    <input class="form-control" type="file"  id="image" name="home_slide">
                </div>
            </div>
            <div>
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <img id="showImage" class="rounded avatar-lg" 
                src= "{{(!empty($homeslide->home_slide))? url('upload/home_slide_image/'.$homeslide->home_slide):url('upload/no_image.jpg')}}" 
                alt="Card image cap">
            </div>
           
            </div>
<!-- end row -->
    <div class="row mb-3">
<div class="col-sm-10 offset-sm-2">
    <input type="submit" class="btn btn-primary" value="Update Profile">
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