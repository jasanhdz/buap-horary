var consulta = window.matchMedia('(max-width: 768px)'); 
const $burguerMenu = document.getElementById('burguerMenu');
const $listMenu = document.getElementById('listMenu');
const $title = document.getElementById('h1animation');

consulta.addListener(mediaQuery);
    
  function mediaQuery() {
    if(consulta.matches) {
      // Si se cumple hagamos estó
      console.log("Se cumplió la condición");
    } else {
      console.log("no se cumplio la condición");
    }
  }

  $burguerMenu.addEventListener('click', (event) => {
    console.log("Me haz presionado, ahora debemos enfocar el menú con un color :)");
    $burguerMenu.classList.toggle('active');
    $listMenu.classList.toggle('active');
    if($burguerMenu.classList == "icon icon-menu active") {
      $title.style.animationName = "fin";
      $burguerMenu.style.backgroundColor = "#188fff";
    } else {
      $burguerMenu.style.backgroundColor = "unset";
      $title.style.animationName = "pulso";
    }
    console.log("Auí debemos de poner el menu en modo visible!");
  });

  const $datetoday = document.getElementById('datetoday');
  let hoy = new Date();
  let diasSemana = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sabado", "Domingo"];
  const MESES = ["Enero", "Febrero", "Marzo", "Abril", 
			"Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
  const dateToday = `${diasSemana[hoy.getDay()-1]} ${hoy.getDate()} de ${MESES[hoy.getMonth()]} del ${hoy.getFullYear()}`;
  // console.log(dateToday);
  $datetoday.textContent = `${dateToday}`;