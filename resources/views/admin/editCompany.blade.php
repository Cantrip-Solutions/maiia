@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> User Management </li>
                    <li> Company </li>
                    <li class="active">
                        <span> Edit Company </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Edit Company : {{$user->name}} </h2>
        </div>
    </div>
</div>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">

            <div class="hpanel">

                <div class="panel-body">               
                    @if (Session::has('message'))
                       <div class="alert alert-info"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
                    @endif
                    {{Form::open(array('files'=>true,'id'=>'formdata','action' => 'CompanyController@updateCompany', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                        <input class="form-control" type="hidden" name="id" id="id" value="{{Crypt::encrypt($user->id)}}">
                        <div class="form-group">
                            <label for="company_name" class="control-label">Company Name *:</label>
                            {!! Form::text('name', $user->name,array('placeholder'=>'Company Name', 'class'=>'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_email" class="control-label">Company Email ID *:</label>
                            {!! Form::text('email', $user->email,array('placeholder'=>'example@domain.com', 'class'=>'form-control')) !!}
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_logo" class="control-label">Company Logo *:</label>
                            {!! Form::file('images') !!}
                            @if ($errors->has('images'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('images') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_phone" class="control-label">Contact Number *:</label>
                            {!! Form::text('phone', $userInfo->phone,array('placeholder'=>'0123456789', 'class'=>'form-control')) !!}
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_address1" class="control-label">Address Line 1 *:</label>
                            {!! Form::text('address1', $userInfo->address1,array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('address1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address1') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_address2" class="control-label">Address Line 2 :</label>
                            {!! Form::text('address2', $userInfo->address2,array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('address2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address2') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_country" class="control-label">Country *:</label>
                            <select class='form-control country' name="country">
                                @foreach($countries as $country)
                                    @if($userInfo->country == $country->id)
                                        <option value="{{$country->id}}" selected>{{$country->name}}</option>
                                    @else
                                        <option value="{{$country->id}}">{{$country->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('country') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_State" class="control-label">State *:</label>
                            <select class='form-control state' name="state">
                                @foreach($states as $state)
                                    @if($userInfo->state == $state->id)
                                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                                    @else
                                        <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_city" class="control-label">City:</label>
                            <input list="cities" name="city" class="form-control cities" value="{{$userInfo->city}}">
                            <datalist id="cities" class="city">
                                @foreach($cities as $city)
                                    <option value="{{$city->name}}">
                                @endforeach
                            </datalist>

                            {{-- <select class='form-control city' name="city">
                                @foreach($cities as $city)
                                    @if($userInfo->city == $city->id)
                                        <option value="{{$city->name}}" selected>{{$city->name}}</option>
                                    @else
                                        <option value="{{$city->name}}">{{$city->name}}</option>
                                    @endif
                                @endforeach
                            </select> --}}
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                        

                        <div class="form-group">
                            <label for="company_postal_code" class="control-label">Pin Code *:</label>
                            {!! Form::text('postal_code', $userInfo->postal_code,array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('postal_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
                        </div>

                        

                        <div class="form-group">
                            <label for="company_description" class="control-label">Company Short Description *:</label>
                            {{ Form::textarea('notes',$user->notes,array('class'=>'form-control')) }}
                            @if ($errors->has('notes'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('notes') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn w-xs btn-success" name="submit">Submit</button>
                            <a class="btn w-xs btn-info" href="{{url('/tab/company')}}">Back</a>

                        </div>

                    {{Form::close()}}

                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
{!! HTML::style('plugins/jquery-loadmask-master/jquery.loadmask.css') !!}
@endpush
@push('scripts')
{!! HTML::script('plugins/jquery-loadmask-master/jquery.loadmask.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/additional-methods.min.js') !!}
<script type="text/javascript">
$('.cities').on('click',function () {
    $('.cities').attr('autocomplete','on');
});
$('.country').on('change',function () {
    var country = $('.country').val();
    var token = $('input[name=_token]').val();
      $.ajax({
        'type':'post',
        'url':'{{URL::to('getState')}}',
        'headers': {'X-CSRF-TOKEN': token},
        'data':{'country':country},
        'dataType':'json',
        'beforeSend':function(){ $('.row').mask('Please Wait...'); },
        'success':function(resp){
            $('.state').children('option').empty().remove();
            $('.city').children('option').empty().remove();
            $('<option value="">Select State</option>').appendTo('.state');
            $.each(resp,function(intex,info){
              $('<option value="'+ info.id +'">'+ info.name +'</option>').appendTo('.state');
            });
            $('.row').unmask();
        }
      });
})
$('.state').on('change',function () {
    var state = $('.state').val();
    var token = $('input[name=_token]').val();
      $.ajax({
        'type':'post',
        'url':'{{URL::to('getCity')}}',
        'headers': {'X-CSRF-TOKEN': token},
        'data':{'state':state},
        'dataType':'json',
        'beforeSend':function(){ $('.row').mask('Please Wait...'); },
        'success':function(resp){
            $('.city').children('option').empty().remove();
            $.each(resp,function(intex,info){
                $('<option value="'+ info.name +'">').appendTo('.city');
                // $('<option value="'+ info.name +'">'+ info.name +'</option>').appendTo('.city');
            });
            $('.row').unmask();

        }
      });
})
jQuery.validator.setDefaults({ 
    debug: false 
    //success: "valid" 
});
$(document).ready(function(){
    $('div.alert').delay(5000).slideUp(300);
    $("#formdata").validate({
      rules: {
        'name': {
            required: true
        },
        'email': {
            required: true,
            email: true
        },
        'images': {
            // required: true,
            extension: "jpg|jpeg|png"
        },
        'phone': {
            required: true,
            digits: true
        },
        'address1': {
            required: true
        },
        'country': {
            required: true
        },
        'state': {
            required: true
        },
        'postal_code': {
            required: true,
            digits: true
        },
        'notes': {
            required: true
        },

      }
    });
});
</script>
@endpush
@endsection