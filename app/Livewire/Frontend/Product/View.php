<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class View extends Component
{
    public $product, $category, $quantityCount = 1;

    public function decrementQuantity()
    {
        if($this->quantityCount > 1){
            $this->quantityCount--;
        }
    }

    public function incrementQuantity()
    {
        if($this->quantityCount < 10){
            $this->quantityCount++;
        }
    }

    public function addToCart(int $productId)
    {
        if(Auth::check()){
            if($this->product->where('id', $productId)->where('status', '0')->exists()){
                if (Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->exists()){
                    $this->dispatch('message', [
                        'text' => 'Product Already Added',
                        'type' => 'warning',
                        'status' => 200
                    ]);
                }
                else{
                    if($this->product->quantity > 0){
                        if($this->product->quantity > $this->quantityCount){
                            Cart::create([
                                'user_id' => auth()->user()->id,
                                'product_id' => $productId,
                                'quantity' => $this->quantityCount
                            ]);

                            //$this->emit('CartAddedUpdated');

                            $this->dispatch('message', [
                                'text' => 'Product Added to Cart',
                                'type' => 'success',
                                'status' => 200
                            ]);
                        }
                        else {
                            $this->dispatch('message', [
                                'text' => 'Only '.$this->product->quantity.' Quantity is Available',
                                'type' => 'warning',
                                'status' => 404
                            ]);
                        }
                    }
                    else {
                        $this->dispatch('message', [
                            'text' => 'Out of stock',
                            'type' => 'warning',
                            'status' => 404
                        ]);
                    }
                }
            }
            else {
                $this->dispatch('message', [
                    'text' => 'Product does not exist ',
                    'type' => 'warning',
                    'status' => 404
                ]);
            }
        }else{
            $this->dispatch('message', [
                'text' => 'Please login to add to cart',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }

    public function mount($category, $product)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            'product' => $this->product,
            'category' => $this->category,
        ]);
    }
}
