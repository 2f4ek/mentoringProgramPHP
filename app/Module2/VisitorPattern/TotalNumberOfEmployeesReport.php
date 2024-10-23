<?php

namespace App\Module2\VisitorPattern;

class TotalNumberOfEmployeesReport implements CompanyVisitorInterface
{
    public function visitCompany(Company $company): int
    {
        return \count($company->getEmployees());
    }
}
