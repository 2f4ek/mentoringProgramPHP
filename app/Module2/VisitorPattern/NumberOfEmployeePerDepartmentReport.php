<?php

namespace App\Module2\VisitorPattern;

class NumberOfEmployeePerDepartmentReport implements CompanyVisitorInterface
{
    public function visitCompany(Company $company): array
    {
        $departmentCounts = [];
        foreach ($company->getEmployees() as $employee) {
            $department = $employee->getDepartment();
            if (!isset($departmentCounts[$department])) {
                $departmentCounts[$department] = 0;
            }
            $departmentCounts[$department]++;
        }

        return $departmentCounts;
    }
}
