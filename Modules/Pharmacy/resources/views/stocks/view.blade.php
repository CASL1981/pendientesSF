<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12 col-md-4">
            <h4 class="card-title">Existencias actuales</h4>
          </div>
          <div class="col-sm-12 col-md-8">
            <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end" role="group" aria-label="Basic example">
              <form action="{{ route('pharmacy.stock.import')}} " method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group d-flex align-items-center">
                  <label for="customFile1" class="form-label custom-file-input"></label>
                  <input class="form-control mr-2" type="file" name="file" id="file" accept=".xlsx, .xls">
                  <button type="submit" class="btn btn-primary btn-sm ml-3">Importar</button>
                  <button type="submit" formaction="{{ route('pharmacy.stock.delete')}}" class="btn btn-danger btn-sm ml-3">Eliminar</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="table-responsive tableFixHead">

              <div class="col-12">
                <div class="table-responsive tableFixHead">
                  <table id="users-list" class="table">
                    <thead>
                      <tr>
                        <th class="p-2">
                          <div class="form-check form-check-flat form-check-primary">
                            <label class="form-check-label text-danger" style="width:10">
                              <input type="checkbox" class="form-check-input" wire:model.live="selectAll">
                              <i class="input-helper"></i></label>
                          </div>
                        </th>
                        <th>Año</th>
                        <th>Mes</th>
                        <th>Item</th>
                        <th>Descripción Producto</th>
                        <th>Cantidad</th>
                        <th>Habilitado</th>
                        <th>Codigo Unico</th>
                        <th>Fecha</th>
                      </tr>
                    </thead>
                    <tbody>
                      @forelse ($stocks as $key => $item)
                        <tr>
                        <td class="p-1">
                          <div class="form-check form-check-flat form-check-primary">
                          <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" wire:model="selectedModel"
                            value="{{ $item->id }}" wire:click="$set('selected_id',{{ $item->id }})">
                            <i class="input-helper"></i></label>
                          </div>
                        </td>
                        <td class="p-1">{{ $item->year }}</td>
                        <td class="p-1">{{ $item->period }}</td>
                        <td class="p-1">{{ $item->product_id }}</td>
                        <td class="p-1">{{ Str::limit($item->product_name, 30, '...') }}</td>
                        <td class="p-1">{{ $item->quantity }}</td>
                        <td class="p-1">{{ $item->available == 1 ? 'Si' : 'No' }}</td>
                        <td class="p-1">{{ $item->generic_code }}</td>
                        <td class="p-1">{{ $item->created_at }}</td>
                        </tr>
                      @empty
                        <tr>
                        <td colspan="7">
                          <x-otros.error-search></x-otros.error-search>
                        <td>
                        </tr>
                      @endforelse
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          {!! $stocks->links() !!}
        </div>
      </div>
    </div>
  </div>
</div>