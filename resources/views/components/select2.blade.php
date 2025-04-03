{{-- @props([
  'options' => [],
  'disabled' => false])


<div wire:ignore x-data="{ }" x-init="() => {
	$('.select2').select2();
	$('.select2').on('change', function(e) {

	let elementName = $(this).attr('id');
	@this.set(elementName, e.target.value);
		Livewire.hook('message.processed', (m, component) => {
			$('.select2').select2();
		})

	})
}">
    <select {!! $attributes->merge(['class' => 'form-control form-control-sm select2' ]) !!} {{ $disabled ? 'disabled' : '' }}>
        <option value="">--- Seleccione ---</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div> --}}


@props([
    'options' => [],
    'disabled' => false,
])

<div wire:ignore 
     x-data="{
         options: @js($options)
     }"
     x-init="() => {
         const select = $refs.select2;
         // Inicializar Select2 inicialmente
         $(select).select2();

         // Vincular el cambio del select a Livewire
         $(select).on('change', function(e) {
             let elementName = $(this).attr('id');
             @this.set(elementName, e.target.value);
         });

         // Escuchar el evento 'resetOptions' emitido por Livewire
         Livewire.on('resetOptions', newOptions => {
             console.log('Evento resetOptions recibido:', newOptions);
             
             // Si newOptions es un array de un solo elemento, extraer ese objeto
             if (Array.isArray(newOptions) && newOptions.length === 1) {
                 newOptions = newOptions[0];
             }

             // Actualizar la variable local y reconstruir el select
             options = newOptions;
             $(select).empty();
             $(select).append(new Option('--- Seleccione ---', ''));
             
             Object.entries(options).forEach(([key, value]) => {
                 $(select).append(new Option(value, key));
             });

             // Reiniciar la selección y actualizar Select2
             $(select).val('').trigger('change');
             $(select).select2();
         });

         // Opcional: re-inicializar Select2 tras cada actualización de Livewire
         Livewire.hook('message.processed', (message, component) => {
             $(select).select2();
         });
     }">
    <select x-ref="select2" {!! $attributes->merge(['class' => 'form-control form-control-sm select2']) !!} {{ $disabled ? 'disabled' : '' }}>
        <option value="">--- Seleccione ---</option>
        @foreach ($options as $key => $option)
            <option value="{{ $key }}">{{ $option }}</option>
        @endforeach
    </select>
</div>