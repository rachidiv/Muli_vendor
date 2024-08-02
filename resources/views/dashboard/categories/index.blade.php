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
<x-alert type="success" />
<x-alert type="info" />
<form action="{{URL::current()}} " method="get" class="d-flex justify-content-between mb-4">
    <x-form.input type='text' name="name" placeholder="Name" class="mx-2" :value="request('name')" />
    <select name="status" class="form-control mx-2">
        <option value="">All</option>
        <option value="active" @selected(request('status')=='active' )>Active</option>
        <option value="archived" @selected(request('status')=='archived' )>archived</option>
    </select>
    <button type="submit" class="btn btn-dark mx-2">Filter</button>
</form>
<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>ID</th>
            <th>Name</th>
            <th>Parent</th>
            <th>Status</th>
            <th>Created At</th>
            <th colspan="2"></th>
        </tr>
    </thead>
    <tbody>
        @forelse($categories as $category)
        <tr>
            <td><img src="{{asset('storage/' . $category->image)}} " height="50" alt="" srcset=""> </td>
            <td>{{$category->id}} </td>
            <td>{{$category->name}} </td>
            <td>{{$category->parent_name}} </td>
            <td>{{$category->status}} </td>
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
{{$categories->withQueryString()->links()}}
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->