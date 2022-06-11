<?php

namespace App\Controller;


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ChangeLangueController extends AbstractController
{

    private UrlGeneratorInterface $urlGenerator;

    public function __construct(UrlGeneratorInterface $urlGenerator)
    {
        $this->urlGenerator = $urlGenerator;
    }


    #[Route('/change_langue', name: 'change_langue')]
    public function index(): Response
    {
        return $this->render('change_langue/index.html.twig', [
            'controller_name' => 'ChangeLangueController',
        ]);
    }



    #[Route('/changeLocale', name: 'changeLocale')]
    public function changeLocale(RequestStack $requestStack, Request $request, EntityManagerInterface $em)
    {
       
        $langue = $request->request->get('langue');
        $user = $this->getUser();
        if($user)
        {
            $user->setLocale($langue);
            $em->persist($user);
            $em->flush();
        }
        $requestStack->getSession()->set('_locale', $langue);
        return new Response("ok");
      
    }
    


}
