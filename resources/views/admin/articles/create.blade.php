@extends('admin.layouts.admin')

@section('admin_content')

	@if (Session::has('success'))
	    <div class="alert alert-success" role="alert">
	            {!! Session::get('success.0') !!}
	    </div>
	@endif
	
	@if (count($errors) > 0)

	    <div class="alert alert-danger" role="alert">

	        @foreach($errors->all() as $error)
	        	<ul>
	        		<li>* {{$error}}</li>
	        	</ul>
	        @endforeach

	    </div>
	@endif

	<form class="form-horizontal" action="{{route('admin.articles.store')}}" method="post" enctype="multipart/form-data" >
		{{csrf_field()}}

		@include('admin.articles.partials.form')
	</form>

	
@endsection