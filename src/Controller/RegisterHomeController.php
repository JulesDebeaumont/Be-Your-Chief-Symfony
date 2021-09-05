<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    class RegisterHomeController extends AbstractController
    {
        /**
         * @Route("/register/home", name="register_home")
         */
        public function index(): Response
        {
            return $this->render('register_home/index.html.twig');
        }
    }
