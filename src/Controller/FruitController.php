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
     * @Route("/", name="index", method={"GET"})
     */
    public function index(): Response
    {
        $fruits = $this->getDoctrine()->getRepository(Fruit::class)->findAll();

        return $this->json(compact('fruits'));
    }

    /**
     * @Route("/{id}", name="show", method={"GET"})
     */
    public function show($id)
    {

    }

     /**
     * @Route("/", name="create", method={"POST"})
     */
    public function create()
    {

    }

     /**
     * @Route("/{id}", name="update", method={"PUT", "PATCH"})
     */
    public function update($id)
    {

    }

     /**
     * @Route("/{id}", name="delete", method={"DELETE"})
     */
    public function delete($id)
    {

    }
}
