<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Products\CreateProductRequest;
use App\Http\Requests\Products\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $category;
    protected $product;
    protected $productDetail;

    public function __construct(Product $product, Category $category, ProductDetail $productDetail)
    {
        $this->product = $product;
        $this->category = $category;
        $this->productDetail = $productDetail;
    }



    public function index()
    {
        $products = $this->product->latest('id')->paginate(5);

        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {

        $dataCreate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        $product = Product::create($dataCreate);
        $dataCreate['image'] = $this->product->saveImage($request);

        $product->images()->create(['url' => $dataCreate['image']]);
        $product->categories()->attach($dataCreate['category_ids']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size->size, 'quantity' => $size->quantity, 'product_id' => $product->id];
        }
        ProductDetail::insert($sizeArray);
        return redirect()->route('products.index')->with(['message' => 'create product success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->product->findOrFail($id);
        return view('admin.products.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product->with(['details', 'categories'])->findOrFail($id);
        $categories = $this->category->get(['id', 'name']);
        return view('admin.products.edit', compact('categories', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $dataUpdate = $request->except('sizes');
        $sizes = $request->sizes ? json_decode($request->sizes) : [];
        $product = $this->product->findOrFail($id);

        $currentImage = $product->images ? $product->images->first()->url : '';
        $dataUpdate['image'] = $this->product->updateImage($request, $currentImage);
        
        $product->update($dataUpdate);

        $product->images()->create(['url' => $dataUpdate['image']]);
        $product->assignCategory($dataUpdate['category_ids']);
        $sizeArray = [];
        foreach ($sizes as $size) {
            $sizeArray[] = ['size' => $size->size, 'quantity' => $size->quantity, 'product_id' => $product->id];
        }
        $product->details()->delete();
        $this->productDetail->insert($sizeArray);
        return redirect()->route('products.index')->with(['message' => 'Update product success']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product->findOrFail($id);
        $product->delete();
        $product->details()->delete();
        $imageName = $product->images->count() > 0 ? $product->images->first()->url :'';
        $this->product->deleteImage($imageName);
        return redirect()->route('products.index')->with(['message' => 'Delete product success']);

       

    }
}