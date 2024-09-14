<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Solitudes de <small>pendientes</small></x-slot>
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
                    <x-table.th field="type">Tipo</x-table.th>
                    <x-table.th field="destination_id">Centro Costo</x-table.th>
                    <x-table.th field="product_id">Producto</x-table.th>
                    <x-table.th field="quantity">Cant</x-table.th>
                    <x-table.th field="send_quantity">Cant Env</x-table.th>
                    <x-table.th field="reason">Motivo</x-table.th>
                    <x-table.th field="duration">Duración</x-table.th>
                    <x-table.th field="EPS">EPS</x-table.th>
                    <x-table.th field="contracting_modality">Modalidad Cont.</x-table.th>
                    <x-table.th field="user_id">Solicitado Por</x-table.th>
                    <x-table.th field="invoicing_method">Facturación</x-table.th>
                    <x-table.th field="manager">Autorizado Gerente ESE</x-table.th>
                    <x-table.th field="order"># Orden</x-table.th>
                    <x-table.th field="circular">Circular</x-table.th>
                    <x-table.th field="observations">Observaciones</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                  </x-slot>
                  @forelse ($pendings as $key => $item)
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
                        <td class="p-1">{{ $item->type }}</td>
                        <td class="p-1">{{ $item->destination->name }}</td>
                        <td class="p-1">{{ Str::limit($item->product->description, 30, '...') }}</td>
                        <td class="p-1">{{ $item->quantity }}</td>
                        <td class="p-1">{{ $item->send_quantity }}</td>
                        <td class="p-1">{{ $item->reason }}</td>
                        <td class="p-1">{{ $item->duration }}</td>
                        <td class="p-1">{{ $item->EPS }}</td>
                        <td class="p-1">{{ $item->contracting_modality }}</td>
                        <td class="p-1">{{ $item->user->name }}</td>
                        <td class="p-1">{{ $item->invoicing_method }}</td>
                        <td class="p-1">{{ $item->manager }}</td>
                        <td class="p-1">{{ $item->order }}</td>
                        <td class="p-1">{{ $item->circular }}</td>
                        <td class="p-1">{{ Str::limit($item->observations, 15, '...') }}</td>
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
                @include('pharmacy::livewire.pending.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $pendings->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>