<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BlogResource;
use App\Http\Resources\ProductCategoryResource;
use App\Http\Resources\ProductOrderResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductReturnResource;
use App\Http\Resources\ShopPackageOrderResource;
use App\Http\Resources\ShopPackageResource;
use App\Models\Blog;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductReturn;
use App\Models\ShopPackage;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
       $product = Product::with('productCategory')->get();
       return $this->apiResponseResourceCollection(200,'Product List',ProductResource::collection($product));
    }
    public function show(Product $product)
    {
       
        return $this->apiResponse(200, 'Product Details', ProductResource::make($product));
    }
    public function categories()
    {
       $categories=ProductCategory::with('products')->get();
       return $this->apiResponseResourceCollection(200,'Category List',ProductCategoryResource::collection($categories));
    }
    public function category($id)
    {
        $categories = ProductCategory::with('products')->findOrfail($id);
        return $this->apiResponse(200, 'Category Products', ProductCategoryResource::make($categories));
    }
    public function order(Request $request)
    {
      $request->validate([
          'product_id'      =>'required|exists:products,id',
          'quantity'        =>'required',
          'amount'          =>'required',
          'delivery_type'   =>'required',
          'paid_status'     =>'required', 
          'trx_id'          =>'nullable|string',
          'prove_document'  =>'nullable'

      ]);
      $transaction_id=null;
      if($request->delivery_type==Order::ONLINE)
      {
          $prove_document
            = uploadFile($request->file('prove_document'), 'transaction');
      $transaction =  Transaction::create([
            'trx_id'    => $request->trx_id,
            'prove_document' =>  $prove_document,
            'amount'        => $request->amount

        ]);
      $transaction_id=$transaction->id;
      }
     
     auth()->user()->orders()->create([
        'product_id'    =>$request->product_id,
        'quantity'      =>$request->quantity,
        'delivery_type' =>$request->delivery_type,
        'paid_status'   =>$request->paid_status,
        'amount'        =>$request->amount,
        'transaction_id'=>$transaction_id
     ]);
     return $this->apiResponse(201,'Order Submitted To Admin');
      
    }

    public function blogList()
    {
        $blogs=Blog::where('status',true)->get();
        return $this->apiResponseResourceCollection(200,'Blog List',BlogResource::collection($blogs));
    }
    public function blog(Blog $blog)
    {
       return $this->apiResponse(200,'Blog Details',BlogResource::make($blog));
    }
    public function top()
    {
        $product = Product::with('productCategory')->orderBy('price','DESC')->take(10)->get();
        return $this->apiResponseResourceCollection(200, 'Product List', ProductResource::collection($product));
    }
    public function productReturnStore(Request $request)
    {
        $input = $request->validate([
            'order_id'  => 'required|exists:orders,id',
            'reason'    => 'required'
        ]);
        auth()->user()->profile->productReturn()->create($input);
        return $this->apiResponse(201,'Product Return Request Sent Successfully');
    }
    public function orderList()
    {
       $orders = auth()->user()->orders;
      return $this->apiResponseResourceCollection(200,'Order List',ProductOrderResource::collection($orders));
    }
    public function productReturnList()
    {
        $list = auth()->user()->profile->productReturn;
        return $this->apiResponseResourceCollection(200,'Order Return List',ProductReturnResource::collection($list));
    }
    public function package()
    {
        
        $packages = ShopPackage::where('status',0)->with('packageProduct.product.productReviews')->paginate(10);
        
        return $this->apiResponseResourceCollection(200,'Shop Packages',ShopPackageResource::collection($packages));
    }
    public function buyPackage(Request $request)
    {
       $input = $request->validate([
           'shop_package_id'    => 'required|exists:shop_packages,id',
           'quantity'           => 'required',
       ]);
       auth()->user()->profile->shopPackageOrder()->create($input);

       return $this->apiResponse(201,'Purchase Completed Successfully');
    }
    public function packageOrders()
    {
        $orders = auth()->user()->profile->shopPackageOrder->load('shopPackage.packageProduct.product');
        return $this->apiResponseResourceCollection(200,'My Orders',ShopPackageOrderResource::collection($orders));
    }
}
