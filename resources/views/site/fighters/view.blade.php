@extends("layouts.site")
@section('title', 'ad')

@section("content")
	<div class="row">
		<div class="col-lg-12 col-xs-12 content__main" >
			<div class="header article__header">
				@include('site.mini_header')
			</div>
			<div class="content__main-wrapper">
				<div class="fighter">
					<div class="fighter__name">
						<h1>{{$fighter->name}}</h1>
					</div>
					<div class="row">
						<div class="col-lg-4">
							<div class="fighter__image">
								<img src="{{asset('assets/images/fighters/fighter_'.$fighter->id.'.jpg')}}" alt="">
							</div>
						</div>
						<div class="col-lg-4">
							<div class="fighter__info">
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
							</div>
						</div>
						<div class="col-lg-4">
							<div class="fighter__statistic">
								<h2>Статистика</h2>
							</div>
						</div>
						<div class="col-lg-12 fighter__biography">
							<h4>Общая информация</h4>
							<p>{{$fighter->description}}</p>
						</div>
					</div>
				</div>

				<div class="fighter__news">
					
					@if(count($fighterNewsList) > 0)
						<h2>Последние новости с {{$fighterName}}</h2>
						<div class="fighter__news">
							<div class="row">
								@foreach($fighterNewsList as $fighterNewsItem)
									
										
									<div class="col-lg-4" style="margin-bottom: 25px;">
										<a href="{{route('article', ['alias' => $fighterNewsItem->alias])}}">
											<div class="fighter__news-thumb">
												<img src="{{asset('assets/images/articles/3C2XEMp5.jpg')}}" alt="">
												<div class="thumb__info">
													<span>{{$fighterNewsItem->created_at}}</span>
													<p>{{$fighterNewsItem->name}}</p>
												</div>
											</div>
										</a>
									</div>	
								@endforeach
							</div>
						</div>
					@endif
				</div>
			</div>				
		</div>
	</div>

@endsection

@section("footer")
	@include("site.footer")
@endsection
