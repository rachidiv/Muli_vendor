@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Categories</a></li>
@endsection
@section('content')
<div class="mb-5">
    <a href="{{route('dashboard.categories.create')}} " class="btn btn-sm btn-outline-primary">Create</a>
</div>
@if(session()->has('success'))
<div class="alert alert-success">

    {{session('success')}}
</div>
@endif
@if(session()->has('info'))
<div class="alert alert-info">

    {{session('info')}}
</div>
@endif
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td></td>
            <td>{{$category->id}} </td>
            <td>{{$category->name}} </td>
            <td>{{$category->parent_id}} </td>
            <td>{{$category->created_at}} </td>
            <td>
                <a href="{{route('dashboard.categories.edit',$category->id)}} "
                    class="btn btn-sm btn-outline-success">Edit</a>
            </td>
            <td>
                <form action="{{route('dashboard.categories.destroy',$category->id)}} " method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-outline-danger" type="submit">Delete</button>
                </form>
            </td>

        </tr>
        @empty
        <tr>
            <td>
                no categry defined.

            </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->