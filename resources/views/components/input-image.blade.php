@props(['name', 'image'])

<div {{ $attributes->merge(['class' => 'col-md-12']) }}>
    <img id="image-preview" src="{{ $image ? asset($image) : 'https://placehold.co/150' }}" alt="Preview" class="rounded"
        style="width: 150px; height: 150px; object-fit: cover; border: 1px solid #ddd;">
</div>
<div {{ $attributes->merge(['class' => 'form-group col-md-12']) }}>
    <label>Choose File</label>
    <input required id="image-upload" class="form-control" name="{{ $name }}" type="file" accept="image/*" />
    <x-input-error :messages="$errors->get($name)" class="mt-2" />
</div>
