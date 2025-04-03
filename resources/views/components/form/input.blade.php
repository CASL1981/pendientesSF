@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'form-control form-control-sm form-control-solid mb-3 mb-lg-0']) !!}>
