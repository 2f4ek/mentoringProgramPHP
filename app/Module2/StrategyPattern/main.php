<?php

require_once './vendor/autoload.php';

use App\Module2\StrategyPattern\{
    EmployeeCollection,
    SortByDepartmentAsc,
    SortByDepartmentDesc,
    SortByNameAsc,
    SortByNameDesc,
    SortBySalaryAsc,
    SortBySalaryDesc
};
use App\Module2\VisitorPattern\Employee;

$employees = new EmployeeCollection([
    new Employee("Alice", 6000, "DEP1"),
    new Employee("Bob", 10000, "DEP2"),
    new Employee("John", 12000, "DEP3"),
]);

$strategies = [
    new SortByNameAsc(),
    new SortByNameDesc(),
    new SortBySalaryAsc(),
    new SortBySalaryDesc(),
    new SortByDepartmentAsc(),
    new SortByDepartmentDesc(),
];

foreach ($strategies as $strategy) {
    $employees->setSortingStrategy($strategy);
    $employees->sort();
    echo \print_r([
        'strategy' => $strategy::class,
        'result' => $employees->getEmployees()
    ], true);
}