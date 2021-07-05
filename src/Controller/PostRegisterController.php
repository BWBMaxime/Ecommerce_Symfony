<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostRegisterController extends AbstractController
{
    #[Route('/register', name: 'register')]
    public function PostRegister(): Response
    {

        // récupérer chaque valeur
        $username = (string)  json_decode(file_get_contents('php://input'))->firstname;
        $email = (string) json_decode(file_get_contents('php://input'))->email;
        $password = (string) json_decode(file_get_contents('php://input'))->password;

        return new Response();
       
    }
}
