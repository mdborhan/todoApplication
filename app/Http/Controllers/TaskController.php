<?php

namespace App\Http\Controllers;

use App\Task;
use App\Category;
use App\Proposal;
use App\Product;
use App\Customer;
use Illuminate\Http\Request;
use Session;
use DB;

class TaskController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }
    public function index()
    {
        return view('home.index');

    }

    public function getCategory()
    {
        return view('category.index',[
            'categories'=>Category::all()
        ]);

    }


    public function addCategory(Request $request)
    {
        Category::saveCategoryName($request);
        return back()->withSuccess('Save Successfully.');


    }
    public function deleteCategory(Request $request)
    {
         $product = Product::where('category_id',$request->id);
         $category = Category::find($request->id);
        $product->delete();
        $category->delete();
        return back()->withSuccess('Delete Successfully.');

    }
//    products start
    public function getProducts()
    {
        $categories = Category::where('status',1)->get();
        $products = Product::all();
        return view('products.index',[
            'categories'=>$categories,
            'products'=>$products
        ]);
    }
    public function addProducts(Request $request)
    {
        Product::saveProuduct($request);
        return back()->withSuccess('Save Successfully.');

    }
//    products end
//  customer start
    public function getCustomer()
    {
        $customers = Customer::all();
        return view('customer.index',[
            'customers'=>$customers
        ]);
    }
    public function addCustomer(Request $request)
    {
        Customer::saveCustomer($request);
        return back()->withSuccess('Save Successfully.');

    }
//  customer end


//   proposal start
    public function getProposal()
    {
        $customers = Customer::all();
        $categories =Category::where('status',1)->get();
        return view('proposal.index',[
            'customers'=>$customers,
            'categories'=>$categories

        ]);
    }
    public  function postProposal(Request $request)
    {
        $data = Customer::find($request->customer_id);
        $data2 = Product::find($request->category_id);
//        $data2 =  DB::table('categories')
//            ->join('products','products.category_id','categories.id')
//            ->select('products.*','categories.category')
//            ->get();
        return   response()->json(array('body'=>$data,'body2'=>$data2));
//    return response()->json(['body' => $data,'body2'=>$data2]);
    }
    public function store(Request $request)
    {
        $proposal = new Proposal();
        $proposal->sku = $request->sku;
        $proposal->product = $request->product;
        $proposal->price = $request->price;
        $proposal->amount = $request->amount;
        return back()->withSuccess('Save Successfully.');

    }
//   proposal end
}
