<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{

  /**
   * @Route("/create-product", name="create_product")
   */
  public function createProduct(Request $request, ManagerRegistry $doctrine): Response
  {

    $name = $request->request->get('name');
    $description = $request->request->get('description');
    $priceExcludingTax = $request->request->get('priceExcludingTax');
    $valueAddedTax = $request->request->get('valueAddedTax');
    $image = $request->request->get('image');

    if (empty($name) || empty($description) || empty($priceExcludingTax) || empty($valueAddedTax) || empty($image)) {
      return new JsonResponse(['success' => false, 'message' => 'All fields are required']);
    }

    $entityManager = $doctrine->getManager();
    $product = new Product();
    $product->setName($name);
    $product->setDescription($description);
    $product->setPriceExcludingTax($priceExcludingTax);
    $product->setValueAddedTax($valueAddedTax);
    $product->setImage($image);

    $entityManager->persist($product);
    $entityManager->flush();

    return new JsonResponse(['success' => true, 'product' => [
      'name' => $product->getName(),
      'description' => $product->getDescription(),
      'priceExcludingTax' => $product->getPriceExcludingTax(),
      'valueAddedTax' => $product->getValueAddedTax(),
      'image' => $product->getImage(),
    ]]);
  }
}
