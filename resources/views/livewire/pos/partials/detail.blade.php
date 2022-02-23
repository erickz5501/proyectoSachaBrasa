<div class="connect-sorting">
    <div class="connect-sorting-content">
        <div class="card simple-title-task ui-sortable-handle">
            <div class="card-body">

            <ul class="nav nav-tabs">
                <li class="nav-item active">
                    <a data-toggle="tab" type="button" class="nav-link" href="#tabPedido">Pedido</a>
                </li>
                <li class="nav-item">
                    <a data-toggle="tab" type="button" class="nav-link" href="#tabProductos">Productos</a>
                </li>
            </ul>

            <div class="tab-content">
                <div id="tabPedido" class="tab-pane fade">
                    @if ($total > 0)
                        <div class="table responsive tblscroll" style=" max-height: 650px; overflow: hidden">
                            <table class="table table bordered table striped mt-1">
                                <thead class="text-white" style=" background: #3B3F5C " >
                                    <tr>
                                    <th width="10%"></th>
                                    <th class="table-th text-left text-white">DESCRIPCIÓN</th>
                                    <th class="table-th text-left text-white">PRECIO</th>
                                    <th width="13%" class="table-th text-left text-white">CANT</th>
                                    <th class="table-th text-left text-white">IMPORTE</th>
                                    <th class="table-th text-left text-white">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cart as $item)
                                    <tr>
                                        <td class="text-center table-th"></td>
                                        <td> {{$item->name}} </td>
                                        <td> S/. {{ number_format($item->price,2) }} </td>

                                        <td>
                                            <input type="number" id="r{{$item->id}}" 
                                            wire:change="updateQty({{$item->id}}, $('#r' + {{$item->id}}).val() )" 
                                            style="font-size: 1rem!important" class="form-control text-center" 
                                            value="{{$item->quantity}}">
                                        </td>

                                        <td class="text-center">
                                            <h6>
                                                S/. {{ number_format($item->price * $item->quantity,2)}}
                                            </h6>
                                        </td>

                                        <td class="text-center">

                                            <button class="btn btn-dark mbmobile" onclick="Confirm('{{ $item->id}}', 'removeItem', '¿CONFIRMAS ELIMINAR EL REGISTRO?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                            <button class="btn btn-dark mbmobile" wire:click.prevent="decreseQty({{$item->id}})">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button class="btn btn-dark mbmobile" wire:click.prevent="increaseQty({{$item->id}})">
                                                <i class="fas fa-plus"></i>
                                            </button>

                                        </td>
                                        
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <h5 class="text-center-text-muted">
                            Agregar Productos a la venta
                        </h5>
                    @endif
                </div>

                <div id="tabProductos" class="tab-pane fade"> <br>
                    <div class="widget-content">
                
                        <ul class="nav nav-tabs">
                            @foreach($categories as $category)
                            <li class="nav-item">
                                <a data-toggle="tab" href="#cat{{$category->id}}" type="button" class="nav-link">{{$category->name}}</a>
                            </li>
                            @endforeach
                        </ul>
                        <br>
                        <div class="tab-content">
                            @foreach($categories as $category)
                            <div id="cat{{$category->id}}" class="tab-pane fade">
                                {{-- <div class="table-responsive">
                                    <table class="table table-bordered table-striped mt-1" style="text-align:center;">
                                        <thead class="text-white" style=" background: #e05f1a ">
                                            <tr >
                                                <th class="table-th text-white text-center">Nombre</th>
                                                <th class="table-th text-white text-center">Descripción</th>
                                                <th class="table-th text-white text-center">Precio</th>
                                                <th class="table-th text-white text-center">Stock</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                @foreach($products as $product)
                                                    @if($product->category->id == $category->id)
                                                        <tr>
                                                            <td><h6> {{$product->name}}</h6></td>
                                                            <td ><h6 class="text-center"> {{$product->description}}</h6></td>
                                                            <td><h6 class="text-center">S/. {{$product->price}}</h6></td>
                                                            <td><h6 class="text-center"> {{$product->stock}} </h6></td>
                                                            
                                                        </tr>
                                                     @endif
                                                @endforeach
                                        </tbody>
                                    </table>
                                    
                                </div> --}}
                                <div class="row">
                                    @foreach ($products as $product)
                                        @if ($product->category->id == $category->id)
                                            <div class="col-sm-4 card">
                                                <div class="card-body">
                                                    <h3 class="card-title">{{ $product->name }}</h3>
                                                    <span class="card-text">S/. {{ $product->price }}</span>
                                                    <form action="" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $product->id }}" name="id">
                                                        <input type="hidden" value="{{ $product->name }}" name="name">
                                                        <input type="hidden" value="{{ $product->price }}" name="price">
                                                        <input type="hidden" value="1" name="quantity">
                                                        <button class="btn btn-success rounded">Add To Cart</button>
                                                    </form>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    
                                </div>
                            </div>
                        @endforeach
                        </div>
    
                    </div>
                </div>
            </div>

            <div wire:loading.inline wire:target="saveSale" >
                <h4 class="text-danger text-center">
                Guardando Venta...
                </h4>
            </div>
            </div>
        </div>
    </div>
</div>