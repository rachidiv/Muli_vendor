@extends('layouts.dashboard')
@section('title','admins')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">admins</a></li>
@endsection
@section('content')
<div class="mb-5">
    <a href="{{route('dashboard.admins.create')}} " class="btn btn-sm btn-outline-primary">Create</a>
</div>
<x-alert type="success" />
<x-alert type="info" />

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>

            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($admins as $admin)
        <tr>
            <td>{{$admin->id}} </td>
            <td> <a href="{{route('dashboard.admins.show',$admin->id)}} ">
                    {{$admin->name}}
                </a></td>

            <td>{{$admin->created_at}} </td>
            <td>
                <a href="{{route('dashboard.admins.edit',$admin->id)}} " class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.admins.destroy',$admin->id)}} " method="post">
                    @csrf
                    @method('delete')
                    @if(Auth::user()->can('admins.delete'))
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    @endif
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td>
                no admins defined.

            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$admins->withQueryString()->links()}}
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->