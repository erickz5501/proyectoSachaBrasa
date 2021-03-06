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
                                <th class="table-th text-white">N°</th>
                                <th class="table-th text-white text-center">Nombre</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($roles) > 0 )
                                @foreach($roles as $role)
                                    <tr>
                                        <td>
                                        <h6> {{$role->id}}</h6>
                                        </td>
                                        <td><h6 class="text-center"> {{$role->name}}</h6></td>
                                        <td class="text-center">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar" wire:click.prevent="Edit({{$role->id}})" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar" onclick="Confirm('{{$role->id}}')" >
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
                    {{$roles->links()}}
                </div>

            </div>
        </div>
    </div>
    @include('livewire.roles.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        window.livewire.on('rol-added', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
            noty(Msg);
        });
        window.livewire.on('rol-updated', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
            noty(Msg);
        });
        window.livewire.on('rol-deleted', msg => {//Abre el modal con la data del registro
            noty(Msg);
        });
        window.livewire.on('rol-error', msg => {//Abre el modal con la data del registro
            noty(Msg);
        });
        window.livewire.on('modal-show', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('show');
        });
        window.livewire.on('rol-exists', msg => {//Abre el modal con la data del registro
            noty(Msg);
        });
        window.livewire.on('hide-modal', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
            noty(Msg);
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