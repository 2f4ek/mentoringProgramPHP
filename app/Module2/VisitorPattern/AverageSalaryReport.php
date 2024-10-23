<?php

namespace App\Module2\VisitorPattern;

class AverageSalaryReport implements CompanyVisitorInterface
{
    public function visitCompany(Company $company): float
    {
        $totalSalary = 0;
        $employees = $company->getEmployees();
        foreach ($employees as $employee) {
            $totalSalary += $employee->getSalary();
        }

        return \count($employees) > 0 ? $totalSalary / \count($employees) : 0;
    }
}
