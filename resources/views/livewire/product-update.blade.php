<div>
    @if (session('statusUpdate'))
        <div class="alert alert-success" role="alert">
            {{ session('statusUpdate') }}
        </div>
    @endif
    <form wire:submit.prevent="update">
        <input type="hidden" name="id" wire:model='productId'>
        <div class="form-group">
            <label for="name">Nama Produk</label>
            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="nama" required>
            @error('name')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="price">Harga Produk</label>
            <input wire:model="price" type="number" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="harga" required>
            @error('price')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <label for="stock">Stok Produk</label>
            <input wire:model="stock" type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" placeholder="stok" required>
            @error('stock')
                <span class="invalid-feedback">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
        </div>
        <button type="submit" class="btn btn-sm btn-dark">Submit</button>
    </form>
</div>
