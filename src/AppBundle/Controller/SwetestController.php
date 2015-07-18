<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use DestinyLab\Swetest;

class SwetestController extends Controller
{
    /**
     * @Route("/swetest")
     * @Template()
     */
    public function indexAction()
    {
        $swetest = new Swetest();

        // ephemeris of Mercury (-p2) starting on 1 Dec 1900,
        // 15 positions (-n15) in two-day steps (-s2)
//        $swetest->query('-b5.1.2002 -p -house12.05,49.50,k -ut12:30')->execute();

        // another query way
//        $arr = [
//            'b' => '5.1.2002',
//            'p' => null,
//            'house' => '12.05,49.50,k',
//            'ut' => '12:30',
//        ];
//        $swetest->query($arr)->execute();

        // angular distance of moon (-p1) from sun (-d0) for 10
        // consecutive days (-n10).
        $swetest->query('-p1 -d0 -b1.12.1900 -n10 -fPTl -head')->execute();

        // another query way
        $arr = [
            'p' => 1,
            'd' => 0,
            'b' => '1.12.1900',
            'n' => 10,
            'f' => 'PTL',
            'head',
        ];
        $swetest->query($arr)->execute();

        // Midpoints between Saturn (-p6) and Chiron (-DD) for 100
        // consecutive steps (-n100) with 5-day steps (-s5) with
        // longitude in degree-sign format (-f..Z) rounded to minutes (-roundmin)
//        $swetest->query('-p6 -DD -b1.12.1900 -n100 -s5 -fPTZ -head -roundmin')->execute();

        // another query way
//        $arr = [
//            'p' => 6,
//            'D' => 'D',
//            'b' => '1.12.1900',
//            'n' => 100,
//            's' => 5,
//            'f' => 'PTZ',
//            'roundmin',
//        ];
//        $swetest->query($arr)->execute();


        return array(
            'swetest' => $swetest
        );
    }

}
