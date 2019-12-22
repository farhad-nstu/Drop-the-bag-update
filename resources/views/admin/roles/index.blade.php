@extends('admin.master')

@section('title', '| Drop The Bag')

@section('body')
    <!-- Begin Page Content -->
            <div class="container-fluid">

              <!-- Page Heading -->
              <h1 class="h3 mb-2 text-gray-800">Tables</h1>
              

              <!-- DataTales Example -->
              <div class="card shadow mb-4">
               
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Action</th>  
                        </tr>
                      </thead>
                      
                      <tbody>
                      	@foreach($roles as $role)
                        <tr>
                          <td>{{ $role->name }}</td>
                          <td><button class="btn btn-primary">Edit</button></td>
                        </tr>                       
                      </tbody>
                        @endforeach
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <!-- /.container-fluid -->
@endsection