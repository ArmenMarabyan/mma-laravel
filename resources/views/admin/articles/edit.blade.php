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

	<form class="form-horizontal" action="{{route('admin.articles.update',$article)}}" method="post" enctype="multipart/form-data">
		<input type="hidden" name="_method" value="put">
		{{csrf_field()}}

		<div class="row">
			<div class="col-lg-12">
				<div class="form-group">
					<label for="">Название статьи</label>
					<input type="text" class="form-control" name="name" placeholder="Заголовок продукта" value=" {{ $article->name }}">
				</div>

				<div class="form-group">
					<label for="description">Короткое описание статьи</label>
					<textarea class="form-control" id="description" name="short_description">{{$article->short_description}}</textarea>
				</div>

				<div class="form-group">
					<label for="description">Полное описание статьи</label>
					<textarea class="form-control" id="description" name="description">{{$article->description}}</textarea>
				</div>
				

				<div class="form-group">
					<label for="">Тип статьи</label>
					<select name="main_article" class="form-control" id="">
						<option value="0">Простая статья</option>
						<option value="1">Статья для слайдера</option>

					</select>
				</div>

				<div class="form-group">
						<label for="">source</label>
						<input type="text" class="form-control" name="source" placeholder="source" value="{{ $article->source }}">
				</div>

				<div class="row">

					<div class="form-group col-lg-3">
						<label for="">Мета заголовок</label>
						<input type="text" class="form-control" name="meta_title" placeholder="Мета заголовок" value="{{ $article->meta_title }}">
					</div>

					<div class="form-group col-lg-3">
						<label for="">Мета описание</label>
						<input type="text" class="form-control" name="meta_description" placeholder="Мета описание" value="{{ $article->meta_description}}">
					</div>

					<div class="form-group col-lg-5">
						<label for="">Ключевые слова</label>
						<input type="text" class="form-control" name="meta_keyword" placeholder="Ключевые слова" value="{{ $article->meta_keyword }}">
					</div>
				</div>

				<div class="form-group">
					<label for="">Alias</label>
				  	<input type="text" readonly="" class="form-control" name="alias" placeholder="Автоматическая генерация" value="{{ $article->alias}}">
				</div>

				<div class="form-group">
					<label for="">Картинки</label>
					<input type="file" name="image" id= "file" class="filestyle image" data-buttonText="asdasd" data-classButton="btn btn-primary">
				</div>

			</div>

		</div>

		<div id="list">
			<div id="uploaded_img">
			@if(file_exists(public_path().'/assets/images/articles/article_' .$article->id.'.jpg'))
				
				<img src="{{asset('assets/images/articles/article_'.$article->id.'.jpg')}}" data-id="{{$article->id}}" id = "image_upload_preview">
				
				@else
				<img id="image_upload_preview" src="http://placehold.it/800x500" alt="" >
			@endif
			</div>
		</div>
		<input type="submit" class="btn btn-primary" value="Сохранить">
	</form>


	<div id = "div" class="d-flex"></div>

	<script>
		function readURL(input) {
	        if (input.files && input.files[0]) {
	            var reader = new FileReader();

	            reader.onload = function (e) {

	                $('#image_upload_preview').attr('src', e.target.result);
	            }

	            reader.readAsDataURL(input.files[0]);
	        }
	    }
	    $("#file").change(function () {
	        readURL(this);
	    });
	</script>

	
@endsection