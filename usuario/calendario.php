<!-- agenda.php -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Agenda con FullCalendar</title>
  <link href='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css' rel='stylesheet' />
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js'></script>
</head>
<body>

  <div id='calendar'></div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const calendarEl = document.getElementById('calendar');

      const calendar = new FullCalendar.Calendar(calendarEl, {
        initialView: 'dayGridMonth',
        events: 'eventos.php', // <--- Archivo PHP que devuelve los eventos en JSON
        locale: 'es' // Opcional: pone el calendario en español
      });

      calendar.render();
    });
  </script>

</body>
</html>
