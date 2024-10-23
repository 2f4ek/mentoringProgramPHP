<?php

namespace App\Module2\VisitorPattern;

class TotalSalaryReport implements CompanyVisitorInterface
{
    public function visitCompany(Company $company): int
    {
        $total = 0;
        foreach ($company->getEmployees() as $employee) {
            $total += $employee->getSalary();
        }

        return $total;
    }
}