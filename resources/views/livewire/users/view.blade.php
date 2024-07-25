<div>
   <div class="row">
      <div class="col-sm-12">
         <div class="card">
            <div class="card-header d-flex justify-content-between">
               <div class="header-title">
                  <h4 class="card-title">Listado de Usarios</h4>
               </div>
               <div>
                  @can('user update')
                     <button class="btn btn-primary p-2" wire:click="edit()" @if ($bulkDisabled) disabled @endif>
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>   
                     </button>
                  @endcan
                  @can('user create')
                     <button class="btn btn-primary p-2" wire:click="$set('show', true)">
                        <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" clip-rule="evenodd" d="M7.33 2H16.66C20.06 2 22 3.92 22 7.33V16.67C22 20.06 20.07 22 16.67 22H7.33C3.92 22 2 20.06 2 16.67V7.33C2 3.92 3.92 2 7.33 2ZM12.82 12.83H15.66C16.12 12.82 16.49 12.45 16.49 11.99C16.49 11.53 16.12 11.16 15.66 11.16H12.82V8.34C12.82 7.88 12.45 7.51 11.99 7.51C11.53 7.51 11.16 7.88 11.16 8.34V11.16H8.33C8.11 11.16 7.9 11.25 7.74 11.4C7.59 11.56 7.5 11.769 7.5 11.99C7.5 12.45 7.87 12.82 8.33 12.83H11.16V15.66C11.16 16.12 11.53 16.49 11.99 16.49C12.45 16.49 12.82 16.12 12.82 15.66V12.83Z" fill="currentColor" />
                         </svg>
                     </button>
                  @endcan
               </div>
            </div>
            <div class="card-body py-0">
               <div class="table-responsive">
                  <table id="user-list-table" class="table table-striped mb-0" role="grid">
                     <thead>
                        <tr>
                           <th class="py-2" rowspan="1" colspan="1" aria-label="">
                              <div class="form-check d-block">
                                 <input class="form-check-input" type="checkbox" value="" wire:model="selectAll">
                             </div>
                           </th>
                           <th class="p-2">Profile</th>
                           <th class="p-2">Nombres</th>
                           <th class="p-2">Apellidos</th>
                           <th class="p-2" width="10px">Email</th>
                           <th class="p-2">Area</th>
                           <th class="p-2">Status</th>
                           <th class="p-2">CC</th>
                           <th class="p-2">Creación</th>
                           {{-- <th style="min-width: 100px">Action</th> --}}
                        </tr>
                     </thead>
                     <tbody>
                        @foreach ($users as $item)
                            <tr wire:key="{{ $item->id }}">
                              <td class="px-6">
                                 <div class="form-check form-check-sm">
                                    <input class="form-check-input" type="checkbox"
                                    wire:model="selectedModel" 
                                    value="{{$item->id}}" 
                                    wire:click="$set('selected_id',{{$item->id}})">
                                 </div>
                              </td>
                              <td class="p-1">
                                 <div class="d-flex align-items-center">
                                    <img class="rounded img-fluid avatar-40 me-3 bg-soft-primary" src="{{ $item->profile_photo_url }}" alt="profile" loading="lazy">
                                    {{-- <h6>{{ $item->role }}</h6> --}}
                                 </div>
                              </td>
                              <td class="p-1">{{ $item->name }}</td>
                              <td class="p-1">{{ $item->lastname }}</td>
                              <td class="p-1" width="10px">{{ $item->email }}</td>
                              <td class="p-1">{{ $item->area }}</td>
                              <td class="text-center p-1"><span class="badge bg-primary">{{ $item->status ? 'Activo' : 'Inactivo' }}</span></td>
                              <td class="p-1">{{ $item->destination_id }}</td>
                              <td class="p-1">{{ $item->created_at->format('d/m/Y') }}</td>:
                              {{-- <td class="p-1">
                                 <div class="flex align-items-center list-user-action">
                                       <a class="btn btn-sm btn-icon btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#">
                                          <span class="btn-inner">
                                          <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M11.4925 2.78906H7.75349C4.67849 2.78906 2.75049 4.96606 2.75049 8.04806V16.3621C2.75049 19.4441 4.66949 21.6211 7.75349 21.6211H16.5775C19.6625 21.6211 21.5815 19.4441 21.5815 16.3621V12.3341" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path fill-rule="evenodd" clip-rule="evenodd" d="M8.82812 10.921L16.3011 3.44799C17.2321 2.51799 18.7411 2.51799 19.6721 3.44799L20.8891 4.66499C21.8201 5.59599 21.8201 7.10599 20.8891 8.03599L13.3801 15.545C12.9731 15.952 12.4211 16.181 11.8451 16.181H8.09912L8.19312 12.401C8.20712 11.845 8.43412 11.315 8.82812 10.921Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M15.1655 4.60254L19.7315 9.16854" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>
                                          </span>
                                       </a>
                                       <a class="btn btn-sm btn-icon btn-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#">
                                          <span class="btn-inner">
                                          <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor">
                                             <path d="M19.3248 9.46826C19.3248 9.46826 18.7818 16.2033 18.4668 19.0403C18.3168 20.3953 17.4798 21.1893 16.1088 21.2143C13.4998 21.2613 10.8878 21.2643 8.27979 21.2093C6.96079 21.1823 6.13779 20.3783 5.99079 19.0473C5.67379 16.1853 5.13379 9.46826 5.13379 9.46826" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M20.708 6.23975H3.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                             <path d="M17.4406 6.23973C16.6556 6.23973 15.9796 5.68473 15.8256 4.91573L15.5826 3.69973C15.4326 3.13873 14.9246 2.75073 14.3456 2.75073H10.1126C9.53358 2.75073 9.02558 3.13873 8.87558 3.69973L8.63258 4.91573C8.47858 5.68473 7.80258 6.23973 7.01758 6.23973" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                          </svg>
                                          </span>
                                       </a>
                                 </div>
                              </td> --}}
                            </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
               {!!$users->links()!!}
            </div>
         </div>
      </div>
   </div>
   @include('livewire.users.form')
</div>