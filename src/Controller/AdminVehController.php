<?php
namespace App\Controller;
use phpDocumentor\Reflection\Types\AbstractList;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
Class AdminVehController extends AbstractController
{
    /**
     * @Route("/cars", name="listavehi")
     */
    public function Circuit ()
    {
        return $this->render('Vitrine/AjoutvehBack.html.twig');
    }
}