<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Word;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Word::class);

        $word = $repository->findOneByWord('Apple');
        $wordMeanings = $word->getMeanings();

        foreach ($wordMeanings as $meaning) {
            dump( $meaning->getDefinition() );
        }

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }

    /**
     * @Route("/meanings/of/{word}", name="wordMeanings")
     */
    public function wordMeaningsAction($word) {
        $repository = $this->getDoctrine()->getRepository(Word::class);
        $searchedWord = ucfirst($word);

        $word = $repository->findOneByWord( $searchedWord );

        return $this->render('default/word-meanings.html.twig', [
            'searchedWord' => $searchedWord,
            'word' => $word
        ]);
    }
}
