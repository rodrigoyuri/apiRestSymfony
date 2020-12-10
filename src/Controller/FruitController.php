<?php

namespace App\Controller;

use App\Entity\Fruit;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/fruits", name="fruit_")
 */
class FruitController extends AbstractController
{
    /**
     * @Route("/", name="index", methods={"GET"})
     */
    public function index(): Response
    {
        $fruits = $this->getDoctrine()->getRepository(Fruit::class)->findAll();

        return $this->json(compact('fruits'));
    }

    /**
     * @Route("/{id}", name="show", methods={"GET"})
     */
    public function show($id)
    {
        $fruit = $this->getDoctrine()->getRepository(Fruit::class)->find($id);

        return $this->json(compact('fruit'));
    }

     /**
     * @Route("/", name="create", methods={"POST"})
     */
    public function create(Request $request)
    {
        $data = $request->request->all();

        $fruit = new Fruit();
        $fruit->setName($data['name']);
        $fruit->setDescription($data['description']);
        $fruit->setPrice($data['price']);
        $fruit->setSlug($data['slug']);
        $fruit->setCreatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));
        $fruit->setUpdatedAt(new \DateTime('now', new \DateTimeZone('America/Sao_Paulo')));

        $doctrine = $this->getDoctrine()->getManager();

        $doctrine->persist($fruit);
        $doctrine->flush();

        return $this->json([
            'data' => 'Curso cadastrada com Sucesso!'
        ]);
    }

     /**
     * @Route("/{id}", name="update", methods={"PUT", "PATCH"})
     */
    public function update($id)
    {

    }

     /**
     * @Route("/{id}", name="delete", methods={"DELETE"})
     */
    public function delete($id)
    {

    }
}
