<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Reporte <small>report</small></x-slot>
        <x-slot name="button">
          <div class="btn-group" role="group" aria-label="Basic example">
            @can('report update')
            <a href="{{route('sgc.pdf.informe.auditoria', $selected_id)}}" target=”_blank” title="Visualizar Informe"
            class="btn btn-sm btn-primary {{ $bulkDisabled ? 'disabled' : '' }}">
              <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.62871 12.99C8.62871 13.4 8.96535 13.73 9.37129 13.73H14.2624C14.6683 13.73 15.005 13.4 15.005 12.99C15.005 12.57 14.6683 12.24 14.2624 12.24H9.37129C8.96535 12.24 8.62871 12.57 8.62871 12.99ZM19.3381 9.02561C19.5708 9.02292 19.8242 9.02 20.0545 9.02C20.302 9.02 20.5 9.22 20.5 9.47V17.51C20.5 19.99 18.5099 22 16.0446 22H8.17327C5.59901 22 3.5 19.89 3.5 17.29V6.51C3.5 4.03 5.5 2 7.96535 2H13.2525C13.5099 2 13.7079 2.21 13.7079 2.46V5.68C13.7079 7.51 15.203 9.01 17.0149 9.02C17.4381 9.02 17.8112 9.02316 18.1377 9.02593C18.3917 9.02809 18.6175 9.03 18.8168 9.03C18.9578 9.03 19.1405 9.02789 19.3381 9.02561ZM19.61 7.5662C18.7961 7.5692 17.8367 7.5662 17.1466 7.5592C16.0516 7.5592 15.1496 6.6482 15.1496 5.5422V2.9062C15.1496 2.4752 15.6674 2.2612 15.9635 2.5722C16.4995 3.1351 17.2361 3.90891 17.9693 4.67913C18.7002 5.44689 19.4277 6.21108 19.9496 6.7592C20.2387 7.0622 20.0268 7.5652 19.61 7.5662Z" fill="currentColor" />
              </svg>
            </a>
            @endcan
            @can('report update')
              <x-form.button-edit :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('report toggle')
              <x-form.button-toggle :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('report create')
              <x-form.button-duplicar :bulkDisabled="$bulkDisabled" />
            @endcan
            @can('report create')
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
                    <x-table.th field="star_date">Fecha I</x-table.th>
                    <x-table.th field="end_date">Fecha F</x-table.th>
                    <x-table.th field="objetive">Objetivo</x-table.th>
                    <x-table.th field="scope">Alcance</x-table.th>
                    <x-table.th field="status">Estado</x-table.th>
                  </x-slot>
                  @forelse ($reports as $key => $item)
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
                      <td class="p-1 text-center">{{ $item->star_date->format('d/m/Y') }}</td>
                      <td class="p-1 text-center">{{ $item->end_date->format('d/m/Y') }}</td>
                      <td class="p-1">{{ Str::limit($item->objective, 20, '...') }}</td>
                      <td class="p-1">{{ Str::limit($item->scope, 20, '...') }}</td>
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
                @include('sgc::livewire.report.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $reports->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
</div>