<?php

namespace Sarah\BackBundle\Controller;


use CMEN\GoogleChartsBundle\GoogleCharts\Charts\PieChart;
use Sarah\BackBundle\Entity\produit;
use Sarah\BackBundle\Entity\promotion;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {

        $pieChart = new PieChart();
        $em= $this->getDoctrine();
        $classes = $em->getRepository(promotion::class)->findAll();
        $totalClients=1;
        foreach($classes as $classe)
        {
            $totalClients=$totalClients+$classe->getNombre();
        }
        $data= array();
        $stat=['Promotion', 'Nombres'];
        $nb=0;
        array_push($data,$stat);
        foreach($classes as $classe) {
            $stat=array();

            $names = $em->getRepository(produit::class)->finddd($classe->getProduit());
           foreach($names as $b){
             foreach($b as $j){}
               //var_dump($j);
           }

            array_push($stat,$j,(($classe->getNombre()) *100)/$totalClients);
            $nb=($classe->getNombre() *100)/$totalClients;
            $stat=[$j,$nb];
            array_push($data,$stat);
        }
        $pieChart->getData()->setArrayToDataTable(
            $data
        );
        $pieChart->getOptions()->setTitle('Pourcentages des promotions choisies par les clients');
        $pieChart->getOptions()->setHeight(500);
        $pieChart->getOptions()->setWidth(900);
        $pieChart->getOptions()->getTitleTextStyle()->setBold(true);
        $pieChart->getOptions()->getTitleTextStyle()->setColor('#009900');
        $pieChart->getOptions()->getTitleTextStyle()->setItalic(true);
        $pieChart->getOptions()->getTitleTextStyle()->setFontName('Arial');
        $pieChart->getOptions()->getTitleTextStyle()->setFontSize(20);
        return $this->render('SarahBackBundle:Default:index.html.twig', array('piechart' => $pieChart));
    }

}
