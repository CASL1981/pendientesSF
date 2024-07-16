@props(['value'])

<label {{ $attributes }} {!! $attributes->merge(['class' => 'fw-semibold fs-6']) !!}>
  {{ $value ?? $slot }}
</label>
