<?php
/**
 * Created by PhpStorm.
 * User: szymongolinski
 * Date: 02.06.2018
 * Time: 11:39
 */

namespace App\Controller;


use App\Entity\CommentEntity;
use App\Entity\PostEntity;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\{SubmitType, TextType, PasswordType, EmailType};



class PostController extends Controller
{


    /**
     * @Route("/posts", name="posts")
     */
    public function showPosts()
    {

        $post = $this->getDoctrine()->getRepository(PostEntity::class)->findAll();
        return $this->render('posts/index.html.twig', [
            'controller_name' => 'PostController',
            'posts' => $post,
        ]);
    }
    public function addPost(Request $request)
    {
        $posts = new PostEntity();
        $form = $this->createFormBuilder($posts)->add('comment', TextType::class)
            ->add('content', EntityType::class, [
                'class' => PostEntity::class,
            ])->add('title', EntityType::class, [
                'class' => PostEntity::class,
            ])
            ->add('save', SubmitType::class)->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($posts);
            $entityManager->flush();
            return $this->redirectToRoute('index');

        }

        return $this->render('posts/posts.html.twig',[
            'controller_name' => 'PostController',
            'form' => $form->createView(),
        ]);
    }





}