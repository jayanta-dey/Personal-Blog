<head>
</head> 



@extends('admin.admin_master') 
@section('admin') 

<div class="page-content">
<div class="container-fluid">
<div class="row">
   
<center>
<div class="col-6">
    <div class="card">
        <div class="card-body">
            <form method="post" >
                @csrf
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Current Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password"  id="example-text-input" name='currentpassword' >
                </div>
            </div>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password"  id="example-text-input" name='newpassword' >
                </div>
            </div>
            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm New Password</label>
                <div class="col-sm-10">
                    <input class="form-control" type="password"  id="example-text-input" name='confirmnewpassword' >
                </div>
            </div>
           
</div>

<!-- end row -->
    <div class="row mb-3">
<div class="col-sm-10 offset-sm-2">
    <input type="submit" class="btn btn-primary" value="Change Password">
</div>
</center>
</div>
</form>
        </div>
    </div>
</div> <!-- end col -->
</div>
</div>
</div>






@endsection