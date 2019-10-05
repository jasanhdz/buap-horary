<?php

namespace App\Controllers;
use App\Models\{User,Prueba};

class TeachersController extends BaseController {
  public function getTeachers() {
    $sessionUserId = $_SESSION['userId'] ?? null;
    $userSesion = User::where('id', $sessionUserId)->first();


    $dias = array('Lunes','Martes','Miercoles','Jueves','Viernes','Sabado', 'Domingo');
    $hoy = new \DateTime();
    $form = $hoy->format("N/d/m/Y");
    $teachers = "Aquí van a ir los maestros desde la base de datos.";
    $numDia = date('N', strtotime($form))+1;
    $formato = $dias[date('N', strtotime($form))];
    $horarioDate = Prueba::orderBy('dia', 'DESC')->get();
    $horarioDia = Prueba::where('dia', $numDia)->get();
    $user = User::select('users.name', 'users.lastName', 'users.id')->get();


    $dataToday = Prueba::select('users.name', 'users.lastName', 'prueba.actividad','prueba.tipo',
                              'prueba.id', 'prueba.nrc', 'prueba.edificio', 'prueba.dia',
                              'prueba.salon', 'prueba.inicio', 'prueba.fin', 'prueba.id_user')
                    ->join('users', 'users.id', '=', 'prueba.id_user')
                    ->where('dia', $numDia)
                    ->get();
    // echo $dataToday;
    $dataAll = Prueba::select('users.name', 'users.lastName', 'prueba.actividad','prueba.tipo',
                              'prueba.id', 'prueba.nrc', 'prueba.edificio', 'prueba.dia',
                              'prueba.salon', 'prueba.inicio', 'prueba.fin', 'prueba.id_user')
                    ->join('users', 'users.id', '=', 'prueba.id_user')
                    ->get();
    return $this->renderHTML('teachers.twig', [
      // 'auhtor' => $authorDia,
      'dia' => $dataToday,
      'today' => $formato,
      'user' => $user,
      'usersesion' => $userSesion,
      'data' => $dataAll
    ]);
  }
}