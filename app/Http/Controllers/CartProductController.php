<?php

namespace App\Http\Controllers;

use App\CartProduct;
use App\Cart;
use Illuminate\Http\Request;

class CartProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $request->validate([
          'quantity'=>'required'
      ]);
      $id = $request->get('product_id');

      $user_id = 1; //Pour les tests. A changer une fois que l'auth sera faite
      $cartExists = Cart::where('user_id', $user_id)->where('status', 'pending')->count(); //Compter le nombre de paniers qui ont l'id de l'utilisateur ET le statut "pending"
      $lastInsertedId = 0; //Initilisation de l'id du panier

      if ($cartExists == 0) { //S'il n'existe pas, on le créé
        $cart = new Cart([
            'status' => 'pending',
            'user_id' => $user_id
        ]);
        $cart->save();
        $lastInsertedId = $cart->id; //et on récupère son id
      } else { // Si le panier existe, on récupère son id
        $queryId = Cart::where('user_id', $user_id)->where('status', 'pending')->first();
        $lastInsertedId = $queryId->id;
      }

      $productExists = CartProduct::where('cart_id', $lastInsertedId)->where('product_id', $id)->count(); //Savoir si ce produit est déjà présent
      $quantity = $request->get('quantity');

      if($productExists == 1) { //Si le produit est présent, on update la quantité
        $currentQuantity = CartProduct::where('cart_id', $lastInsertedId)->where('product_id', $id)->get(['quantity']);
        $quantity += $currentQuantity[0]->quantity;
        CartProduct::where('cart_id', $lastInsertedId)->where('product_id', $id)->update(['quantity' => $quantity]);
      } else { //Sinon créé le produit dans le cart
        $cart = new CartProduct([
            'quantity' => $quantity,
            'product_id' => $id,
            'cart_id' => $lastInsertedId
        ]);
        $cart->save();
      }

      return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function show(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function edit(CartProduct $cartProduct)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartProduct  $cartProduct
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartProduct $cartProduct)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $product_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($product_id)
    {
      $product = CartProduct::all()->find($product_id);
      $cart_id = $product->cart_id;
      $product->delete();
      $cartExists = CartProduct::where('cart_id', $cart_id)->count(); // S'il n'y a plus le cart_id spécifié dans CartProduct
      if($cartExists == 0) {
        $cart = Cart::all()->find($cart_id);
        $cart->delete();  //On supprimer le cart en question de Cart
      }
      return redirect()->route('Cart.index'); 
    }
}
