<?php

namespace App\Controller;

use App\Entity\Fruit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fruit", name="fruit_")
 */
class FruitController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        $fruits = $this->getDoctrine()->getRepository(Fruit::class)->findAll();

        return $this->json(compact('fruits'));
    }
}
