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
                    @foreach($tables as $table)
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_2 text-center badge {{$table->status == 'OCUPADO' ? 'badge-danger' : 'badge-success'}} text-uppercase" data-toggle="modal" data-target="#theModalSale" type="button" wire:click.prevent="selectTable({{$table->id}})" >
                                {{$table->name}}
                            </button>
                        </div>
                    </div>
                    @endforeach                   
                    <div class="col-sm-3">
                        <div class="card">
                            <button href="javascript:void(0);" class="boton_del text-center" data-toggle="modal" data-target="#theModalSale" type="button">
                                Delivery
                            </button>
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
      
      border-radius: 15px;
      border: none!important;
      outline: none!important;
      
    }

    .boton_del{
      
      padding: 40px;
      font-family: arial;
      text-transform: uppercase;
      padding-left: 10px;
      padding-right: 10px;
      font-weight: 800;
      font-size: 25px;
      color: black;
      background-color: #1785ce;
      border-radius: 15px;
      border: none!important;
      outline: none!important;
      
    }

    .fullscreen-modal .modal-dialog {
    margin: 0;
    margin-right: auto;
    margin-left: auto;
    width: 100%;
    }
    @media (min-width: 768px) {
    .fullscreen-modal .modal-dialog {
        width: 750px;
    }
    }
    @media (min-width: 992px) {
    .fullscreen-modal .modal-dialog {
        width: 970px;
    }
    }
    @media (min-width: 1200px) {
    .fullscreen-modal .modal-dialog {
        width: 1170px;
    }
    }
  </style>