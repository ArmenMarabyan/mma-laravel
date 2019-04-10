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
                                            {{$user->name}}
                                        </div>
                                        <div class="cabinet__user-edit">
                                            <a href="/cabinet">Настройки</a>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="row">
                                            <div class="col-lg-3"></div>
                                            <div class="col-lg-6">
                                            
                                            <h2>Обновить профиль</h2>
                                            <hr>
                                            @if(count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{$error}}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif
                                            <!-- success -->
                                            @if(Session::has('message'))
                                                <div class="alert alert-success">
                                                    {{Session::get('message')}}
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                    
                                    <div class="row">
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="name">Имя</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                                    <input type="text" name="name" class="form-control" id="name"
                                                    placeholder="Имя" value="<?= $user->name; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-control-feedback">
                                                <span class="text-danger align-middle">
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="row">
                                        <div class="col-lg-3 field-label-responsive">
                                            <label for="avatar">avatar</label>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group has-danger">
                                                <div class="input-group mb-2 mr-sm-2 mb-sm-0">

                                                    <input type="file" name="image" class="form-control" id="avatar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-3">

                                        </div>
                                        <div class="col-md-6">
                                            <span class="text-danger align-middle">

                                            </span>
                                            
                                            <button type="submit" class="btn btn-primary">Сохранить</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            
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




