<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GetMeController extends AbstractController
{
    /**
     * @Route ("/me", name="app_me", methods={"GET"})
     */
    public function account(): \Symfony\Component\HttpFoundation\JsonResponse
    {
        return $this->json([
                'user' => $this->getUser() ? $this->getUser()->getId() : null,
                ]
        );
    }
}
