<?php

namespace App\Imports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\ToModel;

class EmployeesImport implements ToModel
{
    private $rows = 0;
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        $count_row = $this->rows++;
        if ($count_row < 100) {
            return null;
        } else {
            return new Employee([
                'name'     => $row['0'],
                'email'    => $row['1'],
                'company_id' => $row['2'],
            ]);
        }
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }
}
