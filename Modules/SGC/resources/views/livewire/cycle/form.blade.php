<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Crear ciclo de auditoria
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-2">
                    <x-form.label for="year">Año</x-form.label>
                    <x-form.input wire:model="year" maxlength="20" id="year"/>
                    <x-form.input-error for="year"/>
                </div>
                <div class="form-group col-md-10">
                    <x-form.label for="description">Descricción</x-form.label>
                    <x-form.input wire:model.defer="description" maxlength="192" id="description"/>
                    <x-form.input-error for="description"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>