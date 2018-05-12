<?php

namespace App\Controller;

use App\Repository\UserEntityRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\User\User;
use App\Entity\UserEntity;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, PasswordType, EmailType};
use Symfony\Component\HttpFoundation\Request;

class LoginController extends Controller
{
    /**
     * @Route("/user", name="user")
     */
    public function showUserDetails()
    {
        return $this->render('user/show-user-details.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }
    public function login()
    {
        return $this->render('user/login.html.twig', [
            'controller_name' => 'UserController',
        ]);
    }

    public function addUser(Request $request)
    {

        $user = new UserEntity();
        $form = $this->createFormBuilder($user)
            ->add('login',TextType::class)
            ->add('email',EmailType::class)
            ->add('password',PasswordType::class)
            ->add('send',SubmitType::class)
            ->getForm();
        $form->handleRequest($request);

        if( $form->isSubmitted() && $form->isValid()){
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            return $this->redirectToRoute('index');

        }

        return $this->render('user/new.html.twig',[
            'controller_name' => 'UserController',
            'form' => $form->createView(),
        ]);



      
    }
}
