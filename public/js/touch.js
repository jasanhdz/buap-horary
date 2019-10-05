// const $teacher = document.getElementById('teacher');
const $teacherOptions = document.getElementById('teacher-options');
// const $listDay = document.getElementById('list-day');
// const $hourDate = document.getElementById('Hour-day');
// const $hourWeekend = document.getElementById('hour-weekend');
// const $weekend = document.getElementById('weekend');

// $teacher.addEventListener('click', (event) => {
//   $teacherOptions.classList.toggle('active');
// })
// $listDay.addEventListener('click', (event) => {
//   $hourDate.classList.toggle('active');
// })
// $hourWeekend.addEventListener('click', () => {
//   $weekend.classList.toggle('active');
// })

// Ahora vamos a escuhar el Evento Click, pero A todas las clases
const $teacher = document.getElementsByClassName('teacher');
const $teacherItem = document.getElementsByClassName('teacher-title');
const $teacherInfo = document.getElementsByClassName('teacher-info');
const $hourDay = document.getElementsByClassName(' list list-day');
const $hourData = document.getElementsByClassName('itm day');
const $listWeekend = document.getElementsByClassName('list-weekend');
const $weekend = document.getElementsByClassName('itm weekend');

for(let i = 0; i < $teacher.length; i++) {
  $teacherItem[i].addEventListener('click', (event) => {
    $teacherInfo[i].classList.toggle('active');
  })
}

for(let i = 0; i < $hourDay.length; i++) {
  $hourDay[i].addEventListener('click', () => {
    $hourData[i].classList.toggle('active');
    if($hourDay[i] != $weekend[i]) {
      $weekend[i].classList.remove('active');
    }
  })
}

for(let i = 0; i < $listWeekend.length; i++) {
  $listWeekend[i].addEventListener('click', () => {
    $weekend[i].classList.toggle('active');
    if($hourDay[i] != $weekend[i]) {
      $hourData[i].classList.remove('active');
    }
  })
}
