<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head> 



@extends('admin.admin_master') 
@section('admin') 

<div class="page-content">
<div class="container-fluid">
<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{route('profile.store')}} "enctype="multipart/form-data">
                @csrf
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='name' value="{{$admindata->name}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">User Name</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='username' value="{{$admindata->username}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input class="form-control" type="email"  id="example-text-input" name='email' value="{{$admindata->email}}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                
                <div class="col-sm-10">
                    <input class="form-control" type="file"  id="image" name="profile_image">
                </div>
            </div>
            <div>
                <label for="example-text-input" class="col-sm-2 col-form-label"></label>
                <img id="showImage" class="rounded avatar-lg"  alt="Card image cap">
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