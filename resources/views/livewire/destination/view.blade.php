<div class="row">
    <div class="col-12 grid-margin">
      <x-otros.view-card :exportable="$exportable" :audit="$audit">
        <x-slot name="title">Centros de Costos <small>destination</small></x-slot>
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
                  <x-slot name="head" model="$destinations">
                    <th class="p-2">
                      <div class="form-check form-check-flat form-check-primary" >
                          <label class="form-check-label text-danger" style="width:10">
                          <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                          <i class="input-helper"></i></label>
                      </div>
                    </th>
                    <x-table.th weight="80px" field="id">#</x-table.th>
                    <x-table.th field="costcenter">CC</x-table.th>
                    <x-table.th field="name">Descripción</x-table.th>
                    <x-table.th field="address">Dirección</x-table.th>
                    <x-table.th field="phone">Telefono</x-table.th>
                    <x-table.th field="location">Ubicación</x-table.th>
                    <x-table.th field="minimun">Minimo</x-table.th>
                    <x-table.th field="maximun">Maximo</x-table.th>
                  </x-slot>
                  @forelse ($destinations as $key => $item)
                    <tr>
                      <td class="p-1">
                        <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input"
                            wire:model="selectedModel"
                            value="{{$item->id}}"
                            wire:click="$set('selected_id',{{$item->id}})"
                            >
                        <i class="input-helper"></i></label>
                        </div>
                      </td>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->costcenter }}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->address }}</td>
                      <td>{{ $item->phone }}</td>
                      <td>{{ $item->location }}</td>
                      <td>{{ $item->minimun }}</td>
                      <td>{{ $item->maximun }}</td>
                    </tr>
                  @empty
                  <tr>
                    <td colspan="7">
                      <x-otros.error-search></x-otros.error-search>
                    <td>
                  </tr>
                  @endforelse
                </x-table.table>
                @include('livewire.destination.form')
            </div>
        </div>
        <x-slot name="pagination">
          {!! $destinations->links() !!}
        </x-slot>
      </x-otros.view-card>
    </div>
  </div>
  
  @push('styles')
  
  @endpush
  @push('scripts')
  {{-- <script>
    $(document).ready(function() {
      $('#table-jsquery').DataTable({
        "paging":   false,
        "ordering": false,
        "info":     false,
        "autoWidth": true,
        "scrollX": true,
        // "scrollCollapse": false,
        "scrollY": 300,
        "searching": false
      });
    });
  
  </script> --}}
  
  @endpush