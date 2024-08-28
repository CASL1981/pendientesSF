<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Creación de Productos
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="item">Item</x-form.label>
                    <x-form.input wire:model="item" required maxlength="20" id="item"/>
                    <x-form.input-error for="item"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="description">Descripción</x-form.label>
                    <x-form.input wire:model="description" required maxlength="192" id="description"/>
                    <x-form.input-error for="description"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="brand">Marca</x-form.label>
                    <x-form.input wire:model="brand" maxlength="100" id="brand"/>
                    <x-form.input-error for="brand"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="ATC">ATC</x-form.label>
                    <x-form.input wire:model="ATC" maxlength="50" id="ATC"/>
                    <x-form.input-error for="ATC"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="invima">Invima</x-form.label>
                    <x-form.input wire:model.defer="invima" maxlength="20" id="invima"/>
                    <x-form.input-error for="invima"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="measure_unit">UM</x-form.label>
                    <x-form.input wire:model.defer="measure_unit" maxlength="50" id="measure_unit"/>
                    <x-form.input-error for="measure_unit"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="presentation">Presentación</x-form.label>
                    <x-form.input wire:model.defer="presentation" maxlength="100" id="" id="presentation"/>
                    <x-form.input-error for="presentation"></x-form.input-error>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="concentration">Concentración</x-form.label>
                    <x-form.input wire:model.defer="concentration" maxlength="50" id="concentration"/>
                    <x-form.input-error for="concentration"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="pharmaceutical_form">Forma Farmacéutica</x-form.label>
                    <x-form.input wire:model.defer="pharmaceutical_form" maxlength="50" id="pharmaceutical_form"/>
                    <x-form.input-error for="pharmaceutical_form"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-4">
                    <x-form.label for="generic_name">Nombre Generico</x-form.label>
                    <x-form.input wire:model.defer="generic_name" maxlength="192" id="" id="generic_name"/>
                    <x-form.input-error for="generic_name"></x-form.input-error>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="generic_code">Codigo Generico</x-form.label>
                    <x-form.input wire:model.defer="generic_code" maxlength="50" id="generic_code"/>
                    <x-form.input-error for="generic_code"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="tax_percentage">Porcentage IVA</x-form.label>
                    <x-form.input wire:model.defer="tax_percentage" maxlength="50" id="tax_percentage"/>
                    <x-form.input-error for="tax_percentage"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>