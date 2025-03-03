<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class HomeController {
    #[Route(path:'/hello', name:'app_home_hello')]
    public function hello(): Response {
        return new Response("Hello World");
    }

    #[Route(path:'/helloworld', name:'app_home_helloworld')]
    public function helloWorld(): Response{
        return new Response("Hello World 2");
    }

    #[Route(path:'/helloTo/{name}', name:'app_home_helloTo')]
    public function helloTo($name): Response{
        return new Response("Hello World $name");
    }

    #[Route(path:'/addition/{nb1}/{nb2}', name:'app_home_sum')]
    public function sum($nb1, $nb2): Response{
        $result = $nb1 + $nb2;
        if($nb1 <0 && $nb2 < 0){
            return new Response("<p>Numbers are negative</p>");
        }
        return new Response("<p>The sum of $nb1 + $nb2 is $result</p>");
    }
    #[Route(path:'/{ope}/{nb1}/{nb2}', name:'app_home_sum')]
    public function calc(string $ope,mixed $nb1,mixed $nb2): Response{
        if(is_numeric($nb1) && is_numeric($nb2)){
            return new Response(match ($ope) {
                'add' => "The additon of $nb1 & $nb2 gives ".$nb1+$nb2,
                'sub' => "The substraction of $nb2 to $nb1 gives ".$nb1-$nb2,
                'prod' => "The product of $nb1 & $nb2 gives ".$nb1*$nb2,
                'div' => $nb2 > 0 ? "The divison of $nb1 by $nb2 gives ".$nb1/$nb2 : "You can't divide by zero!",
            });
        }
        return new Response("One of the parameters is not a number.");
    }

}