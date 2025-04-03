<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Gestion de auditoria
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-4">
                    <x-form.label for="identification">Identificación</x-form.label>
                    <x-form.input wire:model="identification" maxlength="20" id="identification"/>
                    <x-form.input-error for="identification"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="first_name">Nombres</x-form.label>
                    <x-form.input wire:model.defer="first_name" maxlength="100" id="first_name"/>
                    <x-form.input-error for="first_name"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="last_name">Apellidos</x-form.label>
                    <x-form.input wire:model.defer="last_name" maxlength="100" id="last_name"/>
                    <x-form.input-error for="last_name"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <x-form.label for="position">Cargo</x-form.label>
                    <x-form.input wire:model="position" maxlength="100" id="position"/>
                    <x-form.input-error for="position"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="cycle_id">Ciclo de Auditoria</x-form.label>
                    <x-select wire:model="cycle_id" class="form-control-sm" id="cycle_id"
                    :options="$cycles" placeholder="Seleccione..."/>
                    <x-form.input-error for="cycle_id"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>