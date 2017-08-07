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
                        <span> Add Company </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Add Company </h2>
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
                    {{Form::open(array('files'=>true,'id'=>'formdata','action' => 'CompanyController@createCompany', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}
                        <div class="form-group">
                            <label for="company_name" class="control-label">Company Name *:</label>
                            {!! Form::text('name', '',array('placeholder'=>'Company Name', 'class'=>'form-control')) !!}
                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_email" class="control-label">Company Email ID *:</label>
                            {!! Form::text('email', '',array('placeholder'=>'example@domain.com', 'class'=>'form-control')) !!}
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
                            <label for="company_address1" class="control-label">Address Line 1 *:</label>
                            {!! Form::text('address1', '',array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('address1'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address1') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_address2" class="control-label">Address Line 2 :</label>
                            {!! Form::text('address2', '',array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('address2'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('address2') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_country" class="control-label">Country *:</label>
                            <select class='form-control country' name="country">
                                <option value="">Select Option</option>
                                @foreach($countries as $country)
                                <option value="{{$country->id}}" ccode="{{$country->phonecode}}">{{$country->name}}</option>
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
                            </select>
                            @if ($errors->has('state'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_city" class="control-label">City:</label>
                            <select class='form-control city' name="city">
                            </select>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('city') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_phone" class="control-label">Contact Number *:</label>
                            <div class="input-group m-b">
                            <span class="input-group-addon country_code"></span>
                            {!! Form::text('phone', '',array('placeholder'=>'0123456789', 'class'=>'form-control')) !!}
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="company_postal_code" class="control-label">Pin Code *:</label>
                            {!! Form::text('postal_code', '',array('placeholder'=>'', 'class'=>'form-control')) !!}
                            @if ($errors->has('postal_code'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('postal_code') }}</strong>
                                </span>
                            @endif
                        </div>

                        

                        <div class="form-group">
                            <label for="company_description" class="control-label">Company Short Description *:</label>
                            {{ Form::textarea('notes','',array('class'=>'form-control')) }}
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
$('.country').on('change',function () {
    var country = $('.country').val();
    var ccode = $(this).find('option:selected').attr('ccode');
    $('.country_code').text(ccode);
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
              $('<option value="'+ info.id +'">'+ info.name +'</option>').appendTo('.city');
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
            required: true,
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