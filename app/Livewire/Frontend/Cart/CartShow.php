<?php

namespace App\Livewire\Frontend\Cart;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Livewire\Component;

class CartShow extends Component
{
    public $cart, $totalPrice = 0;

    public function decrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){

            if($cartData->product->quantity > $cartData->quantity){
                $cartData->decrement('quantity');

                $this->dispatch('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }

            else{
                $this->dispatch('message', [
                    'text' => 'Only '.$cartData->product->quantity.'Quantity Available',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else{
            $this->dispatch('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function incrementQuantity(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)->where('user_id', auth()->user()->id)->first();
        if($cartData){

            if($cartData->product->quantity > $cartData->quantity){
                $cartData->increment('quantity');

                $this->dispatch('message', [
                    'text' => 'Quantity Updated',
                    'type' => 'success',
                    'status' => 200
                ]);
            }

            else{
                $this->dispatch('message', [
                    'text' => 'Only '.$cartData->product->quantity.'Quantity Available',
                    'type' => 'success',
                    'status' => 200
                ]);
            }
        }
        else{
            $this->dispatch('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 404
            ]);
        }
    }

    public function removeCartItem(int $cartId)
    {
        $cartRemoveData = Cart::where('user_id', auth()->user()->id)->where('id', $cartId)->first();

        if($cartRemoveData){
            $cartRemoveData->delete();

            //$this->emit('CartAddedUpdated');

            $this->dispatch('message', [
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);
        }
        else{
            $this->dispatch('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function placeOrder()
    {
        $order = Order::create([
            'user_id' => auth()->user()->id
        ]);

        foreach ($this->cart as $cartItem){
            $orderItems = OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $cartItem->product_id,
                'quantity' => $cartItem->quantity,
                'price' => $cartItem->product->selling_price,
            ]);
            session()->flash('message', 'Order Placed Successfully');
            $cartItem->product()->where('id', $cartItem->product_id)->decrement('quantity', $cartItem->quantity);
        }

        return $order;
    }
    public function codOrder()
    {
        $codOrder = $this->placeOrder();
        if($codOrder){

            Cart::where('user_id', auth()->user()->id)->delete();

            $this->dispatch('message', [
                'text' => 'Cart Item Removed Successfully',
                'type' => 'success',
                'status' => 200
            ]);

            return $this->redirect('thank-you');
        }
        else{
            $this->dispatch('message', [
                'text' => 'Something Went Wrong!',
                'type' => 'error',
                'status' => 500
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where('user_id', auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [ 'cart' => $this->cart]);
    }
}
