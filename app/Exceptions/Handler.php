<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException; // Ne pas oublier d'importer NotFoundHttpException


class Handler extends ExceptionHandler
{
   
    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        // On modifier le comportement pour l'exception NotFoundHttpException
        $this->renderable(function (NotFoundHttpException $e, $request) {
            // Si la requête contient "api/*"
            if ($request->is("api/*")) {
                // On retourne une réponse 404 avec un message en JSON
                return response()->json([
                    "message" => "Ressource introuvable ! (404)"
                ], 404);
            }
        });
    }
}
