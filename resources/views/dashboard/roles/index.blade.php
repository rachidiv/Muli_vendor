@extends('layouts.dashboard')
@section('title','roles')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">roles</a></li>
@endsection
@section('content')
<div class="mb-5">
    <a href="{{route('dashboard.roles.create')}} " class="btn btn-sm btn-outline-primary">Create</a>
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
        @forelse($roles as $role)
        <tr>
            <td>{{$role->id}} </td>
            <td> <a href="{{route('dashboard.roles.show',$role->id)}} ">
                    {{$role->name}}
                </a></td>

            <td>{{$role->created_at}} </td>
            <td>
                <a href="{{route('dashboard.roles.edit',$role->id)}} " class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.roles.destroy',$role->id)}} " method="post">
                    @csrf
                    @method('delete')
                    @if(Auth::user()->can('roles.delete'))
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                    @endif
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td>
                no roles defined.

            </td>
        </tr>
        @endforelse
    </tbody>
</table>
{{$roles->withQueryString()->links()}}
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->