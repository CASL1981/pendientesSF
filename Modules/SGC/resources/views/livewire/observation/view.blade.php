<div class="container">
    <div class="card">
        <div class="card-head">
            <h2 class="mx-5 mt-1">Observaciones</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="description"><strong>Descripción</strong></label>
                            <textarea wire:model="description" class="form-control form-control-sm" rows="8" 
                            placeholder="Descripción" id="description"></textarea>
                            <x-form.input-error for="description" />
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-secondary m-2" wire:click="regresar">Regresar</button>
            <button type="button" class="btn btn-primary m-2" wire:click.prevent="store()">Guardar</button>
        </div>
    </div>
</div>