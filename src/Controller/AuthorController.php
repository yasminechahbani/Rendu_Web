<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AuthorController extends AbstractController
{

//instead of using el authors just fi method wahda (lena heya el show ) we chose bech ndeclariw el authors lfouu9 bech tkounli el variable globale !!
    private $authors;

    public function __construct()
    {  // snaana el tableau fel construct
        $this->authors = [
            ['id' => 1, 'name' => 'Taha Hussain', 'nbrBooks' => 300, 'picture' => 'images/th.jpeg'],
            ['id' => 2, 'name' => 'Victor Hugo', 'nbrBooks' => 200, 'picture' => 'images/vh.jpeg']];

    }

    #[Route('/library', name: 'app_library', methods: ["GET"])]  //the method is optional , if you dont specify then it auto uses the GET method !
    public function index(): Response
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }


    #[Route('/author/{name}', name: 'author_route', methods: "GET", defaults: ["name" => ""])]   //this is what we call a dynamic route khater fih variable {}
        //el default we use it so kif manhot chy baaed el slash , maayaamelich mochkol taa router not found!!!!
    public function showAuth($name): Response
    {
        return $this->render('author/show.html.twig', [
            'name' => $name
        ]);
    }

    #[Route('/authorList/{id}', name: 'author_List', methods: ["GET"], defaults: ["id" => ""])] //this is what we call a dynamic
    public function authorSHOW(): Response
    {

        // Process or retrieve data based on $id if needed
        return $this->render('author/list.html.twig', [
            'authors' => $this->authors,
        ]);

    }

    #[Route('/authorDetails/{id}', name: 'author_details', methods: ["GET"])]
    public function authorEdit($id): Response
    {
        foreach ($this->authors as $author) {
            if ($author['id'] == $id) {
                return $this->render('author/details.html.twig', [
                    'author' => $author,
                ]);
            }
        }

        // If no author is found, throw a 404 exception
        throw $this->createNotFoundException('Author not found');
    }

}
