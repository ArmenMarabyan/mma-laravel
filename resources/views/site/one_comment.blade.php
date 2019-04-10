<li id="li-comment-{{$data['id']}}" class="comment even ">
    <div id="comment-{{$data['id']}}" class="comment-container newComment">
        <div class="comment-author vcard">
            @if(isset($data['user_id']))
                @if(file_exists(public_path().'/assets/images/users/user_' .$data['user_id'].'.jpg'))
                    <img src="{{asset('assets/images/users/user_'.$data['user_id'].'.jpg')}}">
                    @else
                    <img src="{{asset('assets/images/users/no_image.jpeg')}}" class="avatar" height="75" width="75">
                @endif
                @else
                <img src="{{asset('assets/images/users/no_image.jpeg')}}" class="avatar" height="75" width="75">
            @endif
            <cite class="fn">
                {{$data['name']}}
            </cite>
        </div>
          <!-- .comment-author .vcard -->
        <div class="comment-meta commentmetadata">
            <div class="intro">
                <div class="commentDate">
                    Только что            
                </div>
                <div class="commentNumber">#&nbsp;1</div>
              </div>
              <div class="comment-body">
                <p>{{$data['user_comment']}}</p>
                
            </div>
        </div>
    <!-- .comment-meta .commentmetadata -->
    </div>
</li>