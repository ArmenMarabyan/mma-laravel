@extends("layouts.site")
@section("title", 'Результаты - '.$query)


@section("content")
	<div class="container">
		<div class="row">
			<!-- sidebar -->
			@include('site.left_sidebar')
			<!-- end sidebar -->
			
			<div class="col-lg-9 col-xs-12 content__main" >
				<header>

					<div class="header article__header">
						<div class="header__top d-flex">
							<div class="header__top-nav d-flex">

								<ul class="d-flex">
									<li><a href="/">Новости</a></li>
									<li><a href="{{route('fighters')}}">Список бойцов</a></li>
									<li><a href="{{route('feedback')}}">Обратная связь</a></li>
								</ul>
							</div>
							<div class="header__top-search">
								<form action="/search" class="header__search" method="post" role="search">
									{{csrf_field()}}
									<input type="text" class="header__search-input" id="search" placeholder="Поиск.." name="search">
									<button type="submit" class="header__search-btn" ><i class="fas fa-search"></i></button>
									<div class="search__resultsBlock"></div>
								</form>
								
							</div>
							<div class="header__top-user">
								<a href="javascript:void(0);" class="user__icon"><i class="fas fa-user"></i></a>


								@auth
					                <div class="user__signIn">
										@if(file_exists(public_path().'/assets/images/users/user_' .Auth::user()->id.'.jpg'))
					                        <img src="{{asset('assets/images/users/user_'.Auth::user()->id.'.jpg')}}">
					                        @else
					                        <img src="{{asset('assets/images/users/no_image.jpeg')}}">
					                    @endif
										<h3>{{Auth::user()->name}}</h3>
										<a href="{{route('cabinet')}}">В кабинет</a>
										<form id="logout-form" action="{{ route('logout') }}" method="POST">
				                            @csrf
				                            <button type="submit">Выйти</button>
				                        </form>
									</div>
					            @else
					                <div class="user__signIn">
										<h3>Авторизация</h3>
										<a href="/login">Войти</a>
										<a href="/register">Регистрация</a>
									</div>
					            @endauth
							</div>
						</div>
				</header>
					<div class="row">

						<div class="col-lg-9">
							<div class="content__main-wrapper">
								@foreach($results as $result)
								
									<article class="article">
										<div class="article__info">
											<span class="source">{{$result->source}}</span>
											<span class="date">{{$result->created_at}}</span>
										</div>
										<a href="{{route('article', ['alias' => $result->alias])}}" class="article__title">
											@php
												echo str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>', $result->name);
											@endphp	
										</a>
										<div class="article__desc">
											@php
												echo str_replace($query, '<strong style="background-color: #FFFF00;">'.$query.'</strong>', $result->short_description);
											@endphp	
										</div>
										
										<div class="article__image">
											<a href="{{route('article', ['alias' => $result->alias])}}">
												<img src="{{asset('assets/images/articles/3C2XEMp5.jpg')}}" alt="">
											</a>
										</div>
										<div class="article__footer">
											<div class="article__footer-like">
												<a href="#" class="like__down likes" data-dislike='-1' data-id='{{$result->id}}'><i class="fas fa-arrow-down"></i><small class="dislike"></small></a>
											</div>
											<span class='likes__count'>
												@if($result->likes != 0)
													{{$result->likes}}
												@else
													<b style="color: #999;">—</b>
												@endif
											</span>
											<div class="article__footer-like">
												<a href="#" class="like__up likes" data-id='{{$result->id}}' data-like='1'><i class="fas fa-arrow-up"></i> <small class="like">Нравится: </small></a>
											</div>
											<div class="article__footer-info" style="float: right;">
												<span class="info__item">
													<i class="fas fa-comments"></i>{{count($result->comments)}}
												</span>
												<span class="info__item">
													<i class="fas fa-eye"></i>{{ $result->views}}
												</span>
											</div>
										</div>

									</article>
								@endforeach
								
								{{$results->links()}}
							</div>
						</div>
						@include('site.right_sidebar', [
							'articles' => $topArticles,
							'title' => 'Топ статей'
						])
					</div>
			</div>
		</div>
	</div>

@endsection

@section("footer")
	@include("site.footer")
@endsection