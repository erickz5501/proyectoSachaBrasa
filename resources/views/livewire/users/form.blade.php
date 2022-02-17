@include('common.modalHead')

<div class="row">
<div class="col-sm-6">
    <div class="form-group">
        <label>Nombres</label>
        <input type="text" wire:model.lazy="name" class="form-control" placeholder="Ingrese su nombre">
        @error('name')<span class="text-danger">{{$message}}</span>@enderror
    </div>
</div>
    <div class="col-sm-6">
    <div class="form-group">
        <label>Apellidos</label>
        <input type="text" wire:model.lazy="last_name" class="form-control" placeholder="Ingrese su apellido">
        @error('last_name')<span class="text-danger">{{$message}}</span>@enderror
    </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="form-group">
            <label>Dirección</label>
            <input type="text" wire:model.lazy="adress" class="form-control" placeholder="Ingrese su dirección de domiciolio actual">
            @error('adress')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label>Correo Electronico</label>
            <input type="email" wire:model.lazy="email" class="form-control" placeholder="Ingrese su correo">
            @error('email')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" wire:model.lazy="password" class="form-control">
            @error('password')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Celular</label>
                <input type="number" wire:model.lazy="phone" class="form-control" placeholder="Ingrese su número" maxlength="9">
                @error('phone')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>

    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Estado</label>
                <select type="text" wire:model.lazy="status" class="form-control">
                    <option value="Elegir" disabled>Elegir</option>   
                    <option value="ACTIVO">Activo</option>   
                    <option value="INACTIVO">Inactivo</option>   
                </select>    
            @error('status')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    <div class="col-sm-12 col-md-4">
        <div class="form-group">
            <label>Asignar Rol</label>
                <select type="text" wire:model.lazy="profile" class="form-control">
                    <option value="Elegir" selected>Elegir</option>   
                    <option value="ADMIN" selected>Administrador</option>   
                    <option value="TRABAJADOR" selected>Trabajador</option>   
                </select>    
            @error('profile')<span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
</div>

@include('common.modalFooter')