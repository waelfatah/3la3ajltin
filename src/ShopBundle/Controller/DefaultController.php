<?php

namespace ShopBundle\Controller;

use AppBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $dataPoints = array();
        $em=$this->getDoctrine()->getManager();
        $produits=$em->getRepository(Produit::class)->BestSellers();
        foreach($produits as $row){
            array_push($dataPoints, array("x"=> $row->getNom(), "y"=> $row->getNbVentes()));
        }
        return $this->render("back/backbase.html.twig",array('bestsellers'=>$dataPoints));
    }
}
