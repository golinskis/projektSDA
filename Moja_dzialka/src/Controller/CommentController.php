<?php

namespace App\Controller;

use App\Entity\CommentEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use App\Entity\UserEntity;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, PasswordType, EmailType};


class CommentController extends Controller
{
    /**
     * @Route("/comment", name="comment")
     */
    public function showComments()
    {

        $comment  = $this->getDoctrine()->getRepository(CommentEntity::class)->findAll();
        return $this->render('comment/index.html.twig', [
            'controller_name' => 'CommentController',
            'comments' => $comment,
         ]);
    }
    public function addComment(Request $request)
    {
        $comment = new CommentEntity();
        $form = $this->createFormBuilder($comment)->add('text', TextType::class)
            ->add('comment', EntityType::class, [
                'class' => UserEntity::class,
            ])
            ->add('save', SubmitType::class)->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($comment);
            $entityManager->flush();
            return $this->redirectToRoute('index');

        }

        return $this->render('comment/new.html.twig',[
            'controller_name' => 'CommentController',
            'form' => $form->createView(),
        ]);
    }



}
