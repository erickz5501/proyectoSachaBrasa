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
                                <th class="table-th text-white text-center">Tipo</th>
                                <th class="table-th text-white text-center">Valor</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($data) > 0 )
                                @foreach($data as $coin)
                                    <tr>
                                        <td ><h6> {{$coin->type}}</h6></td>
                                        <td ><h6 class="text-center">S/. {{$coin->value}}</h6></td>
                                        <td class="text-left">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar" wire:click.prevent="Edit({{$coin->id}})" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar" onclick="Confirm(' {{$coin->id}} ')" >
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
                    {{ $data->links() }}
                </div>

            </div>
        </div>
    </div>
    @include('livewire.denominations.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        window.livewire.on('item-added', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('item-updated', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        window.livewire.on('modal-show', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('show');
        });
        window.livewire.on('item-hide', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
        });
        $('#theModal').on('hidden.bs.modal', function() {//Abre el modal con la data del registro
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