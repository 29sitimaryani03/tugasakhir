<div class="mb-3">
    <label for="summernote" class="text-sm font-medium text-slate-600 mb-1">{{ $label ?? '' }}</label>
    <textarea name="{{ $name ?? '' }}" id="summernote" cols="30" rows="10" class="form-control @error($name) is-invalid @enderror border-2 border-slate-300 focus:border-sky-500" placeholder="{{ $placeholder ?? '' }}">@isset($value){{ $value }}@else{{ old($name) }}@endisset</textarea>

    @error($name)
        <span class="text-red-500 text-sm"><i>{{ $message }}</i></span>
    @enderror
</div>
