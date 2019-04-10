@if (count($results) > 0)
	
	@foreach ($results as $result)
		<a href="{{route('article', ['alias' => $result->alias])}}">
			<div class="search__results-block">
				<div class="search__resultsBlock-image">
					<img src="{{asset('assets/images/articles/article_'.$result->id.'.jpg')}}" alt="">
				</div>
				<div class="search__resultsBlock-info">
					<h2><?= $result->name ?></h2>
					<p>{{str_limit($result->description, 90)}}</p>
				</div>
			</div>
            
		</a>
	@endforeach
	@if (count($results) > 9)
		<button type="submit" class="allResultsBtn">Посмотреть все результаты</button>
	@endif
	
	@else
		<div class="noResults">
			<p>По вашему запросу ничего не найдено</p>
		</div>
@endif
