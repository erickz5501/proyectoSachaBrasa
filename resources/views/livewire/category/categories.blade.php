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
                        <a href="javascript:void(0);" class="tabmenu bg-dark" data-toggle="modal" data-target="#theModal">Agregar</a>
                    </li>
                </ul>
            </div>
            @include('common.searchbox')
            <div class="widget-content">

                <div class="table-responsive">
                    <table class="table table-bordered table-striped mt-1">
                        <thead class="text-white" style=" background: #3B3F5C ">
                            <tr>
                                <th class="table-th text-white">Descripción</th>
                                <th class="table-th text-white">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><h6>Nombre</h6></td>
                                <td class="text-center">
                                    <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="javascript:void(0)" class="btn btn-dark mtmobile" title="Eliminar">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    pagination
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
{{-- @endsection --}}
