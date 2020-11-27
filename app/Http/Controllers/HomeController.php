<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\User;
use App\Category;

class HomeController extends Controller
{
	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	/**
	* Show the application dashboard.
	*
	* @return \Illuminate\Contracts\Support\Renderable
	*/
	public function index()
	{
		return view('home');
	}
	
	public function question(){
		return view('question');
	}
	
	public function conditions(){
		return view('conditions');
	}
	
	public function delivery(){
		return view('delivery');
	}
	
	public function account($id){
		$user = User::all()->find($id);
		// Avec l'auth, verifier si l'id passée est égale a l'id de la session OU admin
		return view('account', ['user' => $user]);
	}
	
	public function orders($id){
		$carts = Cart::all()->where('user_id', $id);
		// Avec l'auth, verifier si l'id passée est égale a l'id de la session OU admin
		return view('orders', ['carts' => $carts]);
	}
	
	public function ordersDetail($id){
		$order = Cart::with(['user', 'cart_products'])->find($id);
		return view('ordersdetail', ['order' => $order]);
	}
	
	public function accountDetail($id){
		$user = User::all()->find($id);
		return view('accountdetail', ['user' => $user]);
	}
	
	public function accountUpdate(Request $request, $id){
		$user = User::find($id);
		$password_old = $user->password;
		$password_new = $request->get('actual_password');
		
		if($request->filled('actual_password')){
			if($request->filled('new_password')){
				if($request->filled('confirm_password')){
					if ($password_new == $password_old){
						if ($request->get('new_password') == $request->get('confirm_password')){
							$user->fill(['password'=>$request->get('new_password')]);
						}
					}
				}
			}
		}
		$user->fill([
			'first_name' => $request->get('first_name'),
			'last_name' => $request->get('last_name'),
			'email' => $request->get('email'),
			'phone' => $request->get('phone'),
			'address' => $request->get('address'),
			'zip_code' => $request->get('zip_code'),
			'city' => $request->get('city')
		]);
		$user->save();
		return redirect()->route('account.detail', ['id' => $user->id]);
	}
		
	public function category(){
		$category = Category::all();
		return view('category', ['categories' => $category]);
	}
	
	public function categoryDetail($id){
		$categories = Category::all();
		$category = Category::with(['products'])->find($id);
		return view('categoryDetail', ['category' => $category, 'menu' => $categories]);
	}
	
	public function contact(){
		return view('contact');
	}
	
	public function pendingCart($id){
		$pendingcart = Cart::with(['cart_products'])->find($id);
		return view('pendingcart', ['cart' => $pendingcart]);
	}
	
	public function checkout($id){
		$checkout = Cart::with(['cart_products', 'user'])->find($id);
		return view('checkout', ['cart' => $checkout]);
	}
}