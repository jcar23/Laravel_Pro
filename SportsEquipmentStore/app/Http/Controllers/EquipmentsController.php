<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditEquipRequest;
use App\Models\Equipments;
use App\Models\brand_model;
use Illuminate\Http\Request;

class EquipmentsController extends Controller
{
    public function index(){
        $brands = brand_model::all();
        $equipments = Equipments::all();

        return view('equipments',['equipments' => $equipments, 'brands' =>$brands]);
    }

    public function show($id){
        $equipment = Equipments::findOrFail($id);
        return view('details', ['equipment' => $equipment]);
    }

    public function create(){
        $brands = brand_model::all();

        $user = auth()->user();
        $userEquipments =$user->equipments;
        if($userEquipments -> count() >= env('MAX_PRODUCTS')){
            return redirect('/profile')->with('mssg', 'thanks');
        }
        return view('create', ['brands' => $brands]);
    }

    public function store(Request $request){

        $validateData = $request->validate([
            'name' => 'required',
            'url' => 'required|image|mimes:jpeg,png,jpg,gif|max:5000'
        ]);

        $name = request('name');
        $des = request('des');
        $price = request('price');
        $brand = request('brandModel');

        $url = "";
        if($request-> has('url')){
            $image = $request->file('url');

            $iname = 'equip'.'_'.time();
            $folder = '/img/equipments/';
            $fileName = $iname.'.'.$image->getClientOriginalExtension();
            $filePath = $folder . $fileName;

            $image ->storeAs($folder, $fileName, 'public');
            $url = "/storage" . $filePath;
        }

        $equipment = new Equipments();
        $equipment-> name = $name;
        $equipment-> des = $des;
        $equipment-> url = $url;
        $equipment-> price = $price;
        $equipment-> brand_model_id = $brand;
        $equipment-> created_by = auth()->user()->id;
        $equipment-> save();

        //alert("New Equipment added");
        return redirect('/equipments/create')->with('mssg',"Equipment Created Sucessfully");

    }

    public function update($id, EditEquipRequest $request){
        $name = request('name');
        $des = request('des');
        $price = request('price');
        $brand = request('brandModel');

        $changed =  request('changed')=='true'?1:0;
        $equipment = Equipments::findOrFail($id);

        if($changed == 'true'){
            $url = "";
            if($request-> has('url')){
                $image = $request->file('url');

                $iname = 'equip'.'_'.time();
                $folder = '/img/equipments/';
                $fileName = $iname.'.'.$image->getClientOriginalExtension();
                $filePath = $folder . $fileName;

                $image ->storeAs($folder, $fileName, 'public');
                $url = "/storage" . $filePath;

            }
            $equipment->url = $url;
        }
        $equipment-> name = $name;
        $equipment-> des = $des;
        $equipment-> price = $price;
        $equipment-> brand_model_id = $brand;

        $equipment-> save();
        return redirect('/equipments')->with('mssg', 'Produto criado');
    }


    public function destroy($id){
        $equipment = Equipments::findOrFail($id);
        $equipment -> delete();

        return redirect('/equipments');

    }

    public function edit($id){
        $brands = brand_model::all();
        $equipment = Equipments::findOrFail($id);
        return view ('create', ['equipment'=> $equipment, 'brands' => $brands]);
    }

    public function equipmentByBrand($id){
        $brands = brand_model::all();
        $brand = brand_model::findOrFail($id);
        $equipments = $brand-> equipments;

        return view('equipments', ['equipments' => $equipments, 'brands' =>$brands, 'actBrand' =>$id]);
    }

    public function search(Request $request)
    {
        $brands = brand_model::all();
        $equipment = Equipments::where('name','like',"%".$request->search."%")->get();

        return view('equipments', ['equipments' => $equipments, 'brands' =>$brands]);
    }

    ///
}
