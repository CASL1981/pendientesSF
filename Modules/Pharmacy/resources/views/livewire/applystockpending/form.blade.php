<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Editar Detalles de Solicitud de Pendientes
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="type"># Solicitud</x-form.label>
                    <x-form.input wire:model="pending_id" id="pending_id" :disabled="true" />
                    <x-form.input-error for="type" />
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="product_name">Producto</x-form.label>
                    <x-form.input wire:model="product_name" id="product_name" :disabled="true" />
                    <x-form.input-error for="product_name" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="brand">Marca</x-form.label>
                    <x-form.input wire:model="brand" id="brand" :disabled="true" />
                    <x-form.input-error for="brand" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="destination">CC</x-form.label>
                    <x-form.input wire:model="destination" id="destination" :disabled="true" />
                    <x-form.input-error for="destination" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="quantity">Cantidad</x-form.label>
                    <x-form.input wire:model="quantity" id="quantity" :disabled="true" />
                    <x-form.input-error for="quantity" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="send_quantity">Cantidad Aplicada</x-form.label>
                    <x-form.input wire:model="send_quantity" id="send_quantity" :disabled="true" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="order">Orden</x-form.label>
                    <x-form.input wire:model.defer="order" maxlength="20" id="order"/>
                    <x-form.input-error for="order"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="circular">Circular</x-form.label>
                    <x-form.input wire:model.defer="circular" maxlength="20" id="circular"/>
                    <x-form.input-error for="circular"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="status">Estado</x-form.label>
                    <x-select wire:model="status" class="form-control-sm" id="status"
                    :options="['Sin Revisión' => 'Sin Revisión', 'Cumplido' => 'Cumplido', 'Parcial' => 'Parcial', 'Pendiente' => 'Pendiente', 'Agotado' => 'Agotado']"/>
                    <x-form.input-error for="status"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <x-form.label for="observations">Observaciones</x-form.label>
                    <x-form.input wire:model.defer="observations" maxlength="100" id="observations"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>