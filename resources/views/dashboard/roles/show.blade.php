@extends('layouts.dashboard')
@section('title',$category->name)
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Categories</a></li>
@endsection
@section('content')

<table class="table">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Store</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
    </thead>
    <tbody>
        @forelse($category->products()->with('store')->latest() as $product)
        <tr>
            <td><img src="{{asset('storage/' . $category->image)}} " height="50" alt="" srcset=""> </td>
            <td>{{$product->name}} </td>
            <td>{{ $product->store->name  }} </td>
            <td>{{$product->status}} </td>
            <td>{{$product->created_at}} </td>



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
{{$products->withQueryString()->links()}}
@endsection

<!-- @push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush -->