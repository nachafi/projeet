<?php

namespace App\Http\Controllers\Site;


use Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }
    public function index(Request $request)
    {   
        
        $products = Product::OrderBy('name', 'asc')->paginate(3);
        
        return view('site.pages.products', compact('products'));
       
}
public function search( Request $request) {
    $request->validate([
        'q' => 'required'
    ]);
    $q = $request->q;
    $filteredProducts = Product::where('name', 'like', '%' . $q . '%')->get();
    if ($filteredProducts->count()) {
        return view('site.pages.products')->with(
            'products' ,  $filteredProducts
        );
    } else {
        
        return redirect('/products')->with(
            'status' , 'search failed ,, please try again'
  );
    }
    
}
    public function show($slug)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
       
        return view('site.pages.product', compact('product', 'attributes'));
    }

    public function addToCart(Request $request)
    {
        $product = $this->productRepository->findProductById($request->input('productId'));
        $options = $request->except('_token', 'productId', 'price', 'qty');

        Cart::add(uniqid(), $product->name, $request->input('price'), $request->input('qty'), $options);

        return redirect()->back()->with('message', 'Item added to cart successfully.');
    }
    
}
