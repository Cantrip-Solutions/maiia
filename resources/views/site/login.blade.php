@extends('layouts.siteMain')
@section('content')
    <section class="login-wrap">  
       <div class="login-inner">
            <a href="{{url('/')}}" class="logo-inner">
                {!!HTML::image(config('global.siteImages')."logo-inner.png")!!}
           </a>
           
           <h2>LOGIN <span>EASILY USING</span></h2>
           
           <div class="login-media">
                <ul>
                    <li><a href="#"><icon>{!!HTML::image(config('global.siteImages')."fb-icon.png")!!}</icon><small>Facebook</small></a></li>
                    <li><a href="#"><icon>{!!HTML::image(config('global.siteImages')."gplus-icon.png")!!}</icon><small>Google Plus</small></a></li>
                </ul>
           </div>
           
           <h3>- OR USING EMAIL -</h3>

           @if (Session::has('message'))
               <div class="alert alert-danger" style="margin-top: 18px;"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
            @endif

           <div class="login-form">
                  {{Form::open(array('id'=>'logindata','action' => 'HomeController@submitLogin', 'method'=>'POST'))}}
                    <div class="log-field-wrap">
                        <div class="field-row">
                          {!! Form::text('email', '',array('placeholder'=>'Your Email Address')) !!}
                        </div>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                        <div class="field-row">
                          {!! Form::password('password',array('placeholder'=>'Your Password')) !!}
                        </div>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                    </div>
                    
                    <input type="submit" name="" value="Log In">

                    <div class="log-btm clears">
                        <a href="#" class="recover-pass">Recover password </a>
                        
                        <div class="log-btm-right">
                            <span>New to Maiia?</span>
                            <a href="{{url('/miia-registration')}}">Create</a>
                        </div>
                    </div>
                {{Form::close()}}
           </div>
       </div>
    </section> 
@endsection