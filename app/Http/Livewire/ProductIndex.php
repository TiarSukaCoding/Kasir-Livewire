<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductIndex extends Component
{
    use WithPagination;

    public $paginate = 5;
    public $search;

    protected $listeners = [
        'Add' => 'add',
        'updated' => 'update'
    ];

    public function render()
    {
        return view('livewire.product-index',[
            'products' => $this->search === null ?
            Product::latest()->simplePaginate($this->paginate) :
            Product::latest()->where('name','like','%'.$this->search.'%')->simplePaginate($this->paginate)
        ]);
    }

    public function getProduct($id)
    {
        $product = Product::findOrFail($id);
        $this->emit('update',$product);
    }

    public function destroy($id)
    {
        if ($id) {
            $data = Product::findOrFail($id);
            $data->delete();
            session()->flash('status', 'Produk Berhasil dihapus!');
        }
    }

    public function add($product)
    {
        # listen add product
    }

    public function update($product)
    {
        # listen update product
    }
}
