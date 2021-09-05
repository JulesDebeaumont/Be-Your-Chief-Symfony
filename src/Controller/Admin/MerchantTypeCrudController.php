<?php

namespace App\Controller\Admin;

use App\Entity\MerchantType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MerchantTypeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MerchantType::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
        ];
    }
}
