@extends("layouts.site")
@section("title", 'feedback')


@section("content")
<div class="row">
	<div class="col-lg-12 col-xs-12 content__main" >
		<div class="header article__header">
			@include('site.mini_header')
		</div>
		<div class="row">
			<div class="col-lg-8 mx-auto" style="margin-bottom: 50px;">
				<div class="content__main-wrapper">
					<div class="feedback qBlock">
						<!-- errors -->
						@if(count($errors) > 0)
							<div class="alert alert-danger">
								<ul>
									@foreach($errors->all() as $error)
										<li>{{$error}}</li>
									@endforeach
								</ul>
							</div>
						@endif
						<!-- success -->
						@if(Session::has('message'))
							<div class="alert alert-success">
								{{Session::get('message')}}
							</div>
						@endif
						
						<form action="" method="post">
							{{ csrf_field() }}
							<div class="feedback__form">
								
								<div class="form-group row">
									<label for="inp_email" class="col-sm-2 col-lg-4 col-form-label">Email</label>
									<div class="col-sm-10 col-lg-8">
										<input type="text" class="form-control" name="email" id="inp_email" placeholder="email" value="{{old('email')}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="inp_name" class="col-sm-2 col-lg-4 col-form-label">Имя</label>
									<div class="col-sm-10 col-lg-8">
										<input type="text" class="form-control" name="name" id="inp_name" placeholder="Имя" value="{{old('name')}}">
									</div>
								</div>
								<div class="form-group row">
									<label for="txt_comm" class="col-sm-2 col-lg-4 col-form-label"> Сообщение </label>
									<div class="col-sm-10 col-lg-8">
										<textarea class="form-control" placeholder="Вы можете уведомить нас, если нашли  баг или отправить нам свои советы и жалобы написав здесь" name="message" id="txt_comm" rows="3">{{old('message')}}</textarea>
									</div>
								</div>

								<div class="feedback__btn">
									<input type="submit" name="submit" class="btn btn-primary" role="button" value="Отправить">
								</div>

							</div>
						</form>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection

@section("footer")
@include("site.footer")
@endsection








