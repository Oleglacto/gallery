<?php

namespace Gallery\Repositories;

use Gallery\Models\File;

class FileRepository
{
    /**
     * @var File
     */
    private $fileModel;

    public function __construct(File $fileModel)
    {
        $this->fileModel = $fileModel;
    }

    public function create(array $attributes): File
    {
        return $this->fileModel->create([

        ]);
    }
}
