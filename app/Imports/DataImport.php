<?php 

namespace App\Imports;

use App\Models\FileData;
use Maatwebsite\Excel\Concerns\ToModel;

use Maatwebsite\Excel\Concerns\WithStartRow;


class DataImport implements ToModel,  WithStartRow
{

    private $column_ids; 
    public function __construct(array $column_ids = [])
    {
        $this->column_ids = $column_ids; 
    }

    public function model(array $rowData)
    {
        foreach($rowData as $key => $data){
            FileData::create([
                'column_id'=>$this->column_ids[$key],
                'data'=>$data!=null?$data:'',
            ]);
        }
       
    }

    public function startRow(): int
    {
        return 2;
    }
}