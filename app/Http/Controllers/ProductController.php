<?php

namespace App\Http\Controllers;

use App\Lijst;
use App\Product;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    public function add(Request $request, Lijst $lijst)
    {
        $this->validate($request, [
            'quantity' => 'required',
            'unit_id' => 'required',
            'product_name' => 'required',
        ]);

        $product = Product::where('name', $request->product_name)->first();    

        if(!$product){
            $product = new Product;
            $product->name = $request->product_name;
            $product->save();
        }

        $lijst_product_relation = $lijst->products()->where('id',$product->id)->exists();

        if($lijst_product_relation){
            return Redirect::back()->with('existing', $product->id)->withErrors(['Dit product bestaat al in uw lijst.']);
        }

        $lijst->products()->attach($product->id, ['quantity' => $request->quantity]);

        $unit = Unit::find($request->unit_id);

        $product_unit_relation = $product->unit()->where('id',$unit->id)->exists(); 
        
        if(!$product_unit_relation){
            $product->unit()->attach($unit->id);
        }
     
        return redirect('/lijst/'.$lijst->id.'/edit');
    }

    public function delete(Request $request, Lijst $lijst)
    {
        $product = Product::find($request->product_id);

        $lijst->products()->detach($request->product_id);
        $product->unit()->detach($request->unit_id);

        return redirect('/lijst/'.$lijst->id.'/edit');
    }
}
