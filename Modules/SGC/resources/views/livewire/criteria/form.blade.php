<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Actualizar criterio
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="evaluated1"><strong>Criterio Evaluado</strong></label>
                        <textarea wire:model="evaluated" class="form-control form-control-sm" rows="10" 
                        placeholder="Descripción" id="evaluated1"></textarea>
                        <x-form.input-error for="evaluated" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="description1"><strong>Descripción</strong></label>
                        <textarea wire:model="description" class="form-control form-control-sm" rows="10" 
                        placeholder="Descripción" id="description1"></textarea>
                        <x-form.input-error for="description" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <x-form.label for="findings1">Hallazgos</x-form.label>
                        <x-select wire:model="findings" class="form-control-sm" id="findings"
                        :options="['C' => 'C', 'NC' => 'NC', 'O' => 'O', 'N/A' => 'N/A']" placeholder="-- Elige una opción --" id="findings1"/>
                        <x-form.input-error for="findings"/>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="observations1"><strong>Observaciones</strong></label>
                        <textarea wire:model="observations" class="form-control form-control-sm" rows="10" 
                        placeholder="Descripción" id="observations1"></textarea>
                        <x-form.input-error for="observations" />
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="evidence1"><strong>Evidencia</strong></label>
                        <textarea wire:model="evidence" class="form-control form-control-sm" rows="10" 
                        placeholder="Descripción" id="evidence1"></textarea>
                        <x-form.input-error for="evidence" />
                    </div>
                </div>
            </div>

        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="close()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="update()">Guardar</button>
    </x-slot>
</x-confirmation-modal>