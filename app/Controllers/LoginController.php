<?php

namespace App\Controllers;
use Zend\Diactoros\Response\RedirectResponse;
use App\Models\User;

class LoginController extends BaseController {
  public function getLogin() {
    return $this->renderHTML('login.twig', [
      // 'responseMessage' => $message,
    ]);
  }
  public function postAuthLogin($request) {
    $responseMessage = null;
    $postData = $request->getParsedBody();
    $user = User::where('matricula', $postData['matricula'])->first();
    if($user) {
      if(password_verify($postData['password'], $user->password)) {
        $_SESSION['userId'] = $user->id;
        return new RedirectResponse('/profile');
      } else {
        $responseMessage = 'Error en el password';
      }
    } else {
      $responseMessage = 'Esté usuario no existe';
    }
    return $this->renderHTML('login.twig', [
      'responseMessage' => $responseMessage 
    ]);
  }

  public function getLogout() {
    // $sessionUserId = $_SESSION['userId'] ?? null;
    // $user = User::where('id', $sessionUserId)->first();
    unset($_SESSION['userId']);
    return new RedirectResponse('/');
  }
}