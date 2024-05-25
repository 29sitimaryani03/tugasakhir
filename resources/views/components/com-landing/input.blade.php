<div class="form-input-login">
    <label for="">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? '' }}" class="form-input @error($name) is-invalid @enderror" name="{{ $name ?? '' }}" value="@isset($value){{ $value }}@else{{ old($name) }}@endisset" placeholder="{{ $placeholder ?? '' }}" id="{{ $id ?? '' }}">
    @error($name)
        <span class="text-red-500 text-sm"><i>{{ $message }}</i></span>
    @enderror

</div>
