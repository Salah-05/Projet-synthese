<?php

namespace App\Http\Controllers;

use App\Models\addresse;
use App\Models\Category;
use App\Models\cmds;
use App\Models\Product;
use App\Models\utilisateures;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BiggController extends Controller
{
    public function about(){
        return view('about');
    }
    public function blog_details(){
        return view('blog-details');
    }
    public function blog(){
        return view('blog');
    }
    public function cart(){
        $id = Auth::guard('user')->id();
        $commands = cmds::with('products')->where('id',$id)->get();
        return view('cart',compact('commands'));
    }
    public function checkout(){
        return view('checkout');
    }
    public function contact(){
        return view('contact');
    }
    public function index(Request $request){
        $product = Product::with('category')->inRandomOrder()->take(8)->get();
        $Category = Category::all();
        return view('index',compact('product','Category'));
    }
    public function login_store(Request $request)
{
    if (Auth::guard('user')->check()) {
        $request->session()->flush();
        Auth::guard('user')->logout();
    }

    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $email = $request->input('email');
    $password = $request->input('password');
    $credentials = ['email' => $email, 'password' => $password];

    if (Auth::guard('user')->attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('index');
    } else {
        return redirect()->back()->withErrors('Vous devez créer un compte.');
    }
}

    public function login(){
        return view('login');
    }
    public function my_account(){
        return view('my-account');
    }
    public function privacy(){
        return view('privacy-policy');
    }
    public function app(){
        return view('app');
    }
    public function product_details(Request $request){
        $product = Product::find($request->id);
        return view('product-details', compact('product'));
        // return dd($product);
    }
    public function autocomplete(Request $request){
        $search = $request->get('term');
    
        $productNames = Product::where('name', 'like', '%' . $search . '%')->pluck('name')->toArray();
        
        $categoryNames = Category::where('name', 'like', '%' . $search . '%')->pluck('name')->toArray();
        
        $data = array_merge($productNames, $categoryNames);
        
        return response()->json($data);
    }
    public function search(Request $request){
        $searchQuery = $request->input('search');
    
        $product = Product::where('name', 'like', '%' . $searchQuery . '%')
                            ->orWhereHas('category', function($categoryQuery) use ($searchQuery) {
                                $categoryQuery->where('name', 'like', '%' . $searchQuery . '%');
                            })
                            ->paginate(12);
        $productCount = $product->count();
        $minimumprice = $product->min('price');
        $maximumprice = $product->max('price');
        $Category = Category::all();

    
        // Render the search results view and pass the products
        return view('shop', compact('product','productCount','minimumprice', 'maximumprice','searchQuery','Category'));
    }
    
    public function filter(Request $request){
        $searchQuery = $request->input('searchQuery');
        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');
        $minimumprice = $minPrice;
        $maximumprice = $maxPrice;
        // $product = Product::where('name', 'like', '%' . $searchQuery . '%')
        //                     ->orWhereHas('category', function($categoryQuery) use ($searchQuery) {
        //                         $categoryQuery->where('name', 'like', '%' . $searchQuery . '%');
        //                     })->whereBetween('price', [$minPrice, $maxPrice])
        //                     ->paginate(12);
        $product = Product::where('name', 'like', '%' . $searchQuery . '%')->whereBetween('price', [$minPrice, $maxPrice])->paginate(12);
        $Category = Category::all();
       
        $productCount = $product->count();
    
        // Query products within the specified price range
        return view('shop', compact('product','productCount','minimumprice','maximumprice','searchQuery','Category'));
        // return dd($minPrice,$maxPrice);
        
    }
    
    public function add_product(Request $request)
    {
        function generateRandomCode($length = 4)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $code = '';
            $max = strlen($characters) - 1;
            for ($i = 0; $i < $length; $i++) {
                $code .= $characters[mt_rand(0, $max)];
            }
            return $code;
        }
    
        if (Auth::guard('user')->check()) {
            $user = Auth::guard('user')->user();
            
            $product = Product::findOrFail($request->id);
    
            $command = new cmds();
            $command->name = $product->name;
            $command->command_code = generateRandomCode();
            $user->commands()->save($command); 
    
            $command->products()->attach($product->id);
    
            return redirect()->back()->with('success', 'Command added successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour ajouter une commande.');
        }
    }
    
    
    
    public function register(){
        return view('register');
    }
    public function shop(){
        // $product=Product::paginate(9);
        $product = Product::with('category')->inRandomOrder()->take(12)->paginate(12);
        $productCount = $product->count();
        $minimumprice = $product->min('price');
        $maximumprice = $product->max('price');
        $Category = Category::all();
        return view('shop',compact('product','productCount','minimumprice','maximumprice','Category'));
    }
    public function terms_conditions(){
        return view('terms-conditions');
    }
    public function signup(){
        return view('signup');
    }

public function signup_store(Request $request)
{
    $request->validate([
        'name' => 'required|max:50',
        'email' => 'required|unique:utilisateures,email',
        'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        'address' => 'required|max:100',
        'city' => 'required|max:30',
        'country' => 'required',
        'password' => 'required|min:8|max:100',
    ]);

    $name = $request->input('name');
    $email = $request->input('email');
    $number = $request->input('number');
    $address = $request->input('address');
    $city = $request->input('city');
    $country = $request->input('country');
    $password = $request->input('password');

    // Create user
    $user = utilisateures::create([
        'name' => $name,
        'email' => $email,
        'phone_number' => $number,
        'password' => bcrypt($password),
    ]);

    // Create address
    $user->addresses()->create([
        'address' => $address,
        'city' => $city,
        'country' => $country,
    ]);

    $credentilas = ['email'=>$email,'password'=>$password];
    if(Auth::guard('user')->attempt($credentilas)){
        $request->session()->regenerate();
        return redirect()->route('index')->with('success','Inscription réussie');

        // return response()->json(['sucess','you are now logged in']);

    }
    else{
    return response()->json(['no','no ']);

    }

    // Redirect to home or dashboard after authentication
    // return redirect()->route('shop');
}
    
    public function logout(Request $request){
        if(Auth::guard('user')->check()){
            $request->session()->flush();
            Auth::guard('user')->logout();
            return response()->json(['sucess','you are now logged out']);
        }
        else{
            return response()->json(['faild','you have to log in first']);
        }
        
    }

}
