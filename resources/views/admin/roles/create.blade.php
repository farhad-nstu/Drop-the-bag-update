@extends('admin.master')

@section('title', '| Drop The Bag')

@section('body')
    <div class="form-group">
    	<form action="{{ route('roles.store') }}" method="post">
    		@csrf
    		<div class="form-group">
    			<label>Name</label>
    			<input type="text" name="name" class="form-control">
    		</div>
    		<input type="hidden" name="guard_name" class="form-control">
    		<button type="submit" name="submit" class="btn btn-success" value="submit">Create</button>
    	</form>
    </div>
@endsection