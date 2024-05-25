<div class="mb-3 relative">
    <label for="" class="text-sm font-medium text-slate-600 mb-1">{{ $label ?? '' }}</label>
    <input type="{{ $type ?? 'text' }}" name="{{ $name ?? '' }}" class="form-control @error($name) is-invalid @enderror border-2 border-slate-300 focus:border-sky-500" placeholder="{{ $placeholder ?? '' }}"  @isset($multiple) multiple @endisset @isset($readonly) readonly @endisset value="@isset($value){{ $value }}@else{{ old($name)}}@endisset" id="{{ $id ?? '' }}" autocomplete="off">
    @isset($btnInput)
        <span class="btn btn-primary absolute right-0 top-7" id="{{ $btnId ?? '' }}">
            <i class="fas fa-map"></i>
        </span>
    @endisset
    @error($name)
        <span class="text-red-500 text-sm"><i>{{ $message }}</i></span>
    @enderror


</div>
