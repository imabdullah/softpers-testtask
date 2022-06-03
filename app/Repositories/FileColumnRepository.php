<?php

namespace App\Repositories;

use App\Interfaces\FileColumnRepositoryInterface;
use App\Models\FileColumn;

class FileColumnRepository implements FileColumnRepositoryInterface 
{
 
    public function addColumn(array $columnDetails)
    {
     return FileColumn::create($columnDetails);   
    }
}