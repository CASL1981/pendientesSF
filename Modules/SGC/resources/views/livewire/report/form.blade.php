<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Actualizar criterio
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <x-form.label for="cycle_id">Hallazgos</x-form.label>
                        <x-select wire:model="cycle_id" class="form-control-sm" id="cycle_id"
                        :options="$cycles" placeholder="-- Elige una opción --"/>
                        <x-form.input-error for="cycle_id"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-form.label for="star_date">Fecha Inical</x-form.label>
                        <x-form.input wire:model.defer="star_date" type="date" id="star_date"/>
                        <x-form.input-error for="star_date"/>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <x-form.label for="end_date">Fecha Final</x-form.label>
                        <x-form.input wire:model.defer="end_date" type="date" id="end_date"/>
                        <x-form.input-error for="end_date"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="objective"><strong>Objetivo</strong></label>
                        <textarea wire:model="objective" class="form-control form-control-sm" rows="5" placeholder="Descripción del objetivo" id="objective"></textarea>
                        <x-form.input-error for="objective" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="scope"><strong>Alcance</strong></label>
                        <textarea wire:model="scope" class="form-control form-control-sm" rows="5" placeholder="Descripción del alcance" id="scope"></textarea>
                        <x-form.input-error for="scope" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="auditores"><strong>Auditores</strong></label>
                        <textarea wire:model="auditores" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="auditores"></textarea>
                        <x-form.input-error for="auditores" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="auditados"><strong>Auditados</strong></label>
                        <textarea wire:model="auditados" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="auditados"></textarea>
                        <x-form.input-error for="auditados" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="documents"><strong>Documentación</strong></label>
                        <textarea wire:model="documents" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="documents"></textarea>
                        <x-form.input-error for="documents" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="observations"><strong>Observaciones</strong></label>
                        <textarea wire:model="observations" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="observations"></textarea>
                        <x-form.input-error for="observations" />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="diverging_opinions"><strong>Opiniones Divergente</strong></label>
                        <textarea wire:model="diverging_opinions" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="diverging_opinions"></textarea>
                        <x-form.input-error for="diverging_opinions" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="conclusions"><strong>Conclusiones</strong></label>
                        <textarea wire:model="conclusions" class="form-control form-control-sm" rows="4" placeholder="Descripción" id="conclusions"></textarea>
                        <x-form.input-error for="conclusions" />
                    </div>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="update()">Guardar</button>
    </x-slot>
</x-confirmation-modal>