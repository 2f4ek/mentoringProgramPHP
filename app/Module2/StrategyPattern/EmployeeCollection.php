<?php

namespace App\Module2\StrategyPattern;

use App\Module2\VisitorPattern\Employee;

class EmployeeCollection
{
    private ?SortingStrategyInterface $sortingStrategy = null;

    public function __construct(private array $employees = [])
    {
    }

    public function add(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function setSortingStrategy(SortingStrategyInterface $strategy): void
    {
        $this->sortingStrategy = $strategy;
    }

    public function sort(): void
    {
        $this->sortingStrategy?->sort($this->employees);
    }

    public function getEmployees(): array
    {
        $result = [];
        foreach ($this->employees as $employee) {
            $result[] = \sprintf(
                'Employee name: %s, salary: %s, department: %s',
                $employee->getName(),
                $employee->getSalary(),
                $employee->getDepartment()
            );
        }

        return $result;
    }
}
