<?php

namespace App\Controllers;
use App\Models\{Prueba, User};
use Zend\Diactoros\Response\RedirectResponse;

class AddHoraryController extends BaseController {
  public function getHorary() {
    return $this->renderHTML('horario.html');
  }
  public function postHorary($request) {
    if($request->getMethod() == 'POST') {
      $dias = array('LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO', 'DOMINGO');
      $postData = $request->getParsedBody();
      $sessionUserId = $_SESSION['userId'] ?? null;
      $prueba = new Prueba();
      $prueba->id_user = $sessionUserId;
      $prueba->actividad = $postData['titulo'];
      $prueba->edificio = $postData['edificio'];
      $prueba->salon = $postData['salon'];
      $prueba->tipo = $postData['tipo'];
      $prueba->nrc = $postData['nrc'];
      $prueba->dia = $postData['dia'];
      $prueba->inicio = $postData['inicio'];
      $prueba->fin = $postData['fin'];
      $prueba->section = $postData['seccion'];
      $prueba->save();
    }
  }
  public function getData() {
    $sessionUserId = $_SESSION['userId'] ?? null;
    $pruebaData = Prueba::orderBy('id', 'DESC')->where('id_user', $sessionUserId)->get();
    $todos = Prueba::where('id_user', $sessionUserId)->first();
    $array = array('', 'vacio', ':)');
    echo json_encode($pruebaData);
    return $this->renderHTML('data.json');
  }
  public function postDeleteData($request) {
    if($request->getMethod() == 'POST') { 
      $postData = $request->getParsedBody();
      $datoEliminado = $postData['id'];
      $data = Prueba::where('id', $datoEliminado)->first();

      //Eliminamos el dato
      $data->delete();
    }
  }
}