@extends('layouts')
@section('title') All products
@endsection
@section("custom-css")
<style>

   form{
       display: inline;
   }
</style>
@endsection
@section('content')
<table class="table">
 <h1> Product Number ::  {{ count($products)}} </h1>
    <thead>
      <tr>
        <th>#</th>

        <th>Name</th>
        <th>Description</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        @forelse ($products as $product)
        <tr>

            <td>{{$loop->iteration}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->description}}</td>
            <td >
                <a href="{{route('products.restore',$product->id)}}" class="btn btn-info" >Restore</a>
                <a href="{{route('products.force',$product->id)}}" class="btn btn-info">Force delete</a>
            </td>
          </tr>
        @empty
           <tr>
               <td> No Data </td>
           </tr>

        @endforelse


    </tbody>
  </table>


@endsection
