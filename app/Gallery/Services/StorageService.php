<?php

namespace Gallery\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function __construct(Storage $storage, FileRepository $fileRepository)
    {
    }

    public function storeFile(UploadedFile $uploadedFile)
    {

    }
}
