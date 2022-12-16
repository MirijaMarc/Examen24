<?php

require_once('../inc/connexion.php');
include('../inc/fonctions.php');
$reservations = getAllDateReservation(getConnection(),$_GET['idhabitation']);

?>


<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
    <script src='../assets/src/fullcalendar/dist/index.global.js'></script>
    <script>

      document.addEventListener('DOMContentLoaded', function() {
        var js = document.querySelector('input');
        var objectjs = JSON.parse(js.value);
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: objectjs
        });
        calendar.render();
      });

    </script>
  </head>
  <body>
    <input type="hidden" value=<?php echo json_encode($reservations);?>>
    <div id='calendar'></div>
  </body>
</html>