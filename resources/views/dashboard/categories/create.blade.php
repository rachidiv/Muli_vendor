@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Categories</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.categories.store')}} " method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.categories._form')

</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush