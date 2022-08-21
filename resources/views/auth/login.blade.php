@extends('layouts.app')

@section('content')
<section class="login-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="login-header light-violet"> 
                    تسجيل الدخول
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <section class="login-container">
                    <div class="row">
                        <div class="col-md-12 login-body">
                            <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                {{ csrf_field() }}

                                <div class="text-right row form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <div class="col-md-4">
                                        <label for="email" class=" control-label">البريد الاكترونى</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">

                                        @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>

                                </div>

                                <div class="text-right row form-group{{ $errors->has('password') ? ' has-error' : '' }}">

                                    <div class="col-md-4">
                                        <label for="password" class=" control-label">كلمة السر</label>
                                    </div>
                                    <div class="col-md-8">
                                        <input id="password" type="password" class="form-control" name="password">

                                        @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

<!--                                <div class="row form-group">
                                    <div class="col-md-8 col-md-offset-4">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                </div>-->

                                <div class="text-right row form-group justify-content-end">
                                    <div class="col-md-5">
                                        <button type="submit" class="login-buttom mt-4">
                                            <i class="fa fa-btn fa-sign-in"></i> تسجيل الدخول
                                        </button>

                                        <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</section>
</div>
@endsection
