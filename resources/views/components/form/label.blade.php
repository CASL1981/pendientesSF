@props(['value'])

{{-- <label {{ $attributes }} {!! $attributes->merge(['class' => 'fw-semibold fs-6']) !!}> --}}
<label {{ $attributes }} {!! $attributes->merge(['class' => 'form-label']) !!}>
  {{ $value ?? $slot }}
</label>
