<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController  // extends lena yaani it inherits Abstract Controller

{
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',    //the render method comes from the inheritence AbstractController
        ]);
    }
    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        $name="yasmine";
        return $this->render('home/contact.html.twig', array(
            'name'=>$name   //array is the list of the variables that well be using
        ));
    }

}
