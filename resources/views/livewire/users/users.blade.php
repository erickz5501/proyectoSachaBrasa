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
                                <th class="table-th text-white">Nombre y Apellido</th>
                                <th class="table-th text-white text-center">Dirección</th>
                                <th class="table-th text-white text-center">Telefono</th>
                                <th class="table-th text-white text-center">Email</th>
                                <th class="table-th text-white text-center">Estado</th>
                                <th class="table-th text-white text-center">Perfil</th>
                                <th class="table-th text-white text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if( count($data) > 0 )
                                @foreach($data as $user)
                                    <tr>
                                        <td>
                                        <h6> {{$user->name}} {{$user->last_name}}</h6>
                                        </td>
                                        <td ><h6 class="text-center"> {{$user->adress}}</h6></td>
                                        <td><h6 class="text-center">{{$user->phone}}</h6></td>
                                        <td><h6 class="text-center"> {{$user->email}} </h6></td>
                                        <td class="texr-center">
                                            <span class="badge {{$user->status == 'ACTIVO' ? 'badge-success' : 'badge-danger'}} text-uppercase">
                                                {{$user->status}}
                                            </span>    
                                        </td>
                                        <td><h6 class="text-center"> {{$user->profile}} </h6></td>
                                        <td class="text-left">
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar" wire:click.prevent="Edit({{$user->id}})" >
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar" onclick="Confirm(' {{$user->id}} ')" >
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
    @include('livewire.users.form')
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        
        window.livewire.on('user-added', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
            noty(Msg);
        });
        window.livewire.on('user-updated', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('hide');
            noty(Msg);
        });
        window.livewire.on('user-deleted', msg => {//Abre el modal con la data del registro
            noty(Msg);
        });
        window.livewire.on('modal-show', msg => {//Abre el modal con la data del registro
            $('#theModal').modal('show');
        });
        window.livewire.on('user-withsales', msg => {//Abre el modal con la data del registro
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