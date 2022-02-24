@include('common.modalHead')

<div class="row">
  <div class="col-sm-12">
    <div class="input-group mb-3">
      <span class="input-group-text">
        <span class="fas fa-edit text-dark">
        </span>
      </span>
      <input type="text" wire:model.lazy="permissionName" class="form-control" placeholder="Ingrese el nombre del Permiso" style="color:black;">
    </div>
      @error('permissionName')  
        <span class="text-danger">{{$message}}</span> 
      @enderror
  </div>
</div>
         <div class="modal-footer">
            <button type="button" wire:click.prevent="resetUI()" class="btn btn-primary close-btn" data-dismiss="modal">Cerrar</button>
            @if ($selected_id < 1)
            <button type="button" wire:click.prevent="CreatePermission()" class="btn btn-primary close-modal" >Guardar</button>
            @else
            <button type="button" wire:click.prevent="UpdatePermission()" class="btn btn-primary close-modal" >Actualizar</button>
            @endif
         </div>
      </div>
   </div>
</div>