<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, ?string $oldPath = null, string $path = 'uploads')
    {
        if (!$file->isValid()) {
            return null;
        }

        $ignores = [
            'uploads/default-avatar.jpg',
        ];

        if (!is_null($oldPath) && File::exists(public_path($oldPath)) && !in_array($oldPath, $ignores)) {
            File::delete(public_path($oldPath));
        }

        $dirPath = public_path($path);
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->move($dirPath, $fileName);

        $filePath = $path . '/' . $fileName;
        return $filePath;
    }

    public function uploadPrivateFile(UploadedFile $file, ?string $oldPath = null, string $path = 'uploads')
    {
        if (!$file->isValid()) {
            return null;
        }

        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $filePath = $file->storeAs($path, $fileName, 'local');

        return $filePath;
    }
}
