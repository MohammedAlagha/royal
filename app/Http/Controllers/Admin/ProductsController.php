<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Yajra\DataTables\DataTables;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.products.index');
    }

    public function data()
    {
        $products = Product::get();

        return DataTables::of($products)->addColumn('action', function ($product) {

            return " <a class='btn btn-xs btn-success show' href='" . route('admin.products.show', $product->id) . "' data-value='" . $product->name . "'><i class='fa fa-eye'></i></a>
                    <a class='btn btn-xs btn-primary edit' href='" . route('admin.products.edit', $product->id) . "' data-value='" . $product->name . "'><i class='fa fa-edit'></i></a>
                    <a class='btn btn-xs btn-danger delete' data-id='" . $product->id. "' data-url='" . route('admin.products.destroy', $product->id) . "'><i class='fa fa-trash'></i></a>";

        })->editColumn('description', function ($product) {
            return substr($product->description, '0', '20') . '....';
        })->editColumn('image', function ($product) {
            return "<img src='" . asset("images/products/$product->image") . "' height='50' width='50'  alt='no image'>";
        })->rawColumns(['description','image', 'action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {

        $request_data = $request->except('image');
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('products/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }

        Product::create($request_data);

        session()->flash('success','Data Added Successfully');

        return redirect()->route('admin.products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit',compact('product'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        $request_data = $request->except('image');

        if ($product->image){
            Storage::disk('images')->delete("products/$product->image");
        }

        if ($request->hasFile('image') && $request->file('image')->isValid()){

            $image = Image::make($request->image)->resize('1140', '696')->encode('jpg');

            Storage::disk('images')->put('products/' . $request->image->hashName(), (string)$image, 'public');

            $request_data['image'] = $request->image->hashName();
        }

        $product->update($request_data);

        session()->flash('success','Data Edited Successfully');

        return redirect()->route('admin.products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        if ($product->image){
            Storage::disk('images')->delete("products/$product->image");
        }

        return response()->json(['message'=>'Deleted Successfully']);

    }
}
