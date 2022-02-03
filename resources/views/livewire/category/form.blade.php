
@include('common.modalHead')

<div class="row">
  <div class="col-sm-12">
    <div class="input-group mb-3">
      <span class="input-group-text">
        <span class="fas fa-edit text-dark">
        </span>
      </span>
      <input type="text" wire:model.lazy="name" class="form-control" placeholder="Ingrese la categoria" style="color:black;">
    </div>
      @error('nombre')  
        <span class="text-danger">{{$message}}</span> 
      @enderror
  </div>
</div>

@include('common.modalFooter')
