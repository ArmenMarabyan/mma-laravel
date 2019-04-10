<div class="col-lg-3" id="sticky" style="background-color: #EEE;">
	<div class="content__right-top" id="sidebar" >
		<strong>{{$title}}</strong>
		@foreach ($articles as $article)
			<a href="{{route('article', ['alias' => $article->alias])}}">
				<div class="top__articles">
					<div class="top__article-image" style="height: 150px;">
						<img src="{{asset('assets/images/articles/article_'.$article->id.'.jpg')}}" alt="">
					</div>
					<div class="top__article-title">
						{{ $article->name}}
					</div>
					<div class="top__article-views">
						<small>{{ $article->views }} Просмотров</small>
					</div>
				</div>
			</a>
		@endforeach
	</div>
</div>