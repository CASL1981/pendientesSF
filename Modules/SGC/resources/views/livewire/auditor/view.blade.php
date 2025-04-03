<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Auditores <small>auditor</small></x-slot>
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
                    <x-table.th field="identification">Identificación</x-table.th>
                    <x-table.th field="first_name">Nombres</x-table.th>
                    <x-table.th field="last_name">Apellidos</x-table.th>
                    <x-table.th field="position">cargo</x-table.th>
                    <x-table.th field="rol_auditor">Rol Auditor</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                  </x-slot>
                  @forelse ($auditors as $key => $item)
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
                      <td class="p-1 text-right">{{ $item->identification }}</td>
                      <td class="p-1">{{ $item->first_name }}</td>
                      <td class="p-1">{{ $item->last_name }}</td>
                      <td class="p-1">{{ $item->position }}</td>
                      <td class="p-1">{{ $item->rol_auditor }}</td>
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
                @include('sgc::livewire.auditor.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $auditors->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>