<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SignUpController extends AbstractController
{
    /**
     * @Route("/sign/up", name="sign_up")
     */
    public function index(Request $request)
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        return $this->render('sign_up/index.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
