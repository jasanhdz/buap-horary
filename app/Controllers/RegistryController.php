<?php

namespace App\Controllers;
use App\Models\User;
use Zend\Diactoros\Response\RedirectResponse;

class RegistryController extends BaseController {
  public function getRegistryController() {
    return $this->renderHTML('register.twig');
  }
  public function postRegistryController($request) {
    $responseMessage = null;
    if($request->getMethod() == 'POST') {
      $postData = $request->getParsedBody();
      $usuario = User::where('matricula', $postData['matricula'])->first() ?? null;
      $correUser = User::where('email', $postData['email'])->first() ?? null;
      // var_dump(!$usuario);
      // var_dump(!$correUser);
      if (!$usuario || !$correUser) {
        $user = new User();
        $user->name = $postData['name'];
        $user->lastName = $postData['last-name'];
        $user->email = $postData['email'];
        $user->matricula = $postData['matricula'];
        $user->password = password_hash($postData['password'], PASSWORD_DEFAULT);
        $user->nacimiento = $postData['date'];
        $user->sexo = $postData['sexo'];
        $user->save();
        return new RedirectResponse('/login');
      }
      else {
        $responseMessage = "Ya existe un Usuario con está Matricula o este correo :(";
      } 
    }
    return $this->renderHTML('register.twig', [
      'responseMessage' => $responseMessage,
    ]);
  }
}