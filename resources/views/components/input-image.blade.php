<div {{ $attributes->merge(['class' => 'col-md-12']) }}>
    <img id="{{ $previewId }}" src="{{ asset($image) }}" alt="Preview" class="rounded"
        style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd;">
</div>
<div {{ $attributes->merge(['class' => 'form-group col-md-12']) }}>
    <label for="{{ $inputId }}">Choose File</label>
    <input required id="{{ $inputId }}" class="form-control input-image" name="{{ $name }}" type="file"
        accept="image/*" data-preview-id="{{ $previewId }}" />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
