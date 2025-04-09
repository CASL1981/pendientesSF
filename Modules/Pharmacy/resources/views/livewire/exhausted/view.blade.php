<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Gestión de <small>agotados</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('exhausted toggle')
              <x-form.button-toggle :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('exhausted update')
            <button class="btn btn-icon btn-sm btn-primary" wire:click="detailPending()" title="Adicionar Producto Agotado" @if ($bulkDisabled) disabled @endif>
              <svg class="icon-32" width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                <path opacity="0.4" d="M17.554 7.29614C20.005 7.29614 22 9.35594 22 11.8876V16.9199C22 19.4453 20.01 21.5 17.564 21.5L6.448 21.5C3.996 21.5 2 19.4412 2 16.9096V11.8773C2 9.35181 3.991 7.29614 6.438 7.29614H7.378L17.554 7.29614Z" fill="currentColor"></path>                                <path d="M12.5464 16.0374L15.4554 13.0695C15.7554 12.7627 15.7554 12.2691 15.4534 11.9634C15.1514 11.6587 14.6644 11.6597 14.3644 11.9654L12.7714 13.5905L12.7714 3.2821C12.7714 2.85042 12.4264 2.5 12.0004 2.5C11.5754 2.5 11.2314 2.85042 11.2314 3.2821L11.2314 13.5905L9.63742 11.9654C9.33742 11.6597 8.85043 11.6587 8.54843 11.9634C8.39743 12.1168 8.32142 12.3168 8.32142 12.518C8.32142 12.717 8.39743 12.9171 8.54643 13.0695L11.4554 16.0374C11.6004 16.1847 11.7964 16.268 12.0004 16.268C12.2054 16.268 12.4014 16.1847 12.5464 16.0374Z" fill="currentColor"></path></svg>
            </button>
            <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('exhausted create')
              <x-form.button-duplicar :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('exhausted create')
              <x-form.button-create />
            @endcan
          </div>
        </x-slot>
        <div class="col-12">
            <div class="table-responsive tableFixHead">
                <x-table.table :audit="$audit">
                  <x-slot name="head" model="$exhausteds">
                    <th class="p-2">
                      <div class="form-check form-check-flat form-check-primary" >
                          <label class="form-check-label text-danger" style="width:10">
                          <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                          <i class="input-helper"></i></label>
                      </div>
                    </th>
                    <x-table.th field="generic_code">Codigó</x-table.th>
                    <x-table.th field="generic_name">Nombre Generico</x-table.th>
                    <x-table.th field="product_name">Descripción Producto</x-table.th>
                    <x-table.th field="manufacturer">Fabricante</x-table.th>
                    <x-table.th field="classification">Clasificación</x-table.th>
                    <x-table.th field="circular_date">Fecha Circular</x-table.th>
                    <x-table.th field="circular">Circular</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                  </x-slot>
                  @forelse ($exhausteds as $key => $item)
                    <tr class="{{ $item->status == 'Inactivo' ? 'table-warning' : '' }}">
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
                        <td class="p-1">{{ $item->generic_code }}</td>
                        <td class="p-1">{{ $item->generic_name }}</td>
                        <td class="p-1">{{ Str::limit($item->product_name, 15, '...') }}</td>
                        <td class="p-1">{{ $item->manufacturer }}</td>
                        <td class="p-1">{{ $item->classification }}</td>
                        <td class="p-1">{{ $item->circular_date }}</td>
                        <td class="p-1">{{ $item->circular }}</td>
                        <td class="p-1">{{ $item->status }}</td>
                    </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                      <x-otros.error-search></x-otros.error-search>
                    <td>
                  </tr>
                  @endforelse
                </x-table.table>
                @include('pharmacy::livewire.exhausted.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $exhausteds->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>