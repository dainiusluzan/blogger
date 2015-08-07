<?php
// src/Blogger/BlogBundle/Controller/BlogController.php
/**
 * Created by PhpStorm.
 * User: martynas
 * Date: 2015.08.04
 * Time: 23:19
 */

namespace Blogger\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Blog controller.
 */
class BlogController extends Controller
{
    /**
     * Show a blog entry
     */
    public function showAction($url)
    {
        $em = $this->getDoctrine()->getManager();

//        $blog = $em->getRepository('BloggerBlogBundle:Blog')->find($url);
        $blog = $em->getRepository('BloggerBlogBundle:Blog')->findOneByUrl($url);

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post1.');
        }

        if (!$blog) {
            throw $this->createNotFoundException('Unable to find Blog post2.');
        }

        $comments = $em->getRepository('BloggerBlogBundle:Comment')
            ->getCommentsForBlog($blog->getId());

        return $this->render('BloggerBlogBundle:Blog:show.html.twig', array(
            'blog'      => $blog,
            'comments'  => $comments
        ));
    }
}