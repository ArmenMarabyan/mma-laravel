@extends("layouts.site")
@section('title', 'cabinet')

@section("content")
    <style>body::before {background-color: #eee !important;}body::after {width: 100% !important;}</style>
    <div class="row">
        <div class="col-lg-12 col-xs-12 content__main" >



            <div class="header article__header">
               @include('site.mini_header') 


                
            </div>
            <div class="row">

                <div class="col-lg-12" style="margin-bottom: 50px;">
                    <div class="content__main-wrapper">
                        <div class="cabinet">
                            @if($user)
                                <div class="row">

                                    <div class="col-lg-4">
                                        <div class="cabinet__user">
                                            <div class="cabinet__user-avatar">
                                                @if(file_exists(public_path().'/assets/images/users/user_' .$user->id.'.jpg'))
                                                    <img src="{{asset('assets/images/users/user_'.$user->id.'.jpg')}}">
                                                    @else
                                                    <img src="{{asset('assets/images/users/no_image.jpeg')}}">
                                                @endif
                                            </div>
                                            <div class="cabinet__user-name">
                                                <?= $user['name']; ?>
                                            </div>
                                            <div class="cabinet__user-edit">
                                                <a href="{{route('cabinet_edit')}}">Настройки</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8"></div>  
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section("footer")
    @include("site.footer")
@endsection


