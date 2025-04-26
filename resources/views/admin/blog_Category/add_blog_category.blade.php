
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
            <form method="post" action="{{route('store.category')}}">
                @csrf
                
                <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Blog Category Name</label> <br> <br> 
                <div class="col-sm-10">
                    <input class="form-control" type="text"  id="example-text-input" name='blog_category_name' value="">
                    @error('blog_category_name')
                    <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                 </div>

           
            
            </div>
<!-- end row -->
    <div class="row mb-3">
<div class="col-sm-10 offset-sm-1"> 
    <input type="submit" class="btn btn-primary" value="Insert Blog Category">
</div>
</div>
</form>
        </div>
    </div>
</div> <!-- end col -->
</div>
</div>
</div>




@endsection