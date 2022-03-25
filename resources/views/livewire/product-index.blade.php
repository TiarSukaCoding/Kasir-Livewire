<div>
    <div class="row">
        <div class="col">
            <select wire:model='paginate' name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5 baris</option>
                <option value="10">10 baris</option>
                <option value="15">15 baris</option>
            </select>
        </div>
        <div class="col">
            <input wire:model='search' id="search" type="text" class="form-control form-control-sm" placeholder="Cari">
        </div>
    </div>
    <hr>
    <table id="ProductTable" class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Harga</th>
                <th scope="col">Stok</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td scope="row">{{$product->id}}</td>
                <td>{{$product->name}}</td>
                @php
                    $price = "Rp " . number_format($product->price,2,',','.');
                    $stock = ($product->stock > 1) ? $product->stock." pcs" : $product->stock." pc";
                @endphp
                <td>{{$price}}</td>
                <td>{{$stock}}</td>
                <td>
                    <button class="btn btn-sm btn-secondary text-white" data-toggle="modal" data-target="#editModal" wire:click='getProduct({{$product->id}})'>Edit</button>
                    <button class="btn btn-sm btn-dark text-white" wire:click='destroy({{$product->id}})'>Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="col img-fluid">
        {{$products->links()}}
    </div>
</div>
