<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class ArticleController.
 *
 * @Route("/api", name="api_")
 */
class ProductController extends AbstractFOSRestController
{
    /**
     * Lists all articles.
     *
     * @Rest\Get("/products")
     *
     * @return Response
     */
    public function getProductAction(): Response
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        return $this->handleView($this->view($products));
    }

    /**
     * Create Article.
     * @Rest\Post("/products")
     *
     * @param Request $request
     * @return Response
     */
    public function postArticleAction(Request $request): Response
    {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->submit(json_decode($request->getContent(), true));

        if (!$form->isSubmitted() || !$form->isValid()) {
            return $this->handleView($this->view($form->getErrors(), Response::HTTP_BAD_REQUEST));
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();

        return $this->handleView($this->view(['status' => 'ok'], Response::HTTP_CREATED));
    }
}
