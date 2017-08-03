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
                        <span> View Company </span>
                    </li>
                </ol>
            </div>
            <h2 class="font-light m-b-xs"> Company Details : {{$user->name}} </h2>
        </div>
    </div>
</div>
<div class="content animate-panel">
    <div class="row">
        <div class="col-lg-12">

            <div class="hpanel">

                <div class="panel-body"> 

                </div>
            </div>
        </div>
    </div>
</div>
@push('css')
@endpush
@push('script')
@endpush
@endsection