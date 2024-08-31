@extends('layouts.dashboard')
@section('title','Edit admins')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">admins</a></li>
<li class="breadcrumb-item"><a href="#">Edit admin</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.admins.update',$admin->id)}} " method="post" enctype="multipart/form-data">
    @csrf
    @method('put')
    @include('dashboard.admins._form',[
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