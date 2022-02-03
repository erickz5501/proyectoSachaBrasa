<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="cart-title">
                    <b> {{$componentName}} | {{$pagetitle}} </b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <button href="javascript:void(0);" class="btn btn-dark px-3 py-2" data-toggle="modal" data-target="#theModal" type="button">
                            <i class="fas fa-plus-circle"></i>
                            <span>Agregar</span>
                        </button>
                    </li>
                </ul>
            </div>
            
            @include('common.searchbox')

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style=" background: #3B3F5C ">
                            <tr>
                                <th class="table-th text-white">Nombre</th>
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Precio</th>
                                <th class="table-th text-white">Stock</th>
                                <th class="table-th text-white">Categoria</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($products) > 0 )
                                @foreach($products as $product)
                                    <tr>
                                        <td><h6> {{$product->name}}</h6></td>
                                        <td><h6> {{$product->description}}</h6></td>
                                        <td><h6>S/. {{$product->price}}</h6></td>
                                        <td><h6> {{$product->stock}} </h6></td>
                                        <td><h6> {{$product->category_id}} </h6></td>
                                        <td class="text-left">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="text-left" colspan="2"><span class="d-block p-2 bg-warning text-white">SIN REGISTROS...</span></td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    {{$products->links()}}
                </div>

            </div>
        </div>
    </div>
    Include form
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

    });
  </script>