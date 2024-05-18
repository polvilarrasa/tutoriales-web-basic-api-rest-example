<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api')]
class ProductsController extends AbstractController
{
    #[Route('/products', name: 'app_get_products', methods: ['GET'])]
    public function getProducts(): JsonResponse
    {
        // get the products from the database
        $products = [
            ['id' => 1, 'name' => 'Product 1'],
            ['id' => 2, 'name' => 'Product 2'],
            ['id' => 3, 'name' => 'Product 3'],
        ];
        // return a 200 response
        return $this->json(['products' => $products], Response::HTTP_OK);
    }

    #[Route('/products', name: 'app_create_product', methods: ['POST'])]
    public function createProduct(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // save data to the database

        // return a 201 response
        return $this->json(['product' => $data], Response::HTTP_CREATED);
    }

    #[Route('/products/{id}', name: 'app_get_product_by_id', methods: ['GET'])]
    public function getProductById(int $id): JsonResponse
    {
        // get the product from the database
        $product = ['id' => $id, 'name' => 'Product 1'];
        // return a 200 response
        return $this->json(['product' => $product], Response::HTTP_OK);
    }

    #[Route('/products/{id}', name: 'app_update_product_by_id', methods: ['PUT'])]
    public function updateProduct(int $id, Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        // update data in the database

        // return a 200 response
        return $this->json(['product' => $data], Response::HTTP_OK);
    }

    #[Route('/products/{id}', name: 'app_delete_product_by_id', methods: ['DELETE'])]
    public function deleteProduct(int $id): JsonResponse
    {
        // delete data from the database

        // return a 204 response
        return $this->json([], Response::HTTP_NO_CONTENT);
    }

}
