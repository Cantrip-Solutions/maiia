@extends('layouts.apps')
@section('content')

<div class="small-header transition animated fadeIn">
    <div class="hpanel">
        <div class="panel-body">
            <div class="pull-right" id="hbreadcrumb">
                <ol class="hbreadcrumb breadcrumb">
                    <li> Banner Management </li>
                    <li class="active">
                        <span> Banner </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Banner </h2>
        </div>
    </div>
</div>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">
            <div class="hpanel">
                <div class="panel-body">
                    <p align="right">
                        {{link_to_route('addBanner', $title = 'Add Banner', $parameters = array(), $attributes = array('type'=>'button', 'class'=>'btn w-xs btn-info'))}}
                    </p>                
                    @if (Session::has('message'))
                       <div class="alert alert-info"><i class="pe-7s-gleam"></i>{{ Session::get('message') }}</div>
                    @endif

                    <table id="example1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Image</th>  
                            <th>Title</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($banners as $banner)
                            <tr>
                                <td>{{$banner->id}}</td>
                                <td>
                                    @php $ext = pathinfo($banner->file, PATHINFO_EXTENSION) @endphp
                                    @if($ext == 'jpg')
                                        {!!HTML::image(config('global.bannerPath').'/'.$banner->file, 'alt', array('width'=>'100', 'height'=>'80'))!!}
                                    @elseif($ext == 'mp4')
                                        <iframe width="100" height="100" src="{{URL::asset('images/bannerImage/'.$banner->file)}}" frameborder="0" allowfullscreen> </iframe>
                                    @endif
                                </td>
                                <td>{{$banner->title}}</td>
                                <td>@if($banner->status ==1)
                                        Active
                                    @else
                                        Inactive
                                    @endif
                                </td>
                                <td>
                                 <a style="font-size: medium;" title="Edit Banner" class="fa fa-pencil-square-o" href="/settings/bannerManagement/edit/{{urlencode($banner->title)}}/{{Crypt::encrypt($banner->id)}}"></a>
                                   <a style="font-size: medium;" title="Delete Banner" class="fa fa-trash-o" id="{{Crypt::encrypt($banner->id)}}">
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
            bootbox.confirm("Are you sure to delete this Banner?", function(result) {
                if (result == true) {
                    window.location.href = "/settings/bannerManagement/delete/"+id;
                } else {
                }
            });
        });
</script>
@endpush
@endsection