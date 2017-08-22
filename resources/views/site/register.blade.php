@extends('layouts.siteMain')
@section('content')
  <section class="login-wrap">  
       <div class="login-inner">
            <a href="{{url('/')}}" class="logo-inner">
            {!!HTML::image(config('global.siteImages')."logo-inner.png")!!}
           </a>
           <h2>Sign up <span>EASILY USING</span></h2>
           <div class="login-media">
                <ul>
                    <li><a href="#"><icon> {!!HTML::image(config('global.siteImages')."fb-icon.png")!!}</icon><small>Facebook</small></a></li>
                    <li><a href="#"><icon>{!!HTML::image(config('global.siteImages')."gplus-icon.png")!!}</icon><small>Google Plus</small></a></li>
                </ul>
           </div>
           <h3>- OR USING EMAIL -</h3>
           <div class="login-form">
                 {{Form::open(array('id'=>'registerdata','action' => 'HomeController@submitRegistration', 'method'=>'POST'))}}
                    <div class="log-field-wrap">
                        <div class="field-row">
                            {!! Form::text('email', '',array('placeholder'=>'Your Email Address')) !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                         
                        <div class="field-row">
                        {!! Form::password('password',array('placeholder'=>'Your Password')) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="field-row">
                         {!! Form::text('mobileno', '',array('placeholder'=>'Mobile Number')) !!}
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobileno') }}</strong>
                                    </span>
                                @endif
                       </div>
                        <div class="field-row">
                            <div class="gend">
                                <span>I am a </span>
                                  {!!Form::radio('gender', 'M','true', array('id'=>'test'))!!}
                                   <label for="test">Male</label>
                                    {!!Form::radio('gender', 'F', '', array('id'=>'test1'))!!}
                                <label for="test1">Female</label>
                            </div>
                        </div>
                    </div>
                    <input type="submit" name="" value="Register">
                    <div class="log-btm clears">
                        <div class="log-btm-right center">
                            <span>Already have an account?</span>
                            <a href="{{url('/miia-login')}}">Login!</a>               
                        </div>
                    </div>
                {{Form::close()}}
           </div>
       </div>
    </section>
@endsection