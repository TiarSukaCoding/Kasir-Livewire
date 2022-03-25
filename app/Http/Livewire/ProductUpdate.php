<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductUpdate extends Component
{
    public $name, $price, $stock, $productId;

    protected $listeners = [
        'update' => 'setData'
    ];

    public function render()
    {
        return view('livewire.product-update');
    }

    public function setData($product)
    {
        $this->name = $product['name'];
        $this->price = $product['price'];
        $this->stock = $product['stock'];
        $this->productId = $product['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|max:20',
            'price' => 'required|min:4',
            'stock' => 'required'
        ]);

        if ($this->productId) {
            $product = Product::findOrFail($this->productId);
            $product->update([
                'name' => $this->name,
                'price' => $this->price,
                'stock' => $this->stock
            ]);
        }

        $this->emit('updated', $product);

        session()->flash('statusUpdate', 'Produk '.$product['name'].' Berhasil diubah!');
    }
}
