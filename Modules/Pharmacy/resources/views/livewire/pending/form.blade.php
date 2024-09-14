<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Crear Solicitud de Pendientes
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="type">Tipo Solicitud</x-form.label>
                    <x-select wire:model="type" class="form-control-sm" id="type"
                    :options="['Pedido' => 'Pedido', 'Requisición' => 'Requisición', 'Mensaje Interno' => 'Mensaje Interno']"/>
                    <x-form.input-error for="type"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="destination_id">Centro de Costos</x-form.label>
                    <x-select wire:model="destination_id" class="form-control-sm" id="destination_id"
                    :options="$destinations"/>
                    <x-form.input-error for="destination_id"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="product_id">Productos</x-form.label>
                    <x-select wire:model="product_id" class="form-control-sm" id="product_id"
                    :options="$products"/>
                    <x-form.input-error for="product_id"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="quantity">Cantidad</x-form.label>
                    <x-form.input wire:model="quantity" maxlength="50" id="quantity"/>
                    <x-form.input-error for="quantity"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="send_quantity">Cantidad Enviada</x-form.label>
                    <x-form.input wire:model.defer="send_quantity" maxlength="20" id="send_quantity"/>
                    <x-form.input-error for="send_quantity"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="reason">Motivo</x-form.label>
                    <x-form.input wire:model.defer="reason" maxlength="192" id="reason"/>
                    <x-form.input-error for="reason"/>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="duration">Duración</x-form.label>
                    <x-form.input wire:model.defer="duration" maxlength="192" id="" id="duration"/>
                    <x-form.input-error for="duration"></x-form.input-error>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="EPS">EPS</x-form.label>
                    <x-form.input wire:model.defer="EPS" maxlength="100" id="EPS"/>
                    <x-form.input-error for="EPS"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <x-form.label for="contracting_modality">Modalidad Contratación</x-form.label>
                    <x-form.input wire:model.defer="contracting_modality" maxlength="100" id="" id="contracting_modality"/>
                    <x-form.input-error for="contracting_modality"></x-form.input-error>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="invoicing_method">Metodo de Facturación</x-form.label>
                    <x-form.input wire:model.defer="invoicing_method" maxlength="100" id="" id="invoicing_method"/>
                    <x-form.input-error for="invoicing_method"></x-form.input-error>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="manager">Autorizado ESE</x-form.label>
                    <x-form.input wire:model.defer="manager" maxlength="50" id="manager"/>
                    <x-form.input-error for="manager"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="order">Orden</x-form.label>
                    <x-form.input wire:model.defer="order" maxlength="20" id="order"/>
                    <x-form.input-error for="order"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="circular">Circular Agotado</x-form.label>
                    <x-form.input wire:model.defer="circular" maxlength="20" id="circular"/>
                    <x-form.input-error for="circular"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <x-form.label for="observations">Observaciones</x-form.label>
                    <x-form.input wire:model.defer="observations" maxlength="20" id="observations"/>
                    <x-form.input-error for="observations"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>