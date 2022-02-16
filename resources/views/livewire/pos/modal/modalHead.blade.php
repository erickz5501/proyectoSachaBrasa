<div wire:ignore.self class="modal fade" tabindex="-1" id="theModalSale" aria-labelledby="theModalSale" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document" style="width:80%;!important">
      <div class="modal-content">
        <div class="modal-header bg-dark">
            <h5 class="modal-title text-white">
                Mesa N° <span>{{$selectTable_id}}</span>
            </h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            <h6 class="text-center text-warning" wire:loading >Por favor espere</h6>
        </div>
        <div class="modal-body">

{{-- <div  wire:ignore.self class="modal fade show" id="theModalSale" tabindex="-1" aria-labelledby="theModalSaleLabel" aria-hidden="true" role="dialog" >
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4" id="theModalSaleLabel">
                    Mesa N° <span>{{$selectTable_id}}</span>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <h6 class="text-center text-warning" wire:loading >Por favor espere</h6>
            </div>
        <div class="modal-body"> --}}