@extends('layouts.dashboard')
@section('title','admins')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">admins</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.admins.store')}} " method="post" enctype="multipart/form-data">
    @csrf
    @include('dashboard.admins._form')

</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush