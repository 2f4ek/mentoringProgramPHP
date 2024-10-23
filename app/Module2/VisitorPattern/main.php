<?php

require_once './vendor/autoload.php';

use App\Module2\VisitorPattern\AverageSalaryReport;
use App\Module2\VisitorPattern\Company;
use App\Module2\VisitorPattern\CompanyVisitorInterface;
use App\Module2\VisitorPattern\Employee;
use App\Module2\VisitorPattern\NumberOfEmployeePerDepartmentReport;
use App\Module2\VisitorPattern\TotalNumberOfEmployeesReport;
use App\Module2\VisitorPattern\TotalSalaryReport;

// Some client code
function applyVisitors(array $companies, CompanyVisitorInterface $visitor): void
{
    foreach ($companies as $company) {
        $result = $company->accept($visitor);
        if (\is_array($result)) {
            \print_r([
                'company' => $company->getName(),
                'visitor' => $visitor::class,
                'result' => $company->accept($visitor)
            ]);
            continue;
        }

        echo \sprintf(
            "applying visitor %s for company: %s, result: %s %s",
            $visitor::class,
            $company->getName(),
            $company->accept($visitor),
            PHP_EOL
        );
    }
}

$companies = [
    $company = new Company("Company1"),
    $company2 = new Company("Company2")
];

$company->addEmployee(new Employee("Alice", 5000, "DEP1"));
$company->addEmployee(new Employee("Bob", 10000, "DEP2"));
$company->addEmployee(new Employee("Bob2", 9000, "DEP2"));

$company2->addEmployee(new Employee("Alice", 6000, "DEP1"));
$company2->addEmployee(new Employee("Bob", 12000, "DEP2"));
$company2->addEmployee(new Employee("Bob2", 10000, "DEP2"));

applyVisitors($companies, new TotalSalaryReport());
applyVisitors($companies, new TotalNumberOfEmployeesReport());
applyVisitors($companies, new AverageSalaryReport());
applyVisitors($companies, new NumberOfEmployeePerDepartmentReport());