@extends("layouts.site")
@section("title", 'reset')


@section("content")
<div class="row">
    <div class="col-lg-12 col-xs-12 content__main" >
        <div class="header article__header">
            @include('site.mini_header')
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto" style="margin-bottom: 50px;">
                <div class="content__main-wrapper">

                    <div class="login">
                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
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


