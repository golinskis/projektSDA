<?php 

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function index()
    {
        return $this->render('main_site/default.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }
}