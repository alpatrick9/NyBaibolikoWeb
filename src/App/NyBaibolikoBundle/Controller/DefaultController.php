<?php

namespace App\NyBaibolikoBundle\Controller;

use App\NyBaibolikoBundle\Entity\Verset;
use App\NyBaibolikoBundle\Repository\VersetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @param $book
     * @param $chap
     * @param $first
     * @param $last
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{book}/{chap}/{first}/{last}/", name="home_baiboly")
     */
    public function indexAction(Request $request, $book, $chap, $first, $last)
    {
        /**
         * @var $repository VersetRepository
         */
        $repository = $this->getDoctrine()->getRepository('NyBaibolikoBundle:Verset');

        /**
         * @var $versets Verset[]
         */
        $versets = $repository->findVerset($book,$chap,$first,$last);

        $title = $book." ".$chap.": ".$first."-".$last;
        if($last - $first == 0) {
            $title = $book." ".$chap.": ".$first;
        }

        return $this->render('NyBaibolikoBundle:Default:index.html.twig', [
            'versets'=>$versets,
            'title'=>$title
        ]);
    }
}
