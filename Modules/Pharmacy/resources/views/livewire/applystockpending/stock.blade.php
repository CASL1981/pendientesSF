<x-confirmation-modal wire:model="showStock" maxWidth="xl">
    <x-slot name="title">
        Asignación de Faltantes
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
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="brand">Marca</x-form.label>
                    <x-form.input wire:model="brand" id="brand" :disabled="true" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="destination">CC</x-form.label>
                    <x-form.input wire:model="destination" id="destination" :disabled="true" />
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="quantity">Cantidad</x-form.label>
                    <x-form.input wire:model="quantity" id="quantity" :disabled="true" />
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-10">
                    <x-form.label for="observations">Observaciones</x-form.label>
                    <x-form.input wire:model.defer="observations" maxlength="20" id="observations" :disabled="true"/>
                </div>
                <div class="form-group col-md-2">
                    <x-form.label for="send_quantity">Cantidad Aplicada</x-form.label>
                    <x-form.input wire:model="send_quantity" id="send_quantity" :disabled="true" />
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table id="users-list" class="table">
                        <thead>
                            <tr>
                                <th style="width: 60%">Descripción Producto</th>
                                <th style="width: 10%">Cantidad</th>
                                <th style="width: 10%">Utilizar</th>
                                <th style="width: 10%">Fecha</th>
                                <th style="width: 10%">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stocks as $key => $item)
                            <tr>
                                <td style="width: 60%" class="p-1">{{ Str::limit($item->product_name, 150, '...') }}</td>
                                <td style="width: 10%" class="p-1 text-center">{{ $item->quantity }}</td>
                                <td style="width: 10%"><x-form.input wire:model.defer="apply_amount.{{ $item->id }}" maxlength="20"/></td>
                                <td style="width: 10%" class="p-1">{{ $item->created_at->format("d/m/Y h:m:s") }}</td>
                                <td style="width: 10%"><a ref="#" wire:click="applyStock({{$item->id}})" class="btn btn-primary btn-sm">Aplicar</a></td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="5">
                                        <x-otros.error-search></x-otros.error-search>
                                    <td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">

            </div>
        </form>
    </x-slot>
    <x-slot name="footer">
        <button type="button" class="btn btn-secondary m-2" wire:click="closed()">Cerrar</button>
        <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
    </x-slot>
</x-confirmation-modal>