<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x-slot name="title">
        Gestión de agotados
    </x-slot>
    <x-slot name="content">
        <form>
            <div class="row">
                <div class="form-group col-md-4">
                    <x-form.label for="generic_code">Nombre Generico</x-form.label>
                    <!-- Agregamos wire:change para disparar el método en el componente -->
                    <x-select wire:model="generic_code" id="generic_code" :options="$products" wire:change="onGenericCodeChanged"/>
                    <x-form.input-error for="generic_code"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="product_name">Nombre Producto</x-form.label>
                    <x-select wire:model="product_name" id="product_name" :options="$product_names" :selected="$product_name"/>
                    <x-form.input-error for="product_name"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="manufacturer">Fabricante</x-form.label>
                    <x-input wire:model="manufacturer" class="form-control-sm" id="manufacturer"/>
                    <x-form.input-error for="manufacturer"/>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <x-form.label for="classification">Clasificación</x-form.label>
                    <x-select wire:model="classification" class="form-control-sm" id="classification"
                    :options="['Medicamentos de Control' => 'Medicamentos de Control', 'Medicamentos' => 'Medicamentos', 'Lab. Clinico' => 'Lab. Clinico', 'Imagenes Diagnosticas' => 'Imagenes Diagnosticas']"/>
                    <x-form.input-error for="classification"/>
                </div>
                <div class="form-group col-md-3">
                    <x-form.label for="circular_date">Fecha Circular</x-form.label>
                    <x-form.input type="date" wire:model.defer="circular_date" maxlength="192" id="circular_date"/>
                    <x-form.input-error for="circular_date"/>
                </div>
                <div class="form-group col-md-6">
                    <x-form.label for="circular">Circular</x-form.label>
                    <x-form.input wire:model.defer="circular" maxlength="100" id="circular"/>
                    <x-form.input-error for="circular"/>
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