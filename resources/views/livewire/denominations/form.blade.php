
@include('common.modalHead')

<div class="row">
<div class="col-sm-12 col-md-6">
    <div class="form-group">
        <label>Tipo</label>
        <select wire:model="type" class="form-control">
            <option value="Elegir" disabled>Elegir</option>
            <option value="BILLETE">Billete</option>
            <option value="MONEDA">Moneda</option>
            <option value="OTRO">Otro</option>
        </select>
        @error('type')  
        <span class="text-danger">{{$message}}</span> 
        @enderror
    </div>
</div> 
  <div class="col-sm-12 col-md-6">
        <label>Valor</label>
    <div class="input-group mb-3">
      <span class="input-group-text">
        <span class="fas fa-edit text-dark">
        </span>
      </span>
      <input type="number" wire:model.lazy="value" class="form-control" placeholder="ej: 100.00" style="color:black;" maxlength="25">
    </div>
      @error('value')  
        <span class="text-danger">{{$message}}</span> 
      @enderror
  </div>
</div>

@include('common.modalFooter')
