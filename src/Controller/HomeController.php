<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request; 
use Knp\Component\Pager\PaginatorInterface; 

class HomeController extends AbstractController
{
    #[Route('/home', name: 'home')]
    public function index(Request $request, PaginatorInterface $paginator): Response
    {
         $products = $this->getDoctrine()->getRepository(Product::class)->findAll([],['created_at' => 'desc']);

            $products = $paginator->paginate(
              $products, // Requête contenant les données à paginer (ici nos articles)
              $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
              20 // Nombre de résultats par page
          );
          
          return $this->render('home/index.html.twig', [
              'products' => $products,
          ]);
    }
}