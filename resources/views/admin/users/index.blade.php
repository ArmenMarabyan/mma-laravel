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

	<a href="{{route('admin.users.create')}}" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i> Создать пользователя</a>

	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка пользователя</th>
		      <th scope="col">Имя</th>
		      <th scope="col">Имя</th>
		      <th scope="col">Имя</th>
		      <th scope="col">Имя</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	@foreach($users as $user)

				<tr class="text-center align-middle">
					<th scope="row">{{$user->id}}</th>
				    <td>
				    	<div class="admin__item-image">
				    		@if(file_exists(public_path().'/assets/images/users/user_' .$user->id.'.jpg'))
								<img src="{{asset('assets/images/users/user_'.$user->id.'.jpg')}}">
								@else
								<img src="{{asset('assets/images/users/no_image.jpeg')}}" alt="">
							@endif
				    	</div>
				    </td>
				    <td >
				    	<p>{{$user->name}}</p>
				    </td>
				    <td >
				    	<p>{{$user->email}}</p>
				    </td>
				    <td >
				    	<p>{{$user->created_at}}</p>
				    </td>
				    <td >
				    	<p>{{$user->updated_at}}</p>
				    </td>

				    <td class="text-right">

					    <form action="{{route('admin.users.destroy', $user)}}" onsubmit="if(confirm('Удалить продукт?')){return true}else{return false}" method="post">
					    	<input type="hidden" name="_method" value="DELETE">
					    	{{csrf_field()}}
							<a href="{{route('admin.users.edit', $user)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
					    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
					    </form>
				    </td>
				</tr>
	    	@endforeach
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			@if(count($users) == 1)
	  				<div class="col-lg-12">
						<h3 class="alert alert-light" style="text-align: center;">Данные отсутсвуют</h3>
					</div>
	  			@endif
	  		</td>
	  	</tr>
	  </tfoot>
	</table>

	<div class="float-right">
		{{$users->links()}}
	</div>
	
@endsection