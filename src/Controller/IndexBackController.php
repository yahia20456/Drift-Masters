<?php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
Use Symfony\Component\Routing\Annotation\Route;

class IndexBackController extends AbstractController
{
    /**
     * @Route("/dashboard")
     */

    public function home()
    {

        return $this->render('Vitrine/IndexBack.html.twig');


    }


}
