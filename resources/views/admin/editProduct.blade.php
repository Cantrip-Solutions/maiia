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
                        <span> Edit Product </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Edit Product: {{$productInfo->name}} </h2>
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

                    {{Form::open(array('files'=>true,'id'=>'formdata','class'=>'form-horizontal','action' => 'ProductController@updateProduct', 'method'=>'POST', 'enctype'=>"multipart/form-data"))}}

                        <input class="form-control" type="hidden" name="id" id="id" value="{{Crypt::encrypt($productInfo->id)}}">

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Product Name*:</label>
                            <div class="col-sm-10">
                                {!! Form::text('name', $productInfo->name,array('placeholder'=>'Product Name','class'=>'form-control')) !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="cat_id_fk" class="col-sm-2 control-label">Category*:</label>
                            <div class="col-sm-10">
                                <select class="js-source-states cat_id_fk" name="cat_id_fk" style="width: 100%">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                    @if($category->id == $productInfo->cat_id_fk)
                                        <option value="{{$category->id}}" selected="selected">{{$category->cat_name}}</option>
                                    @else
                                        <option value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('cat_id_fk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('cat_id_fk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <input type="hidden" name="u_id_fk" value="{{ Auth::user()->id }}">

                        <div class="form-group">
                            <label for="original_price" class="col-sm-2 control-label">Original Price*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('original_price', $productInfo->original_price,array('placeholder'=>'Original Price','class'=>'form-control')) !!}
                                @if ($errors->has('original_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('original_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="saling_price" class="col-sm-2 control-label">Selling Price*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('saling_price', $productInfo->saling_price,array('placeholder'=>'Saling Price','class'=>'form-control')) !!}
                                @if ($errors->has('saling_price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('saling_price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="quantity" class="col-sm-2 control-label">Stock Adjustment*:</label>
                            <div class="col-sm-10">
                                {!! Form::number('quantity', $productInfo->quantity,array('placeholder'=>'Quantity','class'=>'form-control')) !!}
                                @if ($errors->has('quantity'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('quantity') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        {{-- <div class="form-group">
                            <label for="expire_on" class="col-sm-2 control-label">Expire Date*:</label>
                            <div class="col-sm-10">
                            
                                 <div class="input-group date">
                                    <input type="text" name="expire_on" value="{{ date('Y-m-d',strtotime($productInfo->expire_on)) }}" class="form-control"><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                </div>
                                @if ($errors->has('expire_on'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expire_on') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> --}}

                        <div class="form-group">
                            <label for="image" class="col-sm-2 control-label">Product Image*:</label>
                            <div class="col-sm-10">
                                {!! Form::file('image',array('class'=>'btn-primary2')) !!}
                                @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tag" class="col-sm-2 control-label">Tag *:</label>
                            <div class="col-sm-10">
                                {{ Form::text('tag',$productInfo->tag,array('placeholder'=>'Men, Women','class'=>'form-control','data-role'=>"tagsinput")) }}
                                @if ($errors->has('tag'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tag') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">Description :</label>
                            <div class="col-sm-10">
                                {{ Form::textarea('description',$productInfo->description,array('id'=>"description", 'name'=>"description",'class'=>'form-control summernote1')) }}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="specification_html">
                        <?php $specificationarray=array(); ?>
                            @foreach ($categories as $category)
                                @if($category->id == $productInfo->cat_id_fk)
                                    <?php
                                        $specificationarray=unserialize($category->specifications); 
                                    ?>
                                @endif
                            @endforeach  
                            @foreach($specificationarray as $key => $specificationval)
                                <?php $attr=unserialize($productInfo->specification);?>

                                @if($specificationval['value'] == "")

                                    <div class="form-group">
                                        <label for="name" class="col-sm-2 control-label">{{ ucwords($specificationval['name']) }} *:</label>
                                        <div class="col-sm-10">

                                            <input type="text" name="specification[{{ $specificationval['name'] }}]" value="{{ $attr[$specificationval['name']]}}" placeholder="Value" class="form-control">
                                        </div>
                                    </div>

                                @else
                                    <?php 
                                        $attrval=explode(',', $specificationval['value']);
                                    ?>
                                    <div class="form-group">
                                        <label for="cat_id_fk" class="col-sm-2 control-label">{{ ucwords($specificationval['name']) }} *:</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-select2 cat_id_fk" name="specification[{{ $specificationval['name'] }}]" style="width: 100%">
                                                <option value="">Select a Value</option>
                                                @foreach($attrval as $key1 => $val)
                                                    @if($val == $attr[$specificationval['name']])
                                                        <option value="{{$val}}" selected>{{$val}}</option>
                                                    @else
                                                        <option value="{{$val}}">{{$val}}</option>
                                                    @endif
                                                @endforeach  
                                            </select>
                                        </div>
                                    </div>

                                @endif
                            @endforeach                 
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
    {!!HTML::style('admintheme/vendor/summernote/dist/summernote.css')!!}
    {!!HTML::style('admintheme/vendor/summernote/dist/summernote-bs3.css')!!}
    {!!HTML::style('admintheme/vendor/bootstrap-datepicker-master/dist/css/bootstrap-datepicker3.min.css')!!}
    {!!HTML::style('css/bootstrap-tagsinput.css')!!}
   
@endpush
@push('scripts')
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/jquery.validate.min.js') !!}
{!! HTML::script('plugins/jquery-validation-1.15.0/dist/additional-methods.min.js') !!}
{!! HTML::script('admintheme/vendor/select2-3.5.2/select2.min.js') !!}
{!! HTML::script('admintheme/vendor/summernote/dist/summernote.min.js') !!}
{!! HTML::script('admintheme/vendor/bootstrap-datepicker-master/dist/js/bootstrap-datepicker.min.js') !!}
{!! HTML::script('js/bootstrap-tagsinput.min.js')!!}

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
        'tag': {
            required: true
        },
        // 'expire_on': {
        //     required: true
        // },
        'image': {
            extension: "PNG|JPEG|JPG"
            
        },
        'description': {
            required: true
        },
      }
    });
    $(".js-source-states").select2();
    $(".js-example-select2").select2();
   
    $('.input-group.date').datepicker({ 
        // setDate: new Date(),
        format: 'yyyy-mm-dd',
        startDate: new Date(),
    });

    $('#description').summernote({ 
        toolbar: [
               ['headline', ['style']],
               ['style', ['bold', 'italic', 'underline', 'superscript', 'subscript', 'strikethrough', 'clear']],
               ['textsize', ['fontsize']],
               ['alignment', ['ul', 'ol', 'paragraph', 'lineheight']],
           ]
    });

    function toTitleCase(str) {
    return str.replace(/(?:^|\s)\w/g, function(match) {
        return match.toUpperCase();
        });
    }

    var token="{{ csrf_token() }}";

    $('.cat_id_fk').on('change',function(){
        var cat_id=$(this).val();
        if(cat_id != ''){
            $.ajax({
                'type':'post',
                'url':"{{URL::to('getSpecification')}}",
                'headers': {'X-CSRF-TOKEN': token},
                'data':{'cat_id':cat_id},
                'dataType':'json',
                'success':function(resp){
                    //console.log(resp);
                    //var obj=jQuery.parseJSON(resp);
                    var html='';
                    $.each( resp, function( key, specification ) {
                        var specificationval=specification.value;
                        
                        if(specificationval == null){
                           html+='<div class="form-group"><label for="name" class="col-sm-2 control-label">'+toTitleCase(specification.name)+' *:</label><div class="col-sm-10"><input type="text" name="specification['+specification.name+']" value="" placeholder="Value" class="form-control"></div></div>';
                        }else{
                            html+='<div class="form-group"><label for="cat_id_fk" class="col-sm-2 control-label">'+toTitleCase(specification.name)+'*:</label><div class="col-sm-10"><select class="js-example-select2 cat_id_fk" name="specification['+specification.name+']" style="width: 100%"><option value="">Select a Value</option>';
                                    var obj=specificationval.split(",");
                                    var i;
                                    for (i = 0; i < obj.length; ++i) {
                                        html+='<option value="'+obj[i]+'">'+obj[i]+'</option>';
                                    }
                            html+='</select></div></div>';
                        }

                        $('.specification_html').html(html);
                        $(".js-example-select2").select2();
                    });
                }
            });
        }
    });

});
</script>
@endpush
@endsection