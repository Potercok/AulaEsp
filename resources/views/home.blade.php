@extends('layouts.panel')

@section('content')
<script src='fullcalendar/core/index.global.js'></script>
<script src='fullcalendar/core/locales/es.global.js'></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
<script src="{{ asset('js/calendar.js') }}"></script>

<html lang='en'>
  <head>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
              selectable: true,
              headerToolbar:{
                  left:'dayGridMonth,dayGridWeek,dayGridDay',
                  center:'title',
                },
                locales: 'es',
                hiddenDays: [ 6,0 ],
                events: '/events',
                dateClick: function(info) {
            // Recupera eventos del día clickeado
            
            let dateEvents = calendar.getEvents().filter(event => {
                return info.dateStr === event.startStr; 
            });

            // Llena el modal con los eventos
            let eventsList = document.getElementById('eventsList');
            eventsList.innerHTML = ''; // Limpia el contenido actual

            dateEvents.forEach(event => {
                let eventDiv = document.createElement('div');
                eventDiv.innerHTML = event.title; 
                eventsList.appendChild(eventDiv);
            });

            // Muestra el modal
            var myModal = new bootstrap.Modal(document.getElementById('eventsModal'), {});
            myModal.show();
        }
          });
          calendar.render();
      });
    </script>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>
<div class="modal fade" id="eventsModal" tabindex="-1" aria-labelledby="eventsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventsModalLabel">Reservas del día</h5>
                
            </div>
            <div class="modal-body" id="eventsList">
                <!-- Aquí se insertarán las reservas -->
                <span id="selectedDate" style="display:none;"></span>
            </div>
            <div class="modal-footer">
               <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>-->
                 <div class= "col text-right">
                  @if(auth()->user()->role == 'docente')
                      <!-- Aquí tu botón para crear una reserva -->
                      <a href="{{url ('/especialidades/create')}}" class="btn btn-sm btn-primary">Nueva Reserva</a>
                  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



