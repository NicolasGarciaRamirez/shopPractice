@extends('welcome')

@section('content')
    <div>
        <div class="help">
            <div class="c-body text-center" style="color: #cbd5e0">
                <span>Products</span><br>
                @foreach($products as $product)
                    <span>{{$product->name}}</span>
                    <span>{{$product->description}}</span>
                @endforeach
                <br>
                <br>
                <span>Create Product</span><br>

                <div class="container-form">
                    @if(Session::get('error') !== null)
                        <div class="alert text-white font-weight-bold">
                            {{Session::get('error')}}
                        </div>
                    @endif
                    @if(Session::get('success') !== null)
                        <div class="alert bg-gradient-success font-weight-bold">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    <form method="POST" action="/Products/Save" enctype="multipart/form-data">
                        @csrf
                        <div class="form-input-group d-flex flex-column justify-content-start c-fifth">
                            <div class="d-flex flex-row align-items-center">
                                <input type="text" name="name"  class="form-control p-3 m-0" placeholder="name" />
                            </div>
                            <div class="d-flex flex-row align-items-center">
                                <input type="text" name="description" class="form-control my-4 p-3" placeholder="description" />
                            </div>

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn rounded-pill bg-fifth text-white font-weight-bold">SUBMIT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
