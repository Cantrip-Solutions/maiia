@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> Settings </li>
                    <li class="active">
                        <span> Banner Management </span>
                    </li>
                    <li class="active">
                        <span>Add Banner </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Add Banner </h2>
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
                    
                    {{Form::open(array('files'=>true,'id'=>'bannerdata','class'=>'form-horizontal','action' => 'BannerController@createBanner','method'=>'POST','enctype'=>"multipart/form-data"))}}

                        <div class="form-group">
                            <label for="banner_title" class="col-sm-2 control-label">Banner Title *:</label>
                            <div class="col-sm-10">
                                {!! Form::text('title', '',array('placeholder'=>'Banner Title', 'class'=>'form-control')) !!}
                                @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        

                        <div class="form-group">
                            <label for="banner_desc" class="col-sm-2 control-label">Banner Description :</label>
                            <div class="col-sm-10">
                                {!! Form::textarea('description', '',array('placeholder'=>'Banner Description', 'class'=>'form-control')) !!}
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="banner_file" class="col-sm-2 control-label">Banner Image/Video *:</label>
                            <div class="col-sm-10">
                                {!! Form::file('file') !!}
                                @if ($errors->has('file'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="banner_status" class="col-sm-2 control-label">Status :</label>
                            <div class="col-sm-10">
                            <label>Active</label>
                                {!! Form::radio('status', '1', true) !!}
                            <label>Inactive</label>
                                {!! Form::radio('status', '0') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn w-xs btn-success" name="submit">Submit</button>
                                <a class="btn w-xs btn-info" href="{{url('/settings/bannerManagement')}}">Back</a>
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
{!!HTML::style('admintheme/styles/static_custom.css')!!}
@endpush
@push('scripts')
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/additional-methods.min.js') !!}
<script type="text/javascript">
jQuery.validator.setDefaults({ 
    debug: false 
    //success: "valid" 
});
$(document).ready(function(){
    $('div.alert').delay(5000).slideUp(300);
    $("#bannerdata").validate({
      rules: {
        'title': {
            required: true
        },
        'file': {
            required: true,
            extension: "PNG|JPEG|JPG|MP4"
            
        }
      }
    });
   
});
</script>
@endpush
@endsection