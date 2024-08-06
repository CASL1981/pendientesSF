<div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col-sm-12 col-md-4">
          <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="col-sm-12 col-md-4">
          <label class="w-100">
            <input wire:model.live='keyWord' type="search" class="form-control p-2" placeholder="Buscar">
          </label>
        </div>
        <div class="col-sm-12 col-md-4">
          <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end" role="group" aria-label="Basic example">
            {{ $button }}
            @if (isset($exportable) || isset($audit))
              <div class="btn-group mx-0">
                <button class="btn btn-sm btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Exportable</a></li>
                    <li><a class="dropdown-item" href="#" wire:click="export('xlsx')" wire:loading.attr="disable">Excel</a></li>
                    <li><a class="dropdown-item" href="#" wire:click="export('xlsx')" wire:loading.attr="disable">CSV</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#" wire:click="auditoria" wire:loading.attr="disable">Auditoria</a></li>
                </ul>
              </div>
            @endif
          </div>
        </div>
      </div>
      <div class="row">
        {{ $slot }}
      </div>
      <div class="row">
        {{ $pagination }}
      </div>
    </div>
</div>