<?php

namespace App\Module2\VisitorPattern;

interface CompanyVisitorInterface
{
    public function visitCompany(Company $company): mixed;
}
