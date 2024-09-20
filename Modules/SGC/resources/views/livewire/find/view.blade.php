<div class="container">
    <div class="card">
        <div class="card-head">
            <h2>No Conformidades</h2>
        </div>
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description"><strong>Descripción</strong></label>
                            <textarea wire:model="description" class="form-control form-control-sm" rows="10" 
                            placeholder="Descripción" id="description"></textarea>
                            <x-form.input-error for="description" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="evidence"><strong>Evidencia</strong></label>
                            <textarea wire:model="evidence" class="form-control form-control-sm" rows="10" 
                            placeholder="Descripción" id="evidence"></textarea>
                            <x-form.input-error for="evidence" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="consequence"><strong>Consecuecnia</strong></label>
                            <textarea wire:model="consequence" class="form-control form-control-sm" rows="10" 
                            placeholder="Descripción" id="consequence"></textarea>
                            <x-form.input-error for="consequence" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="requirement"><strong>Requisito Incumplido</strong></label>
                            <textarea wire:model="requirement" class="form-control form-control-sm" rows="10" 
                            placeholder="Descripción" id="requirement"></textarea>
                            <x-form.input-error for="requirement" />
                        </div>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-secondary m-2" wire:click="regresar">Regresar</button>
            <button type="button" class="btn btn-primary m-2" wire:click.prevent="method()">Guardar</button>
        </div>
        <div class="card-footer">
        </div>
    </div>
</div>