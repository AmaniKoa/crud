@extends('layouts')
@section('title')  Edit Products @endsection
@section('content')
<h1>Edit Product</h1>

@if (Session::has ('success'))
  <div class=" alert alert-success" >
        {{Session::get('success')}}
  </div>
@endif

<form method="post" action="{{route('products.update',$products->id)}}">
    @csrf
    @method('PUT')

    <div class="mb-3">
      <label class="mb-3">Product name</label>
      <input type="text" value={{$products->name}}  name='name' class="form-control" >
    </div>
    <div class="mb-3">
      <label class="form-label">Product description</label>
      <textarea name='description' class="form-control">{{$products->description}}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
