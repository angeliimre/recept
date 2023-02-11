<?php

use Illuminate\Support\Facades\Route;
use App\Models\Food;
use App\Models\Material;
use Illuminate\Http\Request;
use App\Models\FoodMaterial;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    
    return view('welcome')->with("kaja",Food::get())->with("hozzavalo",Material::get());
});
Route::post('/fozes', function (Request $req) {
    session()->forget("ingr");
    $req->session()->put("kivalasztott",intval($req["kaja"]));
    return view('welcome')->with("kaja",Food::get())->with("hozzavalo",Material::get())->with("hozzavalok",Food::find($req->session()->get("kivalasztott")));
});
Route::post('/hozzaadas', function (Request $req) {
    $req->session()->put("ingr",intval($req["ingredient"]));
    return view('welcome')->with("kaja",Food::get())->with("hozzavalo",Material::get())->with("hozzavalok",Food::find($req->session()->get("kivalasztott")))->with("ingr",Material::find($req->session()->get("ingr")));
});
Route::post('/hozzafuzes', function (Request $req) {
    $etel=session()->get("kivalasztott");
    $osszetevo=session()->get("ingr");
    $mennyiseg=$req["mennyiseg"];
    $fm=new FoodMaterial();
    $fm->food_id=$etel;
    $fm->material_id=$osszetevo;
    $fm->amount=$mennyiseg;
    $fm->save();
    return view('welcome')->with("kaja",Food::get())->with("hozzavalo",Material::get())->with("hozzavalok",Food::find($req->session()->get("kivalasztott")))->with("ingr",Material::find($req->session()->get("ingr")));
});
Route::post('/del', function (Request $req) {
    $del=intval($req["torlendo"]);
    FoodMaterial::where("id",$del)->delete();
    return view('welcome')->with("kaja",Food::get())->with("hozzavalo",Material::get())->with("hozzavalok",Food::find($req->session()->get("kivalasztott")))->with("ingr",Material::find($req->session()->get("ingr")));
});