<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function PHPUnit\Framework\assertDirectoryDoesNotExist;

class ProductsController extends Controller
{
    public function index()
    {
        $products = \App\Models\Products::orderBy('created_at', 'desc')->get();
        return view('products', ['products' => $products]);
    }

    public function save(ProductRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = \Auth::user();
            $product = new Products($request->all());
            $user->products()->save($product);

            $request->session()->flash('success', 'this information has been saved successfully');
            DB::commit();
            return redirect('/');

        }catch (\Exception $e){
            $request->session()->flash('error', `error ${$e->getMessage()}`);
            DB::rollBack();
            return redirect('/');
        }
    }

    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
        $request->session()->flash('update', 'this information has been updated successfully');
        return redirect('/');
    }
    public function delete(Request $request, Products $products)
    {
        $products->delete();
        $request->session()->flash('update', 'this information has been deleted successfully');
        return redirect('/');
    }
}
