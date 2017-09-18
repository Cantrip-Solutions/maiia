@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> Edit Order </li>
                    <li class="active">
                        <span> Order Management </span>
                    </li>
                    <li class="active">
                        <span>Edit Order </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Edit Order  </h2>
        </div>
    </div>
</div>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                        <input type="hidden" name="i_order" id="i_order" value="{{Crypt::encrypt($order_list[0]->order_id)}}">
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">User Name *:</label>
                                {{$order_list[0]->user_name}}
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">User Email *:</label>
                                {{$order_list[0]->user_email}}
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Product Name *:</label>
                                {{$order_list[0]->product_name}}
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Order Quantity *:</label>
                                {{$order_list[0]->order_quantity}}
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Amount Per Item :</label>
                                {{$order_list[0]->order_amount}}
                        </div>
                       <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Order total Amount :</label>
                                {{$order_list[0]->order_total_price}}
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-2 control-label">Status :</label>
                                <select name="order_status" id="order_status">
                                    <option value="0" <?php if($order_list[0]->order_status==0) echo 'selected="selected"'; ?>>PENDING</option>
                                    <option value="1" <?php if($order_list[0]->order_status==1) echo 'selected="selected"'; ?>>PROCESSING</option>
                                    <option value="2" <?php if($order_list[0]->order_status==2) echo 'selected="selected"'; ?>>DISPATCHED</option>
                                    <option value="3" <?php if($order_list[0]->order_status==3) echo 'selected="selected"'; ?>>DELIVERED</option>
                                    <option value="4" <?php if($order_list[0]->order_status==4) echo 'selected="selected"'; ?>>REFUND REQUEST</option>
                                    <option value="5" <?php if($order_list[0]->order_status==5) echo 'selected="selected"'; ?>>PRODUCT RECEIVED</option>
                                    <option value="6" <?php if($order_list[0]->order_status==6) echo 'selected="selected"'; ?>>REFUNDED</option>
                                    <option value="7" <?php if($order_list[0]->order_status==7) echo 'selected="selected"'; ?>>REPLACEMENT REQUEST</option>
                                    <option value="8" <?php if($order_list[0]->order_status==8) echo 'selected="selected"'; ?>>REPLACED</option>
                                </select>
                        </div>
                        <div class="form-group order_update_msg"></div>
                        <div class="form-group">
                            <div class="col-sm-8 col-sm-offset-2">
                                <button type="button" class="btn w-xs btn-success" name="submit" id="update_order">Submit</button>
                                <a class="btn w-xs btn-info" href="{{url('/tab/orders')}}">Back</a>
                            </div>
                        </div>
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
$('#update_order').click(function () {
    var ord_i=$('#i_order').val();
    var ord_st=$('#order_status').val();

    $.ajax({
            url : base_url+'/tab/orders/update_order',
            type: "POST",
            data:{'ord_i':ord_i,'ord_st':ord_st, _token: token},
            beforeSend: function(){
                $('.order_update_msg').html('<i class="fa fa-spinner fa-pulse"></i> Please wait ...');
            },
            success:function(data){
                if(data == 1)
                    {
                        $('.order_update_msg').html('<div class="alert alert-success">Order Updation Sucessfull</div>');
                    }
                else
                    {
                        $('.order_update_msg').html('<div class="alert alert-warning">Please try again later. Some error Occured!!!</div>');
                    }
            }
        });
});
</script>
@endpush
@endsection