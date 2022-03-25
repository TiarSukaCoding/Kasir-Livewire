<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $name,$price,$stock;

    public function render()
    {
        return view('livewire.product-create');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|max:20',
            'price' => 'required|min:4',
            'stock' => 'required'
        ]);

        $product = Product::create([
            'name' => $this->name,
            'price' => $this->price,
            'stock' => $this->stock
        ]);

        $this->resetInput();

        $this->emit('Add', $product);

        session()->flash('statusAdd', 'Produk '.$product['name'].' Berhasil ditambahkan!');
    }

    private function resetInput()
    {
        $this->name = null;
        $this->price = null;
        $this->stock = null;
    }
}
