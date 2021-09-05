<?php

namespace App\Controller\Admin;

use App\Entity\MerchantSpecification;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MerchantSpecificationCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MerchantSpecification::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
