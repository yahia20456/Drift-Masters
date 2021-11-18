<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;

class VehiculeController extends AbstractController
{
    /**
     * @Route("/AjoutVehicule", name="ajoutvehicule")
     */

    public function index()
    {
        return $this->render('Vitrine/AjoutVehicule.html.twig');
    }
    /**
     * @Route("/ListeVehicules", name="ListeVeh")
     */
    public function liste()
    {
        return $this->render('Vitrine/ListeVeh.html.twig');
    }
}