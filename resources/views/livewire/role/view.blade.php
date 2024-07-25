<div>
    <x-otros.view-card>
      <x-slot name="title">Roles</x-slot>
      <x-slot name="button">
        <div class="btn-group " role="group" aria-label="Basic example">
          @can('role delete')
            <button class="btn btn-primary p-2" wire:click.prevent="$dispatch('destroyRole')"
                @if ($bulkDisabled) disabled @endif>
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                </svg>
            </button>
          @endcan
          @can('role update')
            <button class="btn btn-primary p-2" wire:click="edit()"
            @if ($bulkDisabled) disabled @endif>
              <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-24" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
            </button>
          @endcan
          @can('role create')
            <button class="btn btn-primary p-2" wire:click="$set('show', true)">
                <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor" />
                </svg>
            </button>
          @endcan
        </div>
      </x-slot>
      <div class="col-12">
        <div class="table-responsive tableFixHead">
          <table id="users-list" class="table">
            <thead>
              <th class="p-2"></th>
              <x-table.th field="name" :sortField="$sortField" :sortDirection="$sortDirection">Nombre</x-table.th>
              <th class="text-center">Utilizados</th>
            </thead>
            <tbody>
              @forelse ($roles as $row)
                <tr>
                  <div class="form-group">
                      <td class="p-1 w-2 text-nowrap">
                        <div class="form-check">
                            <div class="form-check form-check-info">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" name="selectedModelRadio"
                              wire:model="selectedModelRadio"
                              value="{{$row->id}}"
                              wire:click="$set('selected_id',{{$row->id}})"
                              wire:change="$dispatch('role_id',{id: {{$row->id}} })"
                              ><i class="input-helper"></i></label>
                          </div>
                        </div>
                      </td>
                      <td>{{ $row->name }}</td>
                      <td class="text-center">{{ $row->count_user }}</td>
                  </div>
                </tr>
              @empty
              <tr>
                <td colspan="7">
                    <div class="alert alert-warning" role="alert">
                        <i class="far fa-window-close"></i>
                        <strong>Up!</strong> Datos no Encontrados
                    </div>
                </td>
              </tr>
              @endforelse
              @include('livewire.role.form')
            </tbody>
          </table>
        </div>
      </div>
      <x-slot name="pagination">
        {{-- {{ $roles->links() }} --}}
      </x-slot>
    </x-otros.view-card>
  </div>

  @push('styles')

  @endpush

  @push('scripts')
  <script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('destroyRole', (id) => {
          Swal.fire({
              title: 'Estas segro?',
              text: "¡Deseas Eliminar este Role!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Si, Eliminalo!'
              }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.dispatch('deleteRole')
              }});
        });
    });
  </script>
  @endpush