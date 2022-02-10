<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="cart-title">
                    <b> Mesas | {{$pagetitle}}</b>
                </h4>
            </div>

            <div class="widget-content">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_2 text-center" data-toggle="modal" data-target="#theModalSale" type="button">
                                Mesa 1
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_2 text-center" data-toggle="modal" data-target="#theModalSale" type="button">
                                Mesa 2
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_2 text-center" data-toggle="modal" data-target="#theModalSale" type="button">
                                Mesa 3
                            </button>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_2 text-center" data-toggle="modal" data-target="#theModalSale" type="button">
                                Delivery
                            </button>
                        </div>
                    </div>      
                </div> 
                <br><br>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="">
                            <div class=""">
                                <h4 class="cart-title">
                                    <b> Productos </b>
                                </h4>
                            </div>
                
                            <div class="widget-content">
                
                                <ul class="nav nav-tabs">
                                    @foreach($categories as $category)
                                    <li class="nav-item">
                                        <a data-toggle="tab" href="#cat{{$category->id}}" type="button" class="nav-link">{{$category->name}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                                
                                <div class="tab-content">
                                    @foreach($categories as $category)
                                    <div id="cat{{$category->id}}" class="tab-pane fade">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped mt-1" style="text-align:center;">
                                                <thead class="text-white" style=" background: #e05f1a ">
                                                    <tr >
                                                        <th class="table-th text-white text-center">Nombre</th>
                                                        <th class="table-th text-white text-center">Descripción</th>
                                                        <th class="table-th text-white text-center">Precio</th>
                                                        <th class="table-th text-white text-center">Stock</th>
                                                        <th class="table-th text-white text-center">Inv. Min</th>
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
                                                                    <td><h6 class="text-center"> {{$product->alerts}} </h6></td>
                                                                </tr>
                                                             @endif
                                                        @endforeach
                                                </tbody>
                                            </table>
                                            {{-- {{$products->links()}} --}}
                                        </div>
                                    </div>
                                @endforeach
                                </div>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
    @include('livewire.pos.form')
</div>

<div class="row sales layout-top-spacing">
    
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

    });
</script>
<style type="text/css">
    .boton_2{
      
      padding: 40px;
      font-family: arial;
      text-transform: uppercase;
      padding-left: 10px;
      padding-right: 10px;
      font-weight: 800;
      font-size: 25px;
      color: black;
      background-color: #07ad3f;
      border-radius: 15px;
      border: none!important;
      outline: none!important;
      
    }
    .boton_2:hover{
      color: #000000;
      background-color: #00862d;
      text-decoration: none;
    }
  </style>