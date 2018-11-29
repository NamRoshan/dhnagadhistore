<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\StoreProduct;
use App\Product;
use App\CategoryParent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Cart;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = Product::with('categories')->paginate(8);
        return view('admin.products.index', compact('products'));
    }
    public function allview(Product $slug){
                    if(!Session::has('cart')){
        return view('allview');
      }
      $cart = Session::get('cart');
      // //dd(Session::get('cart'));
      //  $products = Product::all();
      return view('allview', compact('slug','cart'));
    }
/**
     * Display Trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $products = Product::with('categories')->onlyTrashed()->paginate(3);
        return view('admin.products.index', compact('products'));
    }

    public function searchcontent(){
      $searchkey=\Request::get('tittle');
      $products=Product::where('tittle','like','%'.$searchkey.'%')->orderBy('id')->get();
      return view('products.searchcontent',['products'=>$products]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::with('childrens')->get();
        return view('admin.products.create', compact('categories'));
    }

        /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
              if(!Session::has('cart')){
 
      }
      $cart = Session::get('cart');

       //dd(Session::get('cart'));
       $categories = Category::with('childrens')->get();
       $categories= Category::with('parents')->get();
       $products = Product::with('categories')->paginate(8);
       return view('products.all', compact('categories','products','cart'));
    }
        public function sidebar()
    {
        if(!Session::has('cart')){
     
      }
      $cart = Session::get('cart');
      $featured = Product::where('featured', '=', 1)->get();
      $categories = Category::with('childrens')->get();
     $products = Product::with('categories')->paginate(100);
      return view('main', compact('categories','products','featured','cart'));
    }
    

    
    public function single(Product $product){
      return view('products.single', compact('product'));
    }


    public function addToCart(Product $product, Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $qty = $request->qty ? $request->qty : 1;
        $cart = new Cart($oldCart);
        $cart->addProduct($product, $qty);
        Session::put('cart', $cart);
        return back()->with('message', "Product $product->title has been successfully added to Cart");
    }

    public function cart(){

      if(!Session::has('cart')){
        return view('products.cart');
      }
      $cart = Session::get('cart');
      return view('products.cart', compact('cart'));
    }
    

   public function removeProduct(Product $product){
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeProduct($product);
      Session::put('cart', $cart);
      return back()->with('message', "Product $product->title has been successfully removed From the Cart");
   }

    public function updateProduct(Product $product, Request $request){
  
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->updateProduct($product, $request->qty );
      Session::put('cart', $cart);
      return back()->with('message', "Product $product->title has been successfully Updated in the Cart");
   }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProduct $request)
    {  
      $path = 'images/no-thumbnail.jpeg';
      if($request->has('thumbnail')){
       $extension = ".".$request->thumbnail->getClientOriginalExtension();
       $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
       $name = $name.$extension;
       $path = $request->thumbnail->storeAs('images', $name, 'public');
     }
       $product = Product::create([
           'tittle'=>$request->tittle,
           'slug' => $request->slug,
           'quantity'=>$request->quantity,
           'description'=>$request->description,
           'thumbnail' => $path,
           'status' => $request->status,
           'options' => isset($request->extras) ? $request->options : 0,
           'featured' => ($request->featured) ? $request->featured : 0,
           'price' => $request->price,
           'discount'=>$request->discount ? $request->discount : 0,
           'discount_price' => ($request->discount_price) ? $request->discount_price : 0,
       ]);
       if($product){
            $product->categories()->attach($request->category_id,['created_at'=>now(), 'updated_at'=>now()]);
            return redirect(route('admin.product.index'))->with('message', 'Product Successfully Added');
       }else{
            return back()->with('message', 'Error Inserting Product');
       }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      //      $searchkey=\Request::get('tittle');
      // $products=Product::where('tittle','like','%'.$searchkey.'%')->orderBy('id')->get();
       $categories = Category::with('childrens')->get();

 
       $products = Product::with('categories')->paginate(3);

        // DB::Table('table_name')->select('column1','column2')->where('id',1)->get(); 
    
       return view('admin.products.create',compact('product', 'categories'));

    }
    public function checkout(){
      return view('checkout');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(StoreProduct $request, Product $product)
    {

        if($request->has('thumbnail')){
            Storage::delete($product->thumbnail);
       $extension = ".".$request->thumbnail->getClientOriginalExtension();
       $name = basename($request->thumbnail->getClientOriginalName(), $extension).time();
       $name = $name.$extension;
       $path = $request->thumbnail->storeAs('images', $name, 'public');
       $product->thumbnail = $path;
           
         }
         $product->quantity=$request->quantity;
        $product->tittle =$request->tittle;
        //$product->slug = $request->slug;
        $product->description = $request->description;
        $product->status = $request->status;
        $product->featured = ($request->featured) ? $request->featured : 0;
        $product->price = $request->price;
        $product->discount = $request->discount ? $request->discount : 0;
        $product->discount_price = ($request->discount_price) ? $request->discount_price : 0;
        $product->categories()->detach();
        
        if($product->save()){
            $product->categories()->attach($request->category_id, ['created_at'=>now(), 'updated_at'=>now()]);
            
            return redirect(route('admin.product.index'))->with('message', "Product Successfully Updated!");
        }else{
            return back()->with('message', "Error Updating Product");
        }
    }
 public function recoverProduct($id)
    {
        $product = Product::with('categories')->onlyTrashed()->findOrFail($id);
        if($product->restore())
            return back()->with('message','Product Successfully Restored!');
        else
            return back()->with('message','Error Restoring Product');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
          if($product->categories()->detach() && $product->forceDelete()){
            Storage::delete($product->thumbnail);
            return back()->with('message','Product Successfully Deleted!');
        }else{
            return back()->with('message','Error Deleting Product');
        }
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function remove(Product $product)
    {
        if($product->delete()){
            return back()->with('message','Product Successfully Trashed!');
        }else{
            return back()->with('message','Error Deleting Product');
        }
    }

}
