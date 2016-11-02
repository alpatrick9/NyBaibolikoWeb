<?php

namespace App\NyBaibolikoBundle\Controller;

use App\NyBaibolikoBundle\Entity\Verset;
use App\NyBaibolikoBundle\Model\Book;
use App\NyBaibolikoBundle\Repository\VersetRepository;
use App\NyBaibolikoBundle\Type\BookType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class DefaultController
 * @package App\NyBaibolikoBundle\Controller
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * @param Request $request
     * @return Response
     * @Route("/")
     */
    public function indexAction(Request $request){
        return $this->redirect($this->generateUrl('home_baiboly'));
    }
    /**
     * @param Request $request
     * @param $book
     * @param $chap
     * @param $first
     * @param $last
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @Route("/{book}/{chap}/{first}/{last}/", name="home_baiboly", defaults={"book" = "Genesisy","chap" = 1, "first" = "1", "last" = 31})
     */
    public function baibolyAction(Request $request, $book, $chap, $first, $last)
    {
        /**
         * @var $model Book
         */
        $model = new Book();

        $model->setTitle($book);
        $model->setChap($chap);
        $model->setVersetFirst($first);
        $model->setVersetLast($last);
        
        $form = $this->createForm(new BookType($this->getParameter("books")),$model);


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

        if($request->getMethod() == 'POST') {
            $form->handleRequest($request);
            if($model->getVersetLast() < $model->getVersetFirst()) {

                return $this->render('NyBaibolikoBundle:Default:index.html.twig', [
                    'versets'=>$versets,
                    'title'=>$title,
                    'form'=>$form->createView(),
                    'error_message'=>"Misy diso ny adiresy misy ny vakiteny hovakiana fa ahitsio azafady!"
                ]);
            }
            return $this->redirect($this->generateUrl('home_baiboly',[
                'book'=>$model->getTitle(),
                'chap'=>$model->getChap(),
                'first'=>$model->getVersetFirst(),
                'last'=>$model->getVersetLast()
            ]));
        }

        return $this->render('NyBaibolikoBundle:Default:index.html.twig', [
            'versets'=>$versets,
            'title'=>$title,
            'form'=>$form->createView()
        ]);
    }
}
