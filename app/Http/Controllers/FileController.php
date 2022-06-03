<?php

namespace App\Http\Controllers;

use App\Imports\DataImport;
use App\Imports\FileImport;
use App\Interfaces\FileColumnRepositoryInterface;
use App\Interfaces\FileRepositoryInterface;
use Maatwebsite\Excel\HeadingRowImport;

use Illuminate\Http\Request;
//use Maatwebsite\Excel\Facades\Excel;
use Excel;
use Session;

class FileController extends Controller
{
    private FileRepositoryInterface $fileRepository;
    private FileColumnRepositoryInterface $fileColumnRepository;

    public function __construct( FileRepositoryInterface $fileRepository, FileColumnRepositoryInterface $fileColumnRepository)
    {
        $this->fileRepository = $fileRepository;
        $this->fileColumnRepository = $fileColumnRepository;
        
    }


    public function index()
    {
        return view('welcome');
    }


    public function store(Request $request)
    {
        $file =  $this->fileRepository->addFile(['name'=>$request->file('file')->getClientOriginalName()]);
        if($file){
            $column_ids = [];
            $headings = (new HeadingRowImport)->toArray($request->file('file'));
            foreach($headings[0][0] as $heading){
                array_push( $column_ids, $this->fileColumnRepository->addColumn([
                    'file_id' => $file->id,
                    'name' => $heading,
                ])->id);
            }
            Excel::import(new DataImport($column_ids), $request->file('file'));
           
            return redirect('/')->with('success', 'All good! imported Successfully');
        }

    }
}
