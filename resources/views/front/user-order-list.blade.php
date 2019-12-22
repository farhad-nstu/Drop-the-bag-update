@extends('front.master')

@section('title', '| Drop The Bag')

@section('header-css')

@endsection

@section('body')
        <div class="container">
    		<div class="row">
    			<div class="col-md-12">
    				<h1 style="padding-top: 20px; text-align: center;">Order List</h1>
    				<hr>
    				<div class="table-responsive">
    					<table>
    						<thead>
    							<th>#</th>
    							<th>Bag</th>
    							<th>Price</th>
    							<th>Action</th>
    						</thead>
    						<tbody>
    							@php $i=1 @endphp
    							@foreach($allOrder as $order)
    							<tr>
    								<td>{{ $i++ }}</td>
    								<td>{{ $order->bag }}</td>
    								<td>{{ $order->price }}</td>
    								<td>
    									<a href="{{ route('orderReview', $order->id) }}" style="color: green; font-size: 14px;" role="button"><b>Review</b></a>
    								</td>
    							</tr>
    							@endforeach
    							
    						</tbody>
    					</table>
    				</div>
    	        </div>
    	    </div> 
        </div>
@endsection 
