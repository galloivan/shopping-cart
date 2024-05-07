<?php

namespace App\Http\Controllers;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Models\Item;
class ItemController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $items = Item::where('name', 'LIKE', "%{$query}%")->get();
    return response()->json($items);
}

public function addToCart(Request $request)
{
    $cartItem = CartItem::updateOrCreate(
        [
            'user_id' => auth()->id(),
            'item_id' => $request->item_id,
        ],
        ['quantity' => $request->quantity]
    );

    return back()->with('success', 'Item added to cart successfully!');
}

public function updateCart(Request $request, CartItem $cartItem)
{
    $cartItem->update(['quantity' => $request->quantity]);
    return back()->with('success', 'Cart updated successfully!');
}

public function removeCartItem(CartItem $cartItem)
{
    $cartItem->delete();
    return back()->with('success', 'Item removed from cart successfully!');
}
}
