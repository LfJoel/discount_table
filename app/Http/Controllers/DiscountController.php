<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\product;
use App\Models\shopping_cart;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DiscountController extends Controller
{
    public function index()
    {
        $discount = Discount::get();
        $sum = shopping_cart::sum('DiscountPrice');
        $product = product::get();
        $shopping_cart = shopping_cart::get();
        return view('index', compact('discount', 'product', 'shopping_cart'),['sum' => $sum]);
    }
    public function insert(Request $request)
    {
        $product = product::find($request->id);

        if ($product) {
            $productVendor = $product->Vendor;
            $productPrice = $product->Price;
            $productTags = $product->Tags;

            // Find a discount record with a matching vendor
            $discount = Discount::where('Vendor', $productVendor)->first();
            $specificdiscountData =$discount->$productTags;
            if ($discount) {
        
                // Access specific data from the $discount model
                $discountspecificData = $discount->$productTags;  

                // return "Matching vendor found: " . $discount."Specific Data: $specificData";
                $discountedPrice = $productPrice- ($productPrice * ($discountspecificData/ 100));

                $discountedPrice = round($discountedPrice, 2);
            
            }
      
            if ($product) {
               
                shopping_cart::create([
                    'Product_Name' => $product->Product_Name,
                    'OrgPrice' => $product->Price,
                    'Vendor' => $product->Vendor,
                    'DiscountPercentage' =>$specificdiscountData,
                    'DiscountPrice' => $discountedPrice
                ]);
            } 
            
            return back();
        }
    }
    public function delete($id)
    {
        $post = shopping_cart::find($id);
        $post->delete();
        return back();
    }
}
