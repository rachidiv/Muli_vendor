@extends('layouts.dashboard')
@section('title','Edit Product')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Products</a></li>
<li class="breadcrumb-item"><a href="#">Edit Product</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.products.update',$product->id)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('dashboard.products._form',[
    'button_label' => 'Update'
    ])

</form>
@endsection

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />

@endpush
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script>
var inputElem = document.querySelector('[name=tags]'),
    tagify = new Tagify(inputElem)
</script>
@endpush