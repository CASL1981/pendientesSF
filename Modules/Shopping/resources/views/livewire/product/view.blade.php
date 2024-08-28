<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Gestión de Productos <small>product</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('destination update')
              <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('destination create')
              <x-form.button-duplicar :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('destination create')
              <x-form.button-create />
            @endcan
          </div>
        </x-slot>
        <div class="col-12">
            <div class="table-responsive tableFixHead">
                <x-table.table :audit="$audit">
                  <x-slot name="head" model="$products">
                    <th class="p-2">
                      <div class="form-check form-check-flat form-check-primary" >
                          <label class="form-check-label text-danger" style="width:10">
                          <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                          <i class="input-helper"></i></label>
                      </div>
                    </th>
                    <x-table.th field="item">Item</x-table.th>
                    <x-table.th field="description">Descripción</x-table.th>
                    <x-table.th field="brand">Marca</x-table.th>
                    <x-table.th field="ATC">ATC</x-table.th>
                    <x-table.th field="invima">Invima</x-table.th>
                    <x-table.th field="measure_unit">UM</x-table.th>
                    <x-table.th field="presentation">Presentación</x-table.th>
                    <x-table.th field="pharmaceutical_form">Forma Farmacéutica</x-table.th>
                    <x-table.th field="concentration">Concentración</x-table.th>
                    <x-table.th field="geneic_name">Nombre Generico</x-table.th>
                    <x-table.th field="geneic_code">Codigo</x-table.th>
                    <x-table.th field="tax_percentage">Por. IVA</x-table.th>
                  </x-slot>
                  @forelse ($products as $key => $item)
                    <tr>
                      <td class="p-1">
                        <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"
                            wire:model="selectedModel"
                            value="{{ $item->id }}"
                            wire:click="$set('selected_id',{{ $item->id }})"
                            >
                        <i class="input-helper"></i></label>
                        </div>
                      </td>
                      <td>{{ $item->item }}</td>
                      <td>{{ Str::limit($item->description, 15, '...') }}</td>
                      <td>{{ $item->brand }}</td>
                      <td>{{ $item->ATC }}</td>
                      <td>{{ $item->invima }}</td>
                      <td>{{ $item->measure_unit }}</td>
                      <td>{{ $item->presentation }}</td>
                      <td>{{ $item->concentration }}</td>
                      <td>{{ Str::limit($item->pharmaceutical_form, 10, '...') }}</td>
                      <td>{{ Str::limit($item->generic_name, 15, '...') }}</td>
                      <td>{{ $item->generic_code }}</td>
                      <td>{{ $item->tax_percentage }}</td>
                    </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                      <x-otros.error-search></x-otros.error-search>
                    <td>
                  </tr>
                  @endforelse
                </x-table.table>
                @include('shopping::livewire.product.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $products->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>
