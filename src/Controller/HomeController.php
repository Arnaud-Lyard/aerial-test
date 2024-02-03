<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
  /**
   * @Route("/", name="home")
   */
  public function index(EntityManagerInterface $entityManager): Response
  {
    $products = $entityManager->getRepository(Product::class)->findAll();

    if (empty($products)) {
      throw $this->createNotFoundException(
        'No products found'
      );
    }

    return $this->render('home/index.html.twig', ['products' => $products]);
  }
}
