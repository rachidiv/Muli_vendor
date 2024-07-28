@extends('layouts.dashboard')
@section('title','Categories')
@section('breadcrumb')
@parent
<li class="breadcrumb-item"><a href="#">Categories</a></li>
@endsection
@section('content')
<form action="{{route('dashboard.categories.store')}} " method="post">
    @csrf
    <div class="form-group">
        <label for="">
            Category Name
        </label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">
            Category Parent
        </label>
        <select name="parent_id" class="form-control form-select" id="">
            <option value="">Primary Category</option>
            @foreach($parents as $parent)
            <option value="{{$parent->id}} ">{{$parent->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <label for="">Image</label>
        <input type="file" name="image" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="active" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                    Active </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value="archived" id="flexRadioDefault2"
                    checked>
                <label class="form-check-label" for="flexRadioDefault2">
                    Archived </label>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">
        Save
    </button>
</form>
@endsection

@push('styles')
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css2/all.min.css')}}">

@endpush
@push('scripts')
<script src="{{asset('dist/js/adminlte2.min.js')}}"></script>

@endpush