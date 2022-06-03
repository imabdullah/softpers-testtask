<?php

namespace App\Repositories;

use App\Interfaces\FileRepositoryInterface;
use App\Models\File;

class FileRepository implements FileRepositoryInterface 
{
 
    public function addFile(array $fileDetails)
    {
        return File::create($fileDetails);
    }
}