<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Crear Listas de Chequeo
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="cycle_id">Ciclo</x-form.label>
                    <x-select wire:model="cycle_id" class="form-control-sm" id="cycle_id"
                    :options="$cycles"/><
                    <x-form.input-error for="cycle_id"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="type">Tipo</x-form.label>
                    <x-form.input wire:model="type" maxlength="100" id="type"/>
                    <x-form.input-error for="type"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="destination_id">Centro de Costos</x-form.label>
                    <x-select wire:model="destination_id" class="form-control-sm" id="destination_id"
                    :options="$destinations"/>
                    <x-form.input-error for="destination_id"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="process">Proceso/Contrato</x-form.label>
                    <x-form.input wire:model="process" maxlength="192" id="process"/>
                    <x-form.input-error for="process"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="date_activity">Fecha Actividad</x-form.label>
                    <x-form.input wire:model.defer="date_activity" type="date" id="date_activity"/>
                    <x-form.input-error for="date_activity"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <x-form.label for="responsible">Responsable de la Actividad</x-form.label>
                    <textarea class="form-control" id="responsible" rows="4" wire:model.defer="responsible"></textarea>
                    <x-form.input-error for="responsible"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="audited">Auditados Contratistas</x-form.label>
                    <textarea class="form-control" id="audited" rows="4" wire:model.defer="audited"></textarea>
                    <x-form.input-error for="audited"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <x-form.label for="documents">Documentos de Referencia</x-form.label>
                    <textarea class="form-control" id="documents" rows="4" wire:model.defer="documents"></textarea>
                    <x-form.input-error for="documents"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="observations">Observaciones</x-form.label>
                    <textarea class="form-control" id="observations" rows="4" wire:model.defer="observations"></textarea>
                    <x-form.input-error for="observations"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <x-form.label for="prepared_by">Elaborado por</x-form.label>
                    <x-form.input wire:model.defer="prepared_by" maxlength="192" id="prepared_by"/>
                    <x-form.input-error for="prepared_by"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="accepted_by">Auditado/Contratista</x-form.label>
                    <x-form.input wire:model.defer="accepted_by" maxlength="192" id="accepted_by"/>
                    <x-form.input-error for="accepted_by"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>