<header>
	@if($mainArticle)
	<div class="header" style='background: url({{asset("assets/images/articles/article_".$mainArticle->id.".jpg")}}) no-repeat; background-size: cover'>
		<div class="header__top d-flex">
			<div class="header__top-nav">
				<ul class="d-flex">
					<li><a href="/">Новости</a></li>
					<li><a href="/fighters/">Список бойцов</a></li>
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
		<a href="{{route('article', ['alias' => $mainArticle->alias])}}">
			<div class="header__slider">
				<div class="header__slider-info">
					<div class="article__info">
						<span class="source" style="color: #fff;">{{$mainArticle->source}}</span>
						<span class="date" style="color: #fff;">{{$mainArticle->created_at}}</span>
					</div>
					<div class="header__slider-title">
						<h2>{{$mainArticle->name}}</h2>
					</div>
				</div>
			</div>
		</a>
	</div>
	@else
	<div class="header article__header">
		<div class="header__top d-flex">
			<div class="header__top-nav d-flex">

				<ul class="d-flex">
					<li><a href="">Новости</a></li>
					<li><a href="">Список бойцов</a></li>
				</ul>
			</div>
			<div class="header__top-search">
				<form action="/search" class="header__search" method="post" role="search">

					<input type="text" class="header__search-input" name="search">
					<button type="submit" class="header__search-btn" ><i class="fas fa-search"></i></button>
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
	</div>
	@endif
</header>