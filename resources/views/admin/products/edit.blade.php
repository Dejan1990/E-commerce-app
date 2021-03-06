@extends('admin.app')
@section('title', $pageTitle)
@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/js/plugins/dropzone/dist/min/dropzone.min.css') }}"/>
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1>
                <i class="fa fa-shopping-bag"></i> {{ $pageTitle }} - {{ $subTitle }}
            </h1>
        </div>
    </div>

    @include('admin.partials._messages')

    <div class="row">
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item">
                        <a class="nav-link active" href="#general" data-toggle="tab">General</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#images" data-toggle="tab">Images</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#attributes" data-toggle="tab">Attributes</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="general">
                    <div class="tile">
                        @include('admin.products.includes._form')
                    </div>
                </div>
                <div class="tab-pane" id="images">
                    @include('admin.products.includes._images')
                </div>
                <div class="tab-pane" id="attributes">
                    <product-attributes :productid="{{ $product->id }}"></product-attributes>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    @include('admin.products.includes.scripts')
@endpush 