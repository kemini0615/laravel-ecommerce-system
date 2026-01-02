<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

trait FileUploadTrait
{
    public function uploadFile(UploadedFile $file, string $path = 'uploads')
    {
        if (!$file->isValid()) {
            return null;
        }

        $dirPath = public_path($path);
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();

        $file->move($dirPath, $fileName);

        $filePath = $path . '/' . $fileName;
        return $filePath;
    }
}
