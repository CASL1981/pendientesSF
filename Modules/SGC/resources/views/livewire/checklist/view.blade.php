<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Lista de chequeos <small>checklist</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('checklist update')
            <button class="btn btn-icon btn-sm btn-primary" wire:click.prevent="$dispatch('criteria')" title="Adicionar Criterios a la Lista de Chequeo"
            @if ($bulkDisabled) disabled @endif>
            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            </button>
            @endcan
            @can('checklist update')
              <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('checklist toggle')
              <x-form.button-toggle :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('checklist create')
              <x-form.button-duplicar :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('checklist create')
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
                    <x-table.th weight="80px" field="cycel_id">Ciclo</x-table.th>
                    <x-table.th field="type">Tipo</x-table.th>
                    <x-table.th field="destination_id">CC</x-table.th>
                    <x-table.th field="process">Proceso</x-table.th>
                    <x-table.th field="date_activity">Fecha Actividad</x-table.th>
                    <x-table.th field="prepared_by">Elaborado Por</x-table.th>
                    <x-table.th field="accepted_by">Auditado</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                  </x-slot>
                  @forelse ($checklists as $key => $item)
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
                      <td class="p-1">{{ $item->cycle->year }}</td>
                      <td class="p-1">{{ $item->type }}</td>
                      <td class="p-1">{{ Str::limit($item->destination->name, 20, '...') }}</td>
                      <td class="p-1">{{ Str::limit($item->process, 20, '...') }}</td>
                      <td class="p-1 text-center">{{ $item->date_activity->format('d/m/Y') }}</td>:
                      <td class="p-1">{{ Str::limit($item->prepared_by, 20, '...') }}</td>
                      <td class="p-1">{{ Str::limit($item->accepted_by, 20, '...') }}</td>
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
                @include('sgc::livewire.checklist.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $checklists->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>