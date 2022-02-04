<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="cart-title">
                    <b> {{$componentName}} | {{$pagetitle}} </b>
                </h4>
                <ul class="tabs tab-pills">
                    <li>
                        <button href="javascript:void(0);" class="btn px-3 py-2 text-white" data-toggle="modal" data-target="#theModal" type="button" style=" background:#e05f1a" ">
                            <i class="fas fa-plus-circle"></i>
                            <span>Agregar</span>
                        </button>
                    </li>
                </ul>
            </div>
            
            @include('common.searchbox')

            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1" style="text-align:center;">
                        <thead class="text-white" style=" background: #e05f1a ">
                            <tr >
                                <th class="table-th text-white text-center">Nombre</th>
                                <th class="table-th text-white text-center">Descripción</th>
                                <th class="table-th text-white text-center">Precio</th>
                                <th class="table-th text-white text-center">Stock</th>
                                <th class="table-th text-white text-center">Categoria</th>
                                <th class="table-th text-white text-center">Inv. Min</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($data) > 0 )
                                @foreach($data as $product)
                                    <tr>
                                        <td><h6> {{$product->name}}</h6></td>
                                        <td ><h6 class="text-center"> {{$product->description}}</h6></td>
                                        <td><h6 class="text-center">S/. {{$product->price}}</h6></td>
                                        <td><h6 class="text-center"> {{$product->stock}} </h6></td>
                                        <td><h6 class="text-center"> {{$product->category}} </h6></td>
                                        <td><h6 class="text-center"> {{$product->alerts}} </h6></td>
                                        <td class="text-left">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar" wire:click.prevent="Edit({{$product->id}})" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar" onclick="Confirm(' {{$product->id}} ')" >
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                            <tr>
                                <td class="text-left" colspan="7"><span class="d-block p-2 bg-warning text-white">SIN REGISTROS...</span></td>
                            </tr>
                            @endif
                            
                        </tbody>
                    </table>
                    {{$data->links()}}
                </div>

            </div>
        </div>
    </div>
    @include('livewire.product.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        window.livewire.on('product-added', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('product-updated', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('modal-show', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('show');
        });
        window.livewire.on('product-hide', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('hidden.bs.modal', msg => {//Abre el modal con la data del registro
            $('.er').css('display', 'none');
        });
    });

    function Confirm(id) 
    {
        swal({
            title: 'CONFIRMAR',
            text: '¿DECEAS ELIMINAR EL REGISTRO?',
            type:   'warning',
            confirmButtonColor: '#3B3F5C',
            confirmButtonText: 'Eliminar',
            showCancelButton: true,
            cancelButtonText: 'Cerrar',
            cancelButtonColor: '#fff'
        }).then(function(result){
            if(result.value){
                window.livewire.emit('deleteRow', id)
                swal.close()
            }
        })
        
    }

</script>