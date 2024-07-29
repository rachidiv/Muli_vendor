@extends('layouts.dashboard')
@section('title','Edit Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Categories</a></li>
<li class="breadcrumb-item"><a href="#">Edit Category</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.categories.update',$category->id)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('dashboard.categories._form',[
    'button_label' => 'Update'
    ])

</form>
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->