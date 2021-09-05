<?php

namespace App\Controller\Admin;

use App\Entity\Quantity;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;

class QuantityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Quantity::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IntegerField::new('quantity'),
            TextField::new('unit'),

            AssociationField::new('ingredient')->formatValue(
                function ($value, $entity) {
                    return $entity->getIngredient()->getName();
                })->hideOnForm(),

            IntegerField::new('displayOrder'),

            AssociationField::new('recipe')->formatValue(
                function ($value, $entity) {
                    return $entity->getRecipe()->getName();
                })->hideOnForm(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('recipe'))
            ->add(EntityFilter::new('ingredient'))
            ;
    }
}
