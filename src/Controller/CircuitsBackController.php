<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
class VehiculesBackController extends AbstractController
{
    /**
     * @Route("/ListeCircuits", name="ListaCirc")
     */

    public function Liste()
    {
        return $this->render('Vitrine/ListeCircuitsBack.html.twig');
    }
}