<div class="header__top d-flex">
	<div class="header__top-nav d-flex">
		<a href="/">
			<h1>MMA</h1>
		</a>
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