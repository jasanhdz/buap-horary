<?php

namespace App\Controllers;
use App\Models\User;

class UserController extends BaseController {
  public function getProfile() {
    $nombre = null;
    $apellido = null;
    $sessionUserId = $_SESSION['userId'] ?? null;
    $user = User::where('id', $sessionUserId)->first();
    if($user) {
      $nombre = $user->name;
    }
      return $this->renderHTML('profile.twig', [
        'user' => $user 
      ]);
  }
}