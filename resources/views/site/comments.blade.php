@foreach($comments as $comment)
    <li id="li-comment-{{$comment->id}}" class="comment even depth-1">
        <div id="comment-{{$comment->id}}" class="comment-container">
            <div class="comment-author vcard">
            	@if(!is_null($comment->user_id))
            		@if(file_exists(public_path().'/assets/images/users/user_' .$comment->user->id.'.jpg'))
            			<img src="{{asset('assets/images/users/user_'.$comment->user->id.'.jpg')}}">
            			@else
            			<img src="{{asset('assets/images/users/no_image.jpeg')}}" class="avatar" height="75" width="75">
            		@endif
            		<cite class="fn">
						{{$comment->user->name}}
					</cite> 
					@else
					<img src="{{asset('assets/images/users/no_image.jpeg')}}" class="avatar" height="75" width="75">
					<cite class="fn">
						{{$comment->name}}
					</cite> 
				@endif
            </div>
            <!-- .comment-author .vcard -->
            <div class="comment-meta commentmetadata">
                <div class="intro">
                    <div class="commentDate">
                      {{!is_null($comment->created_at) ? $comment->created_at->format('F d, Y \a\t H:i') : ''}}                   
                    </div>
                    <div class="commentNumber">#&nbsp;1</div>
                </div>
                <div class="comment-body">
                    <p>{{$comment->user_comment}}</p>
                </div>
                <div class="reply group">
                    <a class="comment-reply-link" href="#respond" onclick="return addComment.moveForm(&quot;comment-{{$comment->id}}&quot;, &quot;{{$comment->id}}&quot;, &quot;respond&quot;, &quot;{{$comment->article_id}}&quot;)">Ответить</a>                    
                </div>
                <!-- .reply -->
            </div>
            <!-- .comment-meta .commentmetadata -->
        </div>
        <!-- #comment-##  -->
        @if(isset($com[$comment->id]))
        	<ul class="children">
        		@include('site.comments', ['comments' => $com[$comment->id]])
        	</ul>
        @endif
    </li>
@endforeach