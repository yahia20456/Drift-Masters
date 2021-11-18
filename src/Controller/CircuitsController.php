<?php
namespace App\Controller;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
Class CircuitsController extends AbstractController
{
    /**
     * @Route("/Circuits", name="ListeCirc")
     */
    public function Circuit ()
    {
        return $this->render('Vitrine/Circuits.html.twig');
    }
}