@extends('admin.layouts.admin')

@section('admin_content')

	<div class="row">
		<div class="col-lg-4">
			<div class="jumbotron">
				<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Бойцы: {{$fightersCount}}</span></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="jumbotron">
				<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Новости: {{$articlesCount}}</span></p>
			</div>
		</div>
		<div class="col-lg-4">
			<div class="jumbotron">
				<p style="text-align: center; font-size: 20px;"><span class="badge badge-primary">Пользователи: {{$usersCount}}</span></p>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-4">
			<a href="{{route('admin.fighters.index')}}" class="btn btn-secondary btn-lg btn-block">Добавить бойца</a>
			@forelse($fighters as $fighter)
				<a href="" class="list-group-item list-group-item-action list-group-item-light">{{$fighter->name}}</a>
				@empty
			@endforelse
		</div>
		<div class="col-lg-4">
			<a href="" class="btn btn-secondary btn-lg btn-block">Добавить статью</a>
			@forelse($articles as $article)
				<a href="{{route('admin.articles.index')}}" class="list-group-item list-group-item-action list-group-item-light">{{$article->name}}</a>
				@empty
			@endforelse
		</div>
		<div class="col-lg-4">
			<a href="" class="btn btn-secondary btn-lg btn-block">Добавить пользователя</a>
			@forelse($users as $user)
				<a href="{{route('admin.users.index')}}" class="list-group-item list-group-item-action list-group-item-light">{{$user->name}}</a>
				@empty
			@endforelse
		</div>
		

	</div>
	
@endsection