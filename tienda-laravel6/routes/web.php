<?php

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

use Illuminate\Http\Request;
use App\Product;


Route::get('products', function () {
    $products =Product::orderBy('created_at','desc')->get();
    return view('products.index',compact('products'));
})->name('products.index');

Route::get('products/create', function () {
    return view('products.create');
})->name('products.create');

Route::post('products', function (Request $request) {

    $newProduct = new Product;
    $newProduct -> descripcion =   $request -> input('descripcion');
    $newProduct -> price = $request ->input('price');
    $newProduct ->save();
    return redirect()->route('products.index')->with('info','producto ingresado correctamente');
})->name('products.store');
Route::delete('products/{id}', function ($id) {
    $product = Product::findOrFail($id);
    $product->delete();
    return redirect()->route('products.index')->with('info','Producto eliminado exitosamente');

})->name('products.destroy');


Route::get('users/{id}/edit', function ($id) {
    $product = Product::findOrFail($id);
    return view('products.edit',compact('product'));

})->name('products.edit');

Route::put('products/{id}', function (Request $request,$id) {
$product= Product::findOrFail($id);
$product->descripcion=$request->input('descripcion');
$product->price=$request->input('price');
$product->save();
return redirect()->route('products.index')->with('info','Actualización Exitosa');
})->name('products.update');
