<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportProduct implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' =>  !empty($row[0])?$row[0]:"",
            'descriptin' => !empty($row[1])?$row[1]:"",
            'mrp' => !empty($row[2])?$row[2]:"",
            'price' => !empty($row[3])?$row[3]:"",
            'company_id' => auth()->guard('company')->user()->id,   
        ]);
    }
}
