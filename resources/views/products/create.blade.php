@extends('layouts')
@section('title')  Add Products @endsection
@section('content')
<h1>Create Product</h1>

@if (Session::has ('success'))
  <div class=" alert alert-success" >
        {{Session::get('success')}}
  </div>
@endif

<form method="post" action="{{route('products.store')}}">
    @csrf

    <div class="mb-3">
      <label class="mb-3">Product name</label>
      <input type="text"  name='name' class="form-control" >
    </div>
    <div class="mb-3">
      <label class="form-label">Product description</label>
      <textarea name='description' class="form-control"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
