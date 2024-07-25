<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x:slot name="title">Crear Usuario</x:slot>
    <x:slot name="content">
        <!--begin::Form-->
        <form>
            <div class="row mb-7">
                <div class="form-group col-md-3">
                    <x-form.label for="identification" value="{{ __('Identificación') }}" />
                    <x-form.input type="text" wire:model="identification" class="form-control-sm" maxlength="12"></x-form.input>
                    <x-form.input-error for="identification" class="mt-2"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="name" value="{{ __('Nombres') }}" />
                    <x-form.input type="text" wire:model="name" class="form-control-sm" maxlength="100"></x-form.input>
                    <x-form.input-error for="name" class="mt-2"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="lastname" value="{{ __('Apellidos') }}" />
                    <x-form.input type="text" wire:model="lastname" class="form-control-sm" maxlength="100"></x-form.input>
                    <x-form.input-error for="lastname" class="mt-2"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="area" value="{{ __('Area') }}" />
                    <x-select wire:model="area" class="form-control-sm" id="area" 
                    :options="['Administrativa' => 'Administrativa', 'Comercial' => 'Comercial', 'Farmacia' => 'Farmacia', 'Financiero' => 'Financiero']"/>
                    <x-form.input-error for="area" class="mt-2"/>
                </div>
            </div>
            <div class="row mb-7">
                <div class="form-group col-md-3">
                    <x-form.label for="role_id" value="{{ __('Role') }}" />
                    <x-select wire:model="role_id" class="form-control-sm" id="role_id" :options="$roles"/>
                    <x-form.input-error for="role_id" class="mt-2"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="email" value="{{ __('Email') }}" />
                    <x-form.input wire:model="email" class="form-control-sm" id="email" />
                    <x-form.input-error for="email" class="mt-2"/>
                </div>
            </div>
        </form>
        <!--end::Form-->
    </x:slot>
    <x:slot name="footer">
        <button type="button" class="btn btn-secondary" wire:click.prevent="cancel()">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="method()">Guardar</button>
       {{-- <x-button>Guardar</x-button> --}}
    </x:slot>
 </x-confirmation-modal>