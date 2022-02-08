@include('livewire.pos.modal.modalHead')

<div class="row">
  <div class="col-sm-12 col-md-8">
    {{-- Detalle --}}
    @include('livewire.pos.partials.detail')
  </div>
  <div class="col-sm-12 col-md-4">
    {{-- Total --}}
    @include('livewire.pos.partials.total')
    {{-- Denominations --}}
    @include('livewire.pos.partials.coins')
  </div>
</div>

@include('livewire.pos.modal.modalFooter')