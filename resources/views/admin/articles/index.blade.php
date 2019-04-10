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

	<a href="{{route('admin.articles.create')}}" class="btn btn-primary float-right" style="margin-bottom: 20px;"><i class="fa fa-plus square-o"></i> Создать новость</a>

	

		<table class="table table-bordered" >
		  <thead>
		    <tr class="text-center">
		      <th scope="col">id</th>
		      <th scope="col">Картинка статьи</th>
		      <th scope="col">Название</th>
		      <th scope="col">Краткое описание</th>
		      <th scope="col">Полное описание</th>
		      <th scope="col">Тип статьи</th>
		      <th scope="col" class="text-right">Действие</th>
		    </tr>
		  </thead>
			<tbody>
	    
	    	@foreach($articles as $article)

				<tr class="text-center align-middle">
					<th scope="row">{{$article->id}}</th>
				    <td>
				    	<div class="admin__item-image">
				    		<img src="{{asset('assets/images/articles/article_'.$article->id.'.jpg')}}" alt="">
				    	</div>
				    </td>
				    <td >
				    	<a href="{{route('article', $article->alias)}}">{{$article->name}}</a>
				    </td>
				    <td>
						<div class="admin__item-short-desc">
				    		<span>{!!str_limit($article->short_description,100)!!}...</span>
				    	</div>
				    </td>
				    <td>
						<div class="admin__item-desc">
				    		<span>{!!$article->description!!}...</span>
				    	</div>
				    </td>
				    <td>
						<div class="admin__item-available">
				    		<span>
				    			@if($article->main_article)
				    				Главная статья
				    			@endif
				    		</span>
				    	</div>
				    </td>

				    <td class="text-right">

					    <form action="{{route('admin.articles.destroy', $article)}}" onsubmit="if(confirm('Удалить продукт?')){return true}else{return false}" method="post">
					    	<input type="hidden" name="_method" value="DELETE">
					    	{{csrf_field()}}
							<a href="{{route('admin.articles.edit', $article)}}" class="btn btn-default"><i class="fa fa-edit"></i></a>
					    	<button type="submit" class="btn"><i class="fas fa-trash-alt"></i></i></button>
					    </form>
				    </td>
				</tr>
	    	@endforeach
	  </tbody>
	  <tfoot>
	  	<tr>
	  		<td>
	  			@if(count($articles) == 0)
	  				<div class="col-lg-12">
						<h3 class="alert alert-light" style="text-align: center;">Данные отсутсвуют</h3>
					</div>
	  			@endif
	  		</td>
	  	</tr>
	  </tfoot>
	</table>

	<div class="float-right">
		{{$articles->links()}}
	</div>
	
@endsection