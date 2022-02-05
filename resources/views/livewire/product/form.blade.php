@include('common.modalHead')

<div class="row">
    <div class="col-sm-12">
        <label class="form-label text-black"> Nombre</label>
        <div class="input-group mb-3">
        <input type="text" wire:model.lazy="name" class="form-control" placeholder="Ingrese nombre del producto" style="color:black;">
        </div>
        @error('name')  
            <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <label class="form-label text-black"> Descripcion</label>
        <div class="input-group mb-3">
        <textarea class="form-control" placeholder="Descripción del producto" wire:model.lazy="description" ></textarea>
        {{-- <input type="text" wire:model.lazy="name" class="form-control" placeholder="Ingrese nombre del producto" style="color:black;"> --}}
        </div>
        @error('description')  
            <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-12">
        <label class="form-label text-black"> Alertas / Inv. Minimo</label>
        <div class="input-group mb-3">
        <input type="number" wire:model.lazy="alerts" class="form-control" placeholder="10" style="color:black;">
        </div>
        @error('description')  
            <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-4">
        <label class="form-label text-black"> Precio</label>
        <div class="input-group mb-3">
        <span class="input-group-text">
            S/. 
        </span>
        {{-- <input type="text" wire:model.lazy="price" class="form-control" placeholder="Ingrese nombre del producto" style="color:black;"> --}}
        <input class="form-control" type="text" wire:model.lazy="price" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" data-type="currency" placeholder="100.00">
        </div>
        @error('price')  
            <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>

    <div class="col-sm-4">
        <label class="form-label text-black"> Stock</label>
        <div class="input-group mb-3">
        <span class="input-group-text">
            <span class="fas fa-edit text-dark">
            </span>
        </span>
        <input type="text" wire:model.lazy="stock" class="form-control" placeholder="Ingrese nombre del producto" style="color:black;">
        </div>
        @error('stock')  
            <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>

    <div class="col-sm-4">
        <label class="form-label text-black"> Categoria</label>
        <div class="input-group mb-3">
            {{-- <input type="text" wire:model.lazy="category_id" class="form-control" placeholder="Ingrese nombre del producto" style="color:black;"> --}}
            <select wire:model='category_id' class="form-control">
                <option value="Elegir" disabled>Elegir</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')  
            <span class="text-danger">{{$message}}</span> 
            @enderror
        </div>
    </div>
</div>

@include('common.modalFooter')
