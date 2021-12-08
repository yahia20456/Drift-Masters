<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;
class CircuitsBackController extends AbstractController
{
    /**
     * @Route("/ListeCircuits", name="ListaCirc")
     */

    public function Liste()
    {
        return $this->render('Vitrine/ListeCircuitsBack.html.twig');
    }
    /**
     * @Route("/AjoutCircuit", name="AjoutCirBack")
     */

    public function Ajout()
    {
        return $this->render('Vitrine/AjoutCircBack.html.twig');
    }
    /**
     * @Route("/ModifCirc", name="ModifCircBack")
     */

    public function edit()
    {
        return $this->render('Vitrine/ModifCircBack.html.twig');
    }
}