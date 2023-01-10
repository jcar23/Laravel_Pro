<?php

namespace App\Http\Controllers;

use App\Models\Basket;
use Illuminate\Http\Request;

class BasketsController extends Controller
{
    public function addToBasket(){
        $user = auth()->user();
        $userBaskets =$user->baskets;
        if($userBaskets -> count() >= env('MAX_IN_BASKET')){
            return redirect('/home')->with('mssg', 'You basket can not support more itens');
        }
        //return view('basket', ['' => $]);
    }

    public function index()
    {
        $basket_item = Basket::all();
        return view('baskets', ['allItens' => $basket_item]);
    }

    public function destroy($id){
        $basket_item = Baskets::findOrFail($id);
        $basket_item -> delete();

        //return redirect('/basket');
    }

    public function show($id){
        $basket_item = Baskets::findOrFail($id);
        return view('details', ['baskets' => $basket_item]);
    }

    // public function store(Request $request){
    //         $name = request('name');
    //         $des = request('des');
    //         $price = request('price');

    //         $url = "";
    //         if($request-> has('url')){
    //             $image = $request->file('url');

    //             $iname = 'basket_i'.'_'.time();
    //             $folder = '/img/';
    //             $fileName = $iname.'.'.$image->getClientOriginalExtension();
    //             $filePath = $folder . $fileName;

    //             $image ->storeAs($folder, $fileName, 'public');
    //             $url = "/storage" . $filePath;
    //         }

    //         $basket_item = new Baskets();
    //         $basket_item-> name = $name;
    //         $basket_item-> des = $des;
    //         $basket_item-> url = $url;
    //         $basket_item-> price = $price;
    //         $basket_item-> user_id = auth()->user()->id;
    //         $basket_item-> save();

    //         echo '<script>alert("Welcome to Geeks for Geeks")</script>';

    //         //return redirect('/basket');
    //     }
}
