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
                <div class="form-group col-md-2">
                    <x-form.label for="category">Categoria</x-form.label>
                    <x-select wire:model="category" class="form-control-sm" id="category"
                    :options="$categories"/>
                    <x-form.input-error for="category"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="destination">C. C.</x-form.label>
                    <x-select wire:model="destination" class="form-control-sm" id="destination"
                    :options="$destinations"/>
                    <x-form.input-error for="destination"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="reason">Motivo</x-form.label>
                    <x-form.input wire:model.defer="reason" maxlength="192" id="reason"/>
                    <x-form.input-error for="reason"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="EPS">EPS</x-form.label>
                    <x-form.input wire:model.defer="EPS" maxlength="100" id="EPS"/>
                    <x-form.input-error for="EPS"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <x-form.label for="duration">Duración</x-form.label>
                    <x-form.input wire:model.defer="duration" maxlength="192" id="" id="duration"/>
                    <x-form.input-error for="duration"></x-form.input-error>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="contracting_modality">Modalidad Contratación</x-form.label>
                    <x-form.input wire:model.defer="contracting_modality" maxlength="100" id="" id="contracting_modality"/>
                    <x-form.input-error for="contracting_modality"></x-form.input-error>
                </div>
                <div class="form-group col-md-4">
                    <x-form.label for="invoicing_method">Metodo de Facturación</x-form.label>
                    <x-form.input wire:model.defer="invoicing_method" maxlength="100" id="" id="invoicing_method"/>
                    <x-form.input-error for="invoicing_method"></x-form.input-error>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="manager">Autorizado ESE</x-form.label>
                    <x-form.input wire:model.defer="manager" maxlength="50" id="manager"/>
                    <x-form.input-error for="manager"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <x-form.label for="observations">Observaciones</x-form.label>
                    <x-form.input wire:model.defer="observations" maxlength="255" id="observations"/>
                    <x-form.input-error for="observations"/>
                </div>
            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>

    @push('styles')
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            background-color: #EEF9FF !important;
            padding-right: 1.5rem !important;
            padding-left: 1.5rem !important;
            border: 0 !important;
        }

        .select2-container--default .select2-selection--single {
            background-color: #EEF9FF;
            border: 0px solid #aaa;
            border-radius: 0px;
            height: 45px;
            display: block;
            width: 100%;
            padding: .375rem .75rem;
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #6B6A75;
            background-clip: padding-box;
            appearance: none;
            border-radius: 2px;
            transition: border-color 0.15s ease-in-out,box-shadow 0.15s ease-in-out;
        }
    </style>

@endpush
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>

        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
</x-confirmation-modal>