@extends("layouts.site")
@section("title", $article->name)

@section("content")
<div class="row">
	<div class="col-lg-12 col-xs-12 content__main" >
		<div class="header article__header">
			@include('site.mini_header')
		</div>
		<div class="row">
			<div class="col-lg-9" style="margin-bottom: 50px;">
				<div class="content__main-wrapper">
					<div class="open__article">
						<div class="open__article-info">
							<span class="source">{{$article->source}}</span>
							<span class="date">{{$article->date}}</span>
							<div class="article__footer-info" style="float: right;">
								<span class="info__item">
									<i class="fas fa-comments"></i>{{count($article->comments)}}
								</span>
								<span class="info__item">
									<i class="fas fa-eye"></i>{{ $article->views}}
								</span>
							</div>
						</div>
						<h1 >{{ $article->name }}</h1>
						<div class="open__article-desc">
							{{ $article->short_description }}
						</div>
						
						<div class="open__article-image">
							<img src="{{asset('assets/images/articles/article_'.$article->id.'.jpg')}}" alt="">
						</div>

						<div class="open__article-full-desc" style="font-size: 15px;">
							{{ $article->description }}
						</div>
						
						<div class="open__article-comments">
							<hr>
							<!-- START COMMENTS -->
							
				            <div id="comments">
				                <h5 id="comments-title" class="text-right">
				                    <span>{{count($article->comments)}}</span> комментариев    
				                </h5>

				                <div id="respond">
				                    <h3 id="reply-title"><small><a rel="nofollow" id="cancel-comment-reply-link" href="#respond" style="display:none;">Отмена</a></small></h3>
				                    <div class="wrap_result"></div>
									<div class="wrap_result_errors alert alert-danger" role="alert" style="display: none;"></div>

				                    <form class="form-horizontal" action="{{route('comment.store')}}" method="post" id="commentform">
				                    	{{csrf_field()}}

				                        <div class="form-group">
				                        	<label for="name">Имя</label>
				                        	@auth
				                        		<input type="text" name="" id="name" class="form-control col-3" value="{{\Auth::user()->name}}" placeholder="Имя" readonly="">

												@else
												<input type="text" name="name" id="name" class="form-control col-3" value="" placeholder="Имя">
												
				                        	@endauth
				                        	
				                        </div>

				                        <div class="form-group">
				                        	<label for="user_comment">Комментарий</label>
				                        	<textarea name="user_comment" class="form-control" id="user_comment" cols="45" rows="8"></textarea>
				                        </div>
				                        <div class="clear"></div>
				                        <p class="form-submit">
				                        	<input id="comment_post_ID" type="hidden" name="comment_post_ID" value="{{$article->id}}">
				                        	<input id="comment_parent" type="hidden" name="comment_parent" value="0">
				                            <input name="submit" type="submit" id="submit" class="btn btn-primary" value="Post Comment" />
				                        </p>
				                    </form>
				                </div>
				                <!-- #respond -->

				                @if(count($article->comments) > 0)
					                <ol class="commentlist group">
										@foreach($com as $k => $comments)
											@if($k != 0)
												@break
											@endif
											@include('site.comments', ['comments' => $comments])
											
										@endforeach
									</ol>
								@endif							
				                
				            </div>
						</div>
					</div>
				</div>
			</div>
			@include('site.right_sidebar', [
				'articles' => $latestArticles,
				'title' => 'Новые материалы'
			])
		</div>
	</div>
</div>
@endsection

@section("footer")
	@include("site.footer")
@endsection


