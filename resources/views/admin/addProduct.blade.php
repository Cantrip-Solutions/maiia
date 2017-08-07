@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> Product Management </li>
                    <li> Product </li>
                    <li class="active">
                        <span> Add Product </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Add Product </h2>
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

                    {{Form::open(array('files'=>true,'id'=>'formdata','class'=>'form-horizontal','action' => 'ProductController@createProduct', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Product Name*:</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', '',array('placeholder'=>'Product Name','class'=>'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="u_id_fk" class="col-sm-2 control-label">Company User*:</label>
                            <div class="col-sm-10">
                                <select class="js-source-states" name="u_id_fk" style="width: 100%">
                                    @foreach ($companyUsers as $key => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('u_id_fk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('u_id_fk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cat_id_fk" class="col-sm-2 control-label">Category*:</label>
                            <div class="col-sm-10">
                                <select class="js-source-states" name="cat_id_fk" style="width: 100%">
                                    @foreach ($categories as $key => $value)
                                        <option value="{{$value->id}}">{{$value->cat_name}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('cat_id_fk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_id_fk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="ammount" class="col-sm-2 control-label">Ammount (%) *:</label>
                            <div class="col-sm-10">
                                {!! Form::number('ammount', '',array('placeholder'=>'Ammount','class'=>'form-control')) !!}
                                @if ($errors->has('ammount'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ammount') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="original_price" class="col-sm-2 control-label">Original Price*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('original_price', '',array('placeholder'=>'Original Price','class'=>'form-control')) !!}
                                @if ($errors->has('original_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('original_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="saling_price" class="col-sm-2 control-label">Saling Price*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('saling_price', '',array('placeholder'=>'Saling Price','class'=>'form-control')) !!}
                                @if ($errors->has('saling_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saling_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="col-sm-2 control-label">Quantity*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('quantity', '',array('placeholder'=>'Quantity','class'=>'form-control')) !!}
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="expire_on" class="col-sm-2 control-label">Expire Date*:</label>
                            <div class="col-sm-10">
                                 <div class="input-group date">
                                    <input type="text" name="expire_on" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                @if ($errors->has('expire_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expire_on') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Product Image*:</label>
                            <div class="col-sm-10">
                                {!! Form::file('image') !!}
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description :</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description','',array('size' => '50x3','class'=>'form-control')) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="submit" class="btn w-xs btn-success" name="submit">Submit</button>
                                <a class="btn w-xs btn-info" href="{{url('/tab/product')}}">Back</a>
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
    {!!HTML::style('admintheme/vendor/select2-3.5.2/select2.css')!!}
    {!!HTML::style('admintheme/vendor/select2-bootstrap/select2-bootstrap.css')!!}
    {!!HTML::style('admintheme/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css')!!}
   
@endpush
@push('scripts')
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/additional-methods.min.js') !!}
{!! HTML::script('admintheme/vendor/select2-3.5.2/select2.min.js') !!}
{!! HTML::script('admintheme/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') !!}
<script type="text/javascript">
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
        'u_id_fk': {
            required: true
        },
        'cat_id_fk': {
            required: true
        },
        'ammount': {
            required: true,
            number:true
        },
        'original_price': {
            required: true
        },
        'saling_price': {
            required: true
        },
        'quantity': {
            required: true
        },
        'expire_on': {
            required: true
        },
        'image': {
            required: true,
            extension: "PNG|JPEG"
            
        },
        'description': {
            required: true
        },
      }
    });
    $(".js-source-states").select2();
    $('.input-group.date').datepicker({ 
        setDate: new Date(),
        startDate: '-0d',
    });
});
</script>
@endpush
@endsection