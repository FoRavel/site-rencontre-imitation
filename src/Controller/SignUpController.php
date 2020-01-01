<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
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

        
        // render just the form for AJAX, there is a validation error
        if ($request->isXmlHttpRequest()) {
            if($form->get('city')->isValid()){
                return $this->render('sign_up/form.html.twig', [
                    'form' => $form->createView(),
                    'questionNumber' => $request->request->get('q')+1
                ]);
            }else{
            return $this->render('sign_up/form.html.twig', [
                'form' => $form->createView(),
                'questionNumber' => $request->request->get('q')
            ]);}
        }



        return $this->render('sign_up/index.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function checkForm(){

    }
}
