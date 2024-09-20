<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Gestión de Empleados <small>employee</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('employee update')
              <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('employee create')
              <x-form.button-duplicar :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('employee create')
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
                    <x-table.th weight="80px" field="id">#</x-table.th>
                    <x-table.th field="identification">Identificación</x-table.th>
                    <x-table.th field="first_name">Nombres</x-table.th>
                    <x-table.th field="last_name">Apellidos</x-table.th>
                    <x-table.th field="type_document">TD</x-table.th>
                    <x-table.th field="type_document">Estado</x-table.th>
                    <x-table.th field="address">Dirección</x-table.th>
                    <x-table.th field="phone">Telefono</x-table.th>
                    <x-table.th field="cel_phone">Celular</x-table.th>
                    <x-table.th field="entry_date">F. Ing.</x-table.th>
                    <x-table.th field="email">Email</x-table.th>
                    <x-table.th field="vendedor">Vendedor</x-table.th>
                    <x-table.th field="gender">Sex</x-table.th>
                    <x-table.th field="birth_date">F. Nac.</x-table.th>
                    <x-table.th field="location_id">Ubicación</x-table.th>
                    <x-table.th field="approve">Autoriza</x-table.th>
                  </x-slot>
                  @forelse ($employees as $key => $item)
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
                      <td class="p-1">{{ $item->id }}</td>
                      <td class="p-1 text-right">{{ $item->identification }}</td>
                      <td class="p-1">{{ $item->first_name }}</td>
                      <td class="p-1">{{ $item->last_name }}</td>
                      <td class="p-1">{{ $item->type_document }}</td>
                      <td class="p-1"><label class="text-{{ $item->status_color }}">{{ $item->status ? 'Activo' : 'Inacivo' }}</label></td>
                      <td class="p-1">{{ $item->address }}</td>
                      <td class="p-1 text-right">{{ $item->phone }}</td>
                      <td class="p-1 text-right">{{ $item->cel_phone }}</td>
                      <td class="p-1 text-center">{{ $item->entry_date }}</td>
                      <td class="p-1">{{ $item->email }}</td>
                      <td  class="p-1 text-center">{{ $item->vendedor ? 'Si' : 'No' }}</td>
                      <td class="p-1 text-center">{{ $item->gender }}</td>
                      <td class="p-1 text-right">{{ $item->birth_date }}</td>
                      <td class="p-1 text-right">{{ $item->destination->name }}</td>
                      <td class="p-1 text-center">{{ $item->approve ? 'Si' : 'No'}}</td>
                    </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                      <x-otros.error-search></x-otros.error-search>
                    <td>
                  </tr>
                  @endforelse
                </x-table.table>
                @include('humantalent::livewire.employee.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $employees->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>