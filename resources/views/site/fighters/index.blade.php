@extends("layouts.site")
@section("title", 'fighters')


@section("content")
	<div class="row">
		<div class="col-lg-12 col-xs-12 content__main" >
			<div class="header article__header">
				@include('site.mini_header')
			</div>
			<div class="content__main-wrapper">
				<div class="row">
					@foreach($fighters as $fighter)
						<div class="col-lg-2" style="padding-right: 1px; padding-left: 1px;">
							<div class="fighters__item">
								<a href="{{route('fighters', ['alias' => $fighter->alias])}}">
									<div class="fighters__item-image">
									
										<img src="{{asset('assets/images/fighters/fighter_'.$fighter->id.'.jpg')}}" alt="">
									
									</div>
								</a>
								<div class="fighters__item-name">
									{{$fighter->name}}
								</div>
							</div>
						</div>
					@endforeach	
				</div>
			</div>
			<div class="col-lg-12" style="text-align: center;">
				{{$fighters->links()}}
			</div>
		</div>
	</div>

@endsection

@section("footer")
	@include("site.footer")
@endsection