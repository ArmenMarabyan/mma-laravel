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

	<a href="{{route('admin.fighters.create')}}" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i> Создать бойца</a>

	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка бойца</th>
		      <th scope="col">Имя</th>
		      <th scope="col">Информация</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	@foreach($fighters as $fighter)

				<tr class="text-center align-middle">
					<th scope="row">{{$fighter->id}}</th>
				    <td>
				    	<div class="admin__item-image">
				    		<img src="{{asset('assets/images/fighters/fighter_'.$fighter->id.'.jpg')}}" alt="">
				    	</div>
				    </td>
				    <td >
				    	<a href="{{route('fighters', $fighter->alias)}}">{{$fighter->name}}</a>
				    </td>
				    <td >
				    	<ul>
							<li><strong>Прозвище:</strong><?= $fighter->nickname ?></li>
							<li><strong>Гражданство:</strong><?= $fighter->nationality ?></li>
							<li><strong>Дата рождения:</strong><?= $fighter->bday ?></li>
							<li><strong>Рост:</strong><?= $fighter->height ?></li>
							<li><strong>Размах рук:</strong><?= $fighter->arm_span ?></li>
							<li><strong>Весовая категория:</strong><?= $fighter->w_category ?></li>
							<li><strong>Инстаграм:</strong><?= $fighter->insta ?></li>
							<li><strong>Твиттер:</strong><?= $fighter->tw ?></li>

						</ul>
				    </td>
				    
				    <td class="text-right">

					    <form action="{{route('admin.fighters.destroy', $fighter)}}" onsubmit="if(confirm('Удалить бойца?')){return true}else{return false}" method="post">
					    	<input type="hidden" name="_method" value="DELETE">
					    	{{csrf_field()}}
							<a href="{{route('admin.fighters.edit', $fighter)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
					    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
					    </form>
				    </td>
				</tr>
	    	@endforeach
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			@if(count($fighters) == 0)
	  				<div class="col-lg-12">
						<h3 class="alert alert-light" style="text-align: center;">Данные отсутсвуют</h3>
					</div>
	  			@endif
	  		</td>
	  	</tr>
	  </tfoot>
	</table>

	<div class="float-right">
		{{$fighters->links()}}
	</div>
	
@endsection