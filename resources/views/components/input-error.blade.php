@props(['for'])

@error($for)
  <span {{ $attributes->merge(['class' => 'error text-danger']) }} role="alert">{{ $message }}</span>
@enderror
