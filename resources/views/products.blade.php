@extends('welcome')

@section('content')
    <div>
        <div class="container">
            <div class="d-flex flex-column text-center">
                <div class="d-flex flex-column text-center">
                    <h3 class="m-3">Create Product</h3>
                    <div class="container-form ">
                        @if(Session::get('error') !== null)
                            <div class="alert alert-danger font-weight-bold">
                                {{Session::get('error')}}
                            </div>
                        @endif
                        @if(Session::get('success') !== null)
                            <div class="alert alert-success font-weight-bold">
                                {{Session::get('success')}}
                            </div>
                        @endif

                        <div class="container p-5">
                            <form method="POST" action="/Products/Save" enctype="multipart/form-data">
                                @csrf
                                <div class="form-input-group d-flex flex-column justify-content-center">
                                    <div class="d-flex flex-column align-items-center">
                                        <input type="text" name="name"  class="form-control w-50  m-0" placeholder="name" />
                                        <input type="text" name="description" class="form-control w-50 my-4 " placeholder="description" />
                                        <div class="d-flex justify-content-center">
                                            <button type="submit" class="btn bg-primary text-white font-weight-bold">SUBMIT</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <h3>Products</h3>
                @if(Session::get('update') !== null)
                    <div class="alert alert-info font-weight-bold">
                        {{Session::get('update')}}
                    </div>
                @endif
                <table class="table table-bordered mng">
                    <thead>
                        <tr>
                            <td>Name</td>
                            <td>Description</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td>{{$product->name}}</td>
                            <td>{{$product->description}}</td>
                            <td>
                                <form method="POST" action="/Products/Update/{{$product->id}}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-input-group d-flex flex-column justify-content-start c-fifth">

                                        <div class="d-flex flex-column align-items-center">
                                            <input type="text" name="name"  class="form-control w-50 m-0" placeholder="name" />
                                            <input type="text" name="description" class="form-control w-50 my-4" placeholder="description" />
                                            <div class="d-flex justify-content-center">
                                                <button type="submit" class="btn text-white font-weight-bold bg-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form method="POST" action="/Products/Delete/{{$product->id}}" enctype="multipart/form-data">
                                    @csrf
                                    <button type="submit" class="btn text-white font-weight-bold bg-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>
@endsection
