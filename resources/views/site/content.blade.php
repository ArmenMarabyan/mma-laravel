	<div class="row">
		<!-- sidebar -->
		@include('site.left_sidebar')
		<!-- end sidebar -->
		<div class="col-lg-9 col-xs-12 content__main" >
			<!-- main header -->
			@include('site.main_header')
			<!-- end main header -->
			<div class="row">
				<div class="col-lg-9" style="margin-bottom: 50px;">
					<div class="content__main-wrapper">
						<div class="wrapper__head">
							<h2>Последние события</h2>
							<div class="wrapper__head-tabs">
								<ul class="d-flex">
									<li><a href="/">свежее</a></li>
									<li><a href="?sort=views">популярное</a></li>
									<li><a href="?sort=likes">понравившееся</a></li>
								</ul>
							</div>
						</div>
						@foreach($articles as $article)
							<article class="article">
								<div class="article__info">
									<span class="source">{{$article->source}}</span>
									<span class="date">{{$article->date}}</span>
								</div>
								<a href="{{route('article', ['alias' => $article->alias])}}" class="article__title">{{$article->name}} </a>
								<div class="article__desc">
									{{$article->short_description}}
								</div>

								<div class="article__image">
									<a href="">
										<img src="{{asset('assets/images/articles/article_'.$article->id.'.jpg')}}" alt="">
									</a>
								</div>
								<div class="article__footer">
									<div class="article__footer-like">
										<a href="#" class="like__down likes" data-dislike='-1' data-id='{{$article->id}}'><i class="fas fa-arrow-down"></i><small class="dislike"></small></a>
									</div>
									<span class='likes__count'>
										@if($article->likes != 0)
											{{$article->likes}}
										@else
											<b style="color: #999;">—</b>
										@endif
									</span>
									<div class="article__footer-like">
										<a href="#" class="like__up likes" data-id='{{$article->id}}' data-like='1'><i class="fas fa-arrow-up"></i> <small class="like">Нравится: </small></a>
									</div>
									<div class="article__footer-info" style="float: right;">
										<span class="info__item">
											<i class="fas fa-comments"></i>{{count($article->comments)}}
										</span>
										<span class="info__item">
											<i class="fas fa-eye"></i>{{ $article->views}}
										</span>
									</div>
								</div>
							</article>
						@endforeach
					</div>
					{{ $articles->appends(Request::query())->render() }}
				</div>
				@include('site.right_sidebar', [
					'articles' => $topArticles,
					'title' => 'Топ статей'
				])
			</div>
		</div>
	</div>
