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
 <h1> Product Number ::  "[{{ count($products)}}]" </h1>
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
                <a href="{{route('products.edit',$product->id)}}" class="btn btn-info" >Edit</a>
                <form action="{{route('products.destroy',$product->id)}}" method="post">
                @csrf
                @method('delete')

                <button class="btn btn-danger">Delete</button>
                </form>
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
