<?php

namespace App\Controller\Admin;

use App\Entity\Recipe;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\Field;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Filter\EntityFilter;
use Vich\UploaderBundle\Form\Type\VichImageType;

class RecipeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Recipe::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            ImageField::new('imageName', 'Image')
                ->setBasePath('/images/recipes')
                ->setUploadDir('public/images/recipes')
                ->hideOnForm(),

            Field::new('imageFile')
                ->setFormType(VichImageType::class)
                ->setTranslationParameters(['form.label.delete' => 'Supprimer'])
                ->onlyOnForms(),

            TextField::new('name'),
            TextEditorField::new('description'),
            IntegerField::new('prepTime')->onlyOnForms(),
            IntegerField::new('cookTime')->onlyOnForms(),
            IntegerField::new('servingNb')->onlyOnForms(),
            IntegerField::new('difficulty')->onlyOnForms(),
            IntegerField::new('priceLvl')->onlyOnForms(),

            AssociationField::new('menuType')
                ->setTemplatePath('admin/fields/menu.html.twig'),

            AssociationField::new('comments')
                ->setTemplatePath('admin/fields/commentsFromRecipe.html.twig')
                ->hideOnForm(),

            AssociationField::new('quantities')
                ->setTemplatePath('admin/fields/quantities.html.twig')
                ->hideOnForm(),

            AssociationField::new('steps')
                ->setTemplatePath('admin/fields/steps.html.twig')
                ->hideOnForm(),

            AssociationField::new('accountsFavorite', 'Favorite')
                ->formatValue(
                function ($value, $entity) {
                    return count($entity->getAccountsFavorite()->getValues());
                })
                ->hideOnForm(),

            AssociationField::new('origin')->formatValue(
                function ($value, $entity) {
                    return $entity->getOrigin()->getName();
                }),

            AssociationField::new('type')->formatValue(
                function ($value, $entity) {
                    return $entity->getType()->getName();
                }),

            AssociationField::new('regimen')->formatValue(
                function ($value, $entity) {
                    return $entity->getRegimen()->getName();
                }),

            AssociationField::new('account')->formatValue(
                function ($value, $entity) {
                    return $entity->getAccount()->getEmail();
                })->hideOnForm(),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add(EntityFilter::new('account'))
            ;
    }
}
