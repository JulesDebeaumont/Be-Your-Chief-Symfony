<?php

namespace App\Controller\Admin;

use App\Entity\Account;
use App\Entity\Allergen;
use App\Entity\Comment;
use App\Entity\Ingredient;
use App\Entity\IngredientSort;
use App\Entity\MenuType;
use App\Entity\Merchant;
use App\Entity\MerchantSpecification;
use App\Entity\MerchantType;
use App\Entity\Person;
use App\Entity\Recipe;
use App\Entity\RecipeOrigin;
use App\Entity\RecipeRegimen;
use App\Entity\RecipeType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class DashboardController extends AbstractDashboardController
    {
        /**
         * @Route("/admin", name="admin")
         */
        public function index(): Response
        {
            return $this->render('admin/fields/dashboard.html.twig');
        }

        public function configureDashboard(): Dashboard
        {
            return Dashboard::new()
                ->setTitle('Be Your Chief');
        }

        public function configureMenuItems(): iterable
        {
            yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');

            yield MenuItem::section('Les recettes');
            yield MenuItem::linkToCrud('Recettes', 'fas fa-cookie', Recipe::class);
            yield MenuItem::linkToCrud('Type de recette', 'fas fa-blender', RecipeType::class);
            yield MenuItem::linkToCrud('Origine de recette', 'fas fa-flag', RecipeOrigin::class);
            yield MenuItem::linkToCrud('Regime de recette', 'fas fa-carrot', RecipeRegimen::class);
            yield MenuItem::linkToCrud('Type de Menu', 'fas fa-ice-cream', MenuType::class);

            yield MenuItem::section('Les ingrédients');
            yield MenuItem::linkToCrud('Ingrédients', 'fas fa-cheese', Ingredient::class);
            yield MenuItem::linkToCrud('Type ingrédients', 'fas fa-hamburger', IngredientSort::class);
            yield MenuItem::linkToCrud('Allergènes', 'fas fa-pepper-hot', Allergen::class);

            yield MenuItem::section('Utilisateurs');
            yield MenuItem::linkToCrud('Comptes', 'fas fa-address-book', Account::class);
            yield MenuItem::linkToCrud('Utilisateurs classiques', 'fas fa-user', Person::class);
            yield MenuItem::linkToCrud('Restaurateurs', 'fas fa-utensils', Merchant::class);
            yield MenuItem::linkToCrud('Type de restaurateurs', 'fas fa-shopping-cart', MerchantType::class);
            yield MenuItem::linkToCrud('Spécialité restaurateurs', 'fas fa-lemon', MerchantSpecification::class);

            yield MenuItem::section('Commentaires');
            yield MenuItem::linkToCrud('Commentaires', 'fas fa-wrench', Comment::class);
        }
    }
