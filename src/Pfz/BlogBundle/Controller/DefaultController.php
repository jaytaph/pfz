<?php

namespace Pfz\BlogBundle\Controller;

use Pfz\BlogBundle\Entity\Blog;
use Pfz\BlogBundle\Form\BlogType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('PfzBlogBundle:Default:index.html.twig', array('name' => $name));
    }

    public function newBlogAction(Request $request)
    {
        $blog = new Blog();
        return $this->editBlogAction($request, $blog);
    }

    public function editBlogAction(Request $request, Blog $blog)
    {
        $form = $this->createForm(new BlogType(), $blog);

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                echo "Het formulier is gevalideerd ".$blog->getTitle()."\n";

                // opslaan in DB
                $manager = $this->getDoctrine()->getManager();
                $manager->persist($blog);
                $manager->flush();

                // redirecten naar andere pagina
                return $this->redirect($this->generateUrl('pfz_blog_overview'));
            }
        }

        return $this->render('PfzBlogBundle:Default:newBlog.html.twig', array(
            'formulier' => $form->createView(),
        ));
    }

    public function viewBlogAction($id)
    {
        $manager = $this->getDoctrine()->getManager();
        $repo = $manager->getRepository('PfzBlogBundle:Blog');
        $blog = $repo->findOneById($id);
        if (! $blog) {
            throw new NotFoundHttpException();
        }

        return $this->render('PfzBlogBundle:Default:viewBlog.html.twig', array(
            'blog' => $blog,
        ));
    }

    public function overviewAction()
    {
        $manager = $this->getDoctrine()->getManager();
        $repo = $manager->getRepository('PfzBlogBundle:Blog');

        $blogs = $repo->findAll();
        return $this->render('PfzBlogBundle:Default:overview.html.twig', array(
            'blogs' => $blogs,
            'datum' => new \DateTime(),
            'workshop' => 'symfony2',
        ));
    }
}
