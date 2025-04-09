@props([
  'options' => [],
  'selected' => null,
  'disabled' => false])

<select {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
  'class' => 'form-control form-control-sm' ]) !!}>
  <option value="">--- Seleccione ---</option>
  @foreach($options as $key => $value)
      <option value="{{ $key }}" {{ $key == $selected ? 'selected' : '' }}>{{ $value }}</option>
  @endforeach
</select>
