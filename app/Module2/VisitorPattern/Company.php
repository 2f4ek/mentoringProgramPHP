<?php

namespace App\Module2\VisitorPattern;

class Company
{
    public function __construct(private readonly string $name, private array $employees = [])
    {
    }

    public function addEmployee(Employee $employee): void
    {
        $this->employees[] = $employee;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmployees(): array
    {
        return $this->employees;
    }

    public function accept(CompanyVisitorInterface $visitor)
    {
        return $visitor->visitCompany($this);
    }
}
