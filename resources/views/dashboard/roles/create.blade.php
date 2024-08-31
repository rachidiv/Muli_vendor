@extends('layouts.dashboard')
@section('title','roles')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">roles</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.roles.store')}} " method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.roles._form')

</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush