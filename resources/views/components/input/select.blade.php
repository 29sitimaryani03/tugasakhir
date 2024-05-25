<div class="mb-3">
    <label for="" class="text-sm font-medium text-slate-600 mb-1">{{ $label ?? '' }}</label>
    <select id="{{ $id ?? '' }}"  name="{{ $name ?? '' }}" class="form-control @error($name) is-invalid @enderror">
        {{ $slot }}
    </select>
    @error($name)
        <span class="text-red-500 text-sm"><i>{{ $message }}</i></span>
    @enderror
</div>
