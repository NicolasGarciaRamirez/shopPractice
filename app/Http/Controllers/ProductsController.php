<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = \App\Models\Products::all();
        return view('products', ['products' => $products]);
    }

    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
            ]);

            $user = \Auth::user();
            $product = new Products($request->all());
            $user->products()->save($product);

            $request->session()->flash('success', 'this information has been saved successfully');
            DB::commit();
            return redirect('/');

        }catch (\Exception $e){
            $request->session()->flash('error', 'error');

            DB::rollBack();
            return redirect('/');
        }

    }

    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
    }
}
