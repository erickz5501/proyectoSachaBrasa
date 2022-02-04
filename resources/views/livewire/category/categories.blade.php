{{-- @extends('layouts.theme.app') --}}

{{-- @section('content') --}}
<div class="row sales layout-top-spacing">
    <div class="col-sm-12">
        <div class="widget widget-chart-one">
            <div class="widget-heading">
                <h4 class="cart-title">
                    <b>{{ $componentName }} | {{ $pagetitle }} </b>
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
                    <table class="table table-bordered  mt-1" style="text-align:center;">
                        <thead class="text-white" style=" background: #e05f1a ">
                            <tr class="text-center">
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($categories) > 0)
                                @foreach($categories as $category)
                                <tr>
                                    <td class="text-center" ><h6>{{ $category->name }}</h6></td>
                                    <td class="text-center">
                                        <a href="javascript:void(0)" wire:click="Edit({{$category->id}})" class="btn btn-dark mtmobile" title="Editar">
                                            <i class="fas fa-edit"></i>
                                        </a>
               
                                        <a href="javascript:void(0)" onclick="Confirm('{{$category->id}}', '{{$category->products->count()}}')" class="btn btn-dark mtmobile" title="Eliminar">
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
                    {{ $categories->links() }}
                </div>

            </div>
        </div>
    </div>
    @include('livewire.category.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){

        window.livewire.on('show-modal', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('show');
        });

        window.livewire.on('category-added', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('category-updated', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });

    });


 
    function Confirm(id, products) 
    {
        if(products > 0 )
        {
            swal('No se puede eliminar la categoria porque tiene productos relacionados, primero tienes que eliminar el producto relacionado')
            return;
        }
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
{{-- @endsection --}}
