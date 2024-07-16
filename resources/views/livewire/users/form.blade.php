<x-confirmation-modal wire:model="show" maxWidth="xl">
    <x:slot name="title">Crear Usuario</x:slot>
    <x:slot name="content">
        <!--begin::Form-->
        <form id="kt_modal_add_user_form" class="form" action="#">
            <!--begin::Scroll-->
            <div class="d-flex flex-column scroll-y px-5 px-lg-10" id="kt_modal_add_user_scroll" data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-max-height="auto" data-kt-scroll-dependencies="#kt_modal_add_user_header" data-kt-scroll-wrappers="#kt_modal_add_user_scroll" data-kt-scroll-offset="300px">
                <!--begin::Input group-->
                <div class="row mb-7">
                    <div class="form-group col-md-3">
                        <x-label for="identification" value="{{ __('Identificación') }}" />
                        <x-input type="text" wire:model="identification" class="form-control-sm" maxlength="12"></x-input>
                        <x-input-error for="identification" class="mt-2"/>
                    </div>
                    <div class="form-group col-md-3">
                        <x-label for="name" value="{{ __('Nombres') }}" />
                        <x-input type="text" wire:model="name" class="form-control-sm" maxlength="100"></x-input>
                        <x-input-error for="name" class="mt-2"/>
                    </div>
                    <div class="form-group col-md-3">
                        <x-label for="lastname" value="{{ __('Apellidos') }}" />
                        <x-input type="text" wire:model="lastname" class="form-control-sm" maxlength="100"></x-input>
                        <x-input-error for="lastname" class="mt-2"/>
                    </div>
                    <div class="form-group col-md-3">
                        <x-label for="area" value="{{ __('Area') }}" />
                        <x-select wire:model="area" class="form-control-sm" id="area" 
                        :options="['Administrativa' => 'Administrativa', 'Comercial' => 'Comercial', 'Farmacia' => 'Farmacia', 'Financiero' => 'Financiero']"/>
                        <x-input-error for="area" class="mt-2"/>
                    </div>
                </div>
                <!--end::Input group-->
                <!--begin::Input group-->
                <div class="row mb-7">
                    <div class="form-group col-md-3">
                        <x-label for="role_id" value="{{ __('Role') }}" />
                        <x-select wire:model="role_id" class="form-control-sm" id="role_id" :options="$roles"/>
                        <x-input-error for="role_id" class="mt-2"/>
                    </div>
                    <div class="form-group col-md-6">
                        <x-label for="email" value="{{ __('Email') }}" />
                        <x-input wire:model="email" class="form-control-sm" id="email" />
                        <x-input-error for="email" class="mt-2"/>
                    </div>
                </div>

            </div>
            <!--end::Scroll-->

        </form>
        <!--end::Form-->
    </x:slot>
    <x:slot name="footer">
        <button type="button" class="btn btn-secondary" wire:click.prevent="cancel()">Cerrar</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="method()">Guardar</button>
       {{-- <x-button>Guardar</x-button> --}}
    </x:slot>
 </x-confirmation-modal>