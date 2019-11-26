<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        if ($this->get('security.authorization_checker')->isgranted('ROLE_ADMIN'))
        {
             return $this->render('default/admin.html.twig');
        }
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
       
    }

    /**
     * @Route("/admin/", name="adminpage")
     */
    public function adminAction(Request $request)
    {
         return $this->render('default/admin.html.twig');

    }

}
