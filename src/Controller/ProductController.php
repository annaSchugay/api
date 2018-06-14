<?php

namespace App\Controller;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /**
     * @Route("/product", name="product")
     */
    public function index(Request $request)
    {
        $name = $request->query->get('name');
        $calories = $request->query->get('calories');

        $entityManager = $this->getDoctrine()->getManager();
        $product = new Product();
        $product->setName($name);
        $product->setCalories($calories);
        $entityManager->persist($product);

        $entityManager->flush();


        return $this->json([
            'product_id' => $product->getId(),
            'name' => $product->getName(),
            'calories' => $product->getCalories()
        ]);
    }

    /**
     * @Route("/product/list", name="product_list")
     */
    public function list()
    {
        $repository = $this->getDoctrine()->getRepository(Product::class);
        $products = $repository->findAll();

        foreach ($products as $product) {
            $result[] = [
                'name' => $product->getName(),
                'calories' => $product->getCalories()
            ];
        }
        return $this->json($result);
    }

    /**
     * Create Article.
     * @FOSRest\Post("/article")
     *
     * @return array
     */

    public function postArticleAction(Request $request)
    {
//        $article = new Article();
//        $article->setName($request->get('name'));
//        $article->setDescription($request->get('description'));
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($article);
//        $em->flush();
//
//        return View::create($article, Response::HTTP_CREATED , []);

    }
}
