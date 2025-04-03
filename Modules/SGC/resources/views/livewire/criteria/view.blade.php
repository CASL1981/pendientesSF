<div>
    @if ($checklist_id > 0)
        <div class="row mb-1">
            <div class="col-12">
                <div class="card">
                    <div class="row">
                        @foreach ($checklist as $item)
                            <div class="col-md-5">
                                <div class="card-body">
                                    <label for="type"><strong>Datos de la Actividad</strong></label>
                                    <p class="ml-5">Tipo de actividad: <strong>{{ $item->type }}</strong></p>
                                    <p class="ml-5">Fecha de la Actividad: <strong>{{ $item->date_activity->format('d/m/Y') }}</strong></p>
                                    {{-- <p class="ml-5">Email: <strong>{{ $provider->email }}</strong></p> --}}
                                </div>
                            </div>
                            <div class="col-md-5 b-1">
                                <div class="card-body">
                                    <label for="type"><strong>Datos del Proceso</strong></label>
                                    <p class="ml-5">Proceso(s): <strong>{{ $item->process }}</strong></p>
                                    <p class="ml-5">Cento de Operación: <strong>{{ $item->destination->name }}</strong></p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card-body">
                                    <label for="type"><strong>Opciones</strong></label>
                                    <button class="p-1 btn btn-icon btn-sm btn-segundary" wire:click="regresar" title="Regresar">
                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                            <path d="M5.89155 8.94037C5.89155 8.94037 9.06324 4.5 13.8208 4.5C15.9237 4.5 17.9406 5.3354 19.4276 6.82242C20.9146 8.30943 21.75 10.3263 21.75 12.4292C21.75 14.5322 20.9146 16.549 19.4276 18.036C17.9406 19.5231 15.9237 20.3585 13.8208 20.3585C11.0646 20.3585 8.63701 18.851 7.21609 16.9429" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M4.01239 12.7139C4.09736 12.7198 4.18269 12.7029 4.25979 12.6639L9.27776 10.0921C9.41563 10.0211 9.50597 9.88782 9.51635 9.73793C9.52673 9.58804 9.45563 9.44359 9.32886 9.35425L4.71338 6.11519C4.57901 6.02124 4.40214 6.00373 4.25173 6.07095C4.10075 6.13755 4.00082 6.27715 3.98984 6.43576L3.58736 12.2466C3.57637 12.4053 3.6561 12.5573 3.79645 12.6441C3.8625 12.6854 3.93712 12.7087 4.01239 12.7139" fill="currentColor"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-control">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="evaluated"><strong>Criterio Evaluado</strong></label>
                                <textarea wire:model="evaluated" class="form-control form-control-sm" rows="2" 
                                placeholder="Descripción" id="evaluated"></textarea>
                                <x-form.input-error for="evaulated" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="description"><strong>Descripción</strong></label>
                                <textarea wire:model="description" class="form-control form-control-sm" rows="2" 
                                placeholder="Descripción" id="description"></textarea>
                                <x-form.input-error for="description" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <x-form.label for="findings">Hallazgos</x-form.label>
                                <x-select wire:model="findings" class="form-control-sm" id="findings"
                                :options="['C' => 'C', 'NC' => 'NC', 'O' => 'O', 'N/A' => 'N/A']" placeholder="-- Elige una opción --" id="findings" />
                                <x-form.input-error for="findings"/>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="observations"><strong>Observaciones</strong></label>
                                <textarea wire:model="observations" class="form-control form-control-sm" rows="2" 
                                placeholder="Descripción" id="observations"></textarea>
                                <x-form.input-error for="observations" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="evidence"><strong>Evidencia</strong></label>
                                <textarea wire:model="evidence" class="form-control form-control-sm" rows="2" 
                                placeholder="Descripción" id="evidence"></textarea>
                                <x-form.input-error for="evidence" />
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary float-right mt-4" wire:click.prevent="addCriteria()">Add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="container-fluid mt-1 d-flex justify-content-center w-100"> --}}
                        <div class="mt-1 d-flex justify-content-center w-100">
                            <div class="table-responsive w-100">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px;">#</th>
                                            <th class="text-center" style="width: 200px;">Criterio</th>
                                            <th class="text-center" style="width: 200px;">Descipción</th>
                                            <th class="text-center" style="width: 10px;">H</th>
                                            <th class="text-center" style="width: 200px;">Observaciones</th>
                                            <th class="text-center" style="width: 200px;">Evidencia</th>
                                            <th class="text-center" style="width: 10px">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($criteria as $key => $item)
                                            {{-- {{ dd($item) }} --}}
                                            <tr>
                                                <td class="p-1 text-wrap" style="width: 10px">{{ $key + 1 }}</td>
                                                <td class="p-1 text-wrap" style="width: 200px;">{{ Str::limit($item->evaluated, 200, '...') }}</td>
                                                <td class="p-1 text-wrap" style="width: 200px;">{{ Str::limit($item->description, 200, '...') }}</td>
                                                <td class="p-1 text-center" style="width: 10px;">{{ $item->findings }}</td>
                                                <td class="p-1 text-wrap" style="width: 200px;">{{ Str::limit($item->observations, 200, '...') }}</td>
                                                <td class="p-1 text-wrap" style="width: 200px;">{{ $item->evidence }}</td>
                                                <td style="width: 10px">
                                                    <button class="p-1 btn btn-icon btn-sm btn-primary" wire:click="edit({{ $item->id }})" title="Visualizar o ActualizarCriterio">
                                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-16" width="16" height="16" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.09756 12C8.09756 14.1333 9.8439 15.8691 12 15.8691C14.1463 15.8691 15.8927 14.1333 15.8927 12C15.8927 9.85697 14.1463 8.12121 12 8.12121C9.8439 8.12121 8.09756 9.85697 8.09756 12ZM17.7366 6.04606C19.4439 7.36485 20.8976 9.29455 21.9415 11.7091C22.0195 11.8933 22.0195 12.1067 21.9415 12.2812C19.8537 17.1103 16.1366 20 12 20H11.9902C7.86341 20 4.14634 17.1103 2.05854 12.2812C1.98049 12.1067 1.98049 11.8933 2.05854 11.7091C4.14634 6.88 7.86341 4 11.9902 4H12C14.0683 4 16.0293 4.71758 17.7366 6.04606ZM12.0012 14.4124C13.3378 14.4124 14.4304 13.3264 14.4304 11.9979C14.4304 10.6597 13.3378 9.57362 12.0012 9.57362C11.8841 9.57362 11.767 9.58332 11.6597 9.60272C11.6207 10.6694 10.7426 11.5227 9.65971 11.5227H9.61093C9.58166 11.6779 9.56215 11.833 9.56215 11.9979C9.56215 13.3264 10.6548 14.4124 12.0012 14.4124Z" fill="currentColor"></path></svg>
                                                    </button>
                                                    <button class="p-1 btn btn-icon btn-sm btn-success" wire:click="addObservation({{ $item->id }})" title="Adicionar o Modificar Observación">
                                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2 10.6699C2 5.88166 5.84034 2 10.5776 2C12.8526 2 15.0343 2.91344 16.6429 4.53936C18.2516 6.16529 19.1553 8.37052 19.1553 10.6699C19.1553 15.4582 15.3149 19.3399 10.5776 19.3399C5.84034 19.3399 2 15.4582 2 10.6699ZM19.0134 17.6543L21.568 19.7164H21.6124C22.1292 20.2388 22.1292 21.0858 21.6124 21.6082C21.0955 22.1306 20.2576 22.1306 19.7407 21.6082L17.6207 19.1785C17.4203 18.9766 17.3076 18.7024 17.3076 18.4164C17.3076 18.1304 17.4203 17.8562 17.6207 17.6543C18.0072 17.2704 18.6268 17.2704 19.0134 17.6543Z" fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                    <button class="p-1 btn btn-icon btn-sm btn-danger" wire:click="addFinding({{ $item->id }})" title="Adicionar o Modificar NC">
                                                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                                            <path d="M17.9184 14.32C17.6594 14.571 17.5404 14.934 17.5994 15.29L18.4884 20.21C18.5634 20.627 18.3874 21.049 18.0384 21.29C17.6964 21.54 17.2414 21.57 16.8684 21.37L12.4394 19.06C12.2854 18.978 12.1144 18.934 11.9394 18.929H11.6684C11.5744 18.943 11.4824 18.973 11.3984 19.019L6.96839 21.34C6.74939 21.45 6.50139 21.489 6.25839 21.45C5.66639 21.338 5.27139 20.774 5.36839 20.179L6.25839 15.259C6.31739 14.9 6.19839 14.535 5.93939 14.28L2.32839 10.78C2.02639 10.487 1.92139 10.047 2.05939 9.65C2.19339 9.254 2.53539 8.965 2.94839 8.9L7.91839 8.179C8.29639 8.14 8.62839 7.91 8.79839 7.57L10.9884 3.08C11.0404 2.98 11.1074 2.888 11.1884 2.81L11.2784 2.74C11.3254 2.688 11.3794 2.645 11.4394 2.61L11.5484 2.57L11.7184 2.5H12.1394C12.5154 2.539 12.8464 2.764 13.0194 3.1L15.2384 7.57C15.3984 7.897 15.7094 8.124 16.0684 8.179L21.0384 8.9C21.4584 8.96 21.8094 9.25 21.9484 9.65C22.0794 10.051 21.9664 10.491 21.6584 10.78L17.9184 14.32Z" fill="currentColor" />
                                                        </svg>
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('sgc::livewire.criteria.form')
    @else
    <div class="row mb-1">
        <div class="col-12">
            <div class="card">
                <div class="row">
                    <h2>Seleccione una lista de cehqueo</h2>
                </div>
                <button class="p-1 btn btn-icon btn-sm btn-segundary" wire:click="regresar" title="Regresar">
                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M5.89155 8.94037C5.89155 8.94037 9.06324 4.5 13.8208 4.5C15.9237 4.5 17.9406 5.3354 19.4276 6.82242C20.9146 8.30943 21.75 10.3263 21.75 12.4292C21.75 14.5322 20.9146 16.549 19.4276 18.036C17.9406 19.5231 15.9237 20.3585 13.8208 20.3585C11.0646 20.3585 8.63701 18.851 7.21609 16.9429" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                        <path d="M4.01239 12.7139C4.09736 12.7198 4.18269 12.7029 4.25979 12.6639L9.27776 10.0921C9.41563 10.0211 9.50597 9.88782 9.51635 9.73793C9.52673 9.58804 9.45563 9.44359 9.32886 9.35425L4.71338 6.11519C4.57901 6.02124 4.40214 6.00373 4.25173 6.07095C4.10075 6.13755 4.00082 6.27715 3.98984 6.43576L3.58736 12.2466C3.57637 12.4053 3.6561 12.5573 3.79645 12.6441C3.8625 12.6854 3.93712 12.7087 4.01239 12.7139" fill="currentColor"></path>
                    </svg>
                </button>
            </div>
        </div>
    @endif
</div>