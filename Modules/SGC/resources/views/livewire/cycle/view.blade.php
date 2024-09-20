<div class="row">
    <div class="col-8 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Auditorias <small>cycle</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('cycle update')
              <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('cycle create')
              <x-form.button-duplicar :bulkDisabled="true" />
            @endcan
            @can('cycle create')
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
                    <x-table.th field="identification">Año</x-table.th>
                    <x-table.th field="first_name">Descripción</x-table.th>
                    <x-table.th field="type_document">Estado</x-table.th>
                  </x-slot>
                  @forelse ($cycles as $key => $item)
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
                      <td class="p-1 text-right">{{ $item->year }}</td>
                      <td class="p-1">{{ $item->description }}</td>
                      <td class="p-1"><label class="text-{{ $item->status_color }}">{{ $item->status ? 'Activo' : 'Inacivo' }}</label></td>
                    </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                      <x-otros.error-search></x-otros.error-search>
                    <td>
                  </tr>
                  @endforelse
                </x-table.table>
                @include('sgc::livewire.cycle.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $cycles->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>