@extends('admin.master')

@section('title', '| Drop The Bag')
@section('header-css')
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

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
                          <th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Role</th>
                          <th>Action</th>  
                        </tr>
                      </thead>
                      
                      <tbody>
                        @php $i=1; @endphp
                      	@foreach($users as $user)
                        <tr>
                          <td>{{ $i++ }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>

                          <td data-title="Status">                             
                            @if($user->status == 1)
                                <span class="tg-adstatus tg-adstatusactive">active</span>
                            @endif
                            
                            @if($user->status == 0)
                                <span class="tg-adstatus tg-adstatusdeleted">Deactive</span>
                            @endif                    
                        </td>
                        <td>admin</td>

                          <td>

                            <a href="{{ route('update.status', ['id' => $user->id]) }}">
                               @if($user->status == 0)
                                  <i class="fa fa-unlock"></i>
                              @endif
                              @if($user->status == 1)
                                  <i class="fa fa-lock"></i>
                              @endif
                            </a> 
                          </td>
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