@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> Product Management </li>
                    <li class="active">
                        <span> Product </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Product </h2>
        </div>
    </div>
</div>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">

            <div class="hpanel">

                <div class="panel-body">
                    <p align="right">
                        {{link_to_route('addProduct', $title = 'Add Product', $parameters = array(), $attributes = array('type'=>'button', 'class'=>'btn w-xs btn-info'))}}
                    </p>                
                    @if (Session::has('message'))
                       <div class="alert alert-info"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
                    @endif

                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>  
                            <th>Name</th>
                            <th>Ammount(%)</th>
                            <th>Original Price</th>
                            <th>Saling Price</th>
                            <th>Status</th>
                            <th>Expire on</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{!!HTML::image(config('global.productPath').'/'.$product->image, 'alt', array('width'=>'30', 'height'=>'30'))!!}</td>
                                <td><a href="/tab/company/view/{{$product->name}}/{{Crypt::encrypt($product->id)}}">{{$product->name}}</a></td>
                                <td>{{$product->ammount}}</td>
                                <td>{{$product->original_price}}</td>
                                <td>{{$product->saling_price}}</td>
                                <td>@if(strtotime($product->expire_on) < strtotime(date('Y-m-d')) )
                                        Expired
                                    @else
                                        Active
                                    @endif
                                </td>
                                <td>
                                     {{ date('Y-m-d',strtotime($product->expire_on)) }}
                                </td>
                                <td>
                                
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
{!! HTML::style('admintheme/vendor/datatables_plugins_homer/integration/bootstrap/3/dataTables.bootstrap.css') !!}
@endpush
@push('scripts')

{!! HTML::script('admintheme/vendor/datatables_homer/media/js/jquery.dataTables.min.js') !!}
{!! HTML::script('admintheme/vendor/datatables_plugins_homer/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}

<script type="text/javascript">
    var dataTable = $('#example1').dataTable();
    $('.fa-trash-o').on('click', function(){
            var id = $(this).attr('id');
            bootbox.confirm("Are you sure to delete this User?", function(result) {
                if (result == true) {
                    window.location.href = "/tab/company/delete/"+id;
                } else {
                }
            });
        });
</script>
@endpush
@endsection