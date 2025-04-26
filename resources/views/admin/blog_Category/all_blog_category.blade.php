@extends('admin.admin_master') 
@section('admin') 

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Data Tables</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                            <li class="breadcrumb-item active">Data Tables</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->
        
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">About Blog Pages</h4>
                

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                        <thead> 
                            <tr>
                                <th>Serial Number</th>
                                <th> Blog Category Name</th>
                                <th>Action</th>
                            </tr>
                            </thead>

                            
                            <tbody> 
                            @php($i=1) 
                            @foreach($category as $item) 
                            
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$item->blog_category_name}}</td>
                                <td> <a href ="" class="btn btn-info sm" title="Edit">  <i class="ri-edit-box-line"></i> </a>
                                <a href ="" class="btn btn-danger sm" title="Delete">  <i class="ri-delete-bin-5-line"></i> </a> </td>
                            </tr>
                            @endforeach
                            </tbody>


                            
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        
                       
                        
                    </div> <!-- container-fluid -->
                </div>
@endsection