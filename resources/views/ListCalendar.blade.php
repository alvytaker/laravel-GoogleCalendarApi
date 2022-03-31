@extends('master')

@section('body')

@include('ModalAddEvent')
@include('ModalEvents')

<div class="container-xxl">
  <a class="btn btn-secondary" href="{{ route('cierre') }}">
    Cerrar sesion
  </a>

<center>
<div class="label">Lista de eventos</div>
</center>

  <br>
  <center>
  <a class="btn btn-info" id="lisevent">
    Lista desde base de datos
    <div id="cargando" style="display:none; color: blue;"> se esta cargando...</div>
  </a>

  <br>
</center>
@if(session('mensaje'))
  <div class="alert alert-success" id="msj">
     {{session('mensaje')}}
  </div>
@endif

<br>
    <table class="table table-dark table-bordered">
        <thead>
          <tr>
            <th scope="col">Numero</th>
            <th scope="col">Event</th>
            <th scope="col">Fecha y hora de inicio</th>
            <th scope="col">Fecha y hora de termino</th>
            <th>
              <a class="btn btn-success" data-toggle="modal" data-target="#AddEvent">
                Agregar Evento
              </a>
            </th>
          </tr>
        </thead>
        <tbody>
          @php $contador = 1; @endphp
            @foreach ( $events->getItems() as $event)
            
            @if($event->summary || $event->description || $event->created)
         <tr>
            <td>{{ $contador++ }}</td>
            <td>{{ $event->summary }}</td>
            <td>{{Carbon\Carbon::parse($event->start->dateTime)->format('d-m-Y H:i')}}</td>
            <td>{{Carbon\Carbon::parse($event->end->dateTime)->format('d-m-Y H:i')}}</td>
            <td style="text-align: center;"> 

            <a class="btn btn-primary detalleres" data-toggle="modal" data-target="#detalleEvent{{$event->id}}">
                <i class="zmdi zmdi-filter-list" title="Detalles"></i>  
            </a> 

            <a class="btn btn-warning modaledit" href="{{ route('showcalendar', $event->id) }}" name="{{$event->id}}">
                <i class="zmdi zmdi-refresh-sync zmdi-hc-lg" title="Actualizar Registro"></i>  
            </a>

            <a class="btn btn-danger" data-toggle="modal" data-target="#deleteEvent{{$event->id}}">
              <i class="zmdi zmdi-delete zmdi-hc-lg" title="Eliminar Registro"></i>  
            </a>
            </td>
          </tr>
          @include('ModalDetalleEvent')

          @include('ModalCalendarShow')
          
          @include('ModalDeleteEvent')

          @endif
          @endforeach
        
        </tbody>
      </table>

</div>

@stop

@section('js')

<script type="text/javascript">
  setTimeout(function () {
         $("#msj").fadeOut(1000);
     }, 5000); 
</script>

<script>

$(".modaledit").click(function(){ 

  var idcale = $(this).attr("name");

$('.tbody').html(null);
$('.titulomodal').html(null);

  show(idcale);
 //alert(idcale);

});

function show(idcale){
  
  $.ajax({
        url:  "#",
        method: 'GET' 

      }).done(function(res){
        var arreglo = JSON.parse(res);
        alert(arreglo->getSummary());
      });
 
} 

</script>

<script>

$("#lisevent").click(function(){ 

  $('#tbodyevent').html(null);
  $('.titulomodal').html(null);

  $("#cargando").css("display", "inline");
  lista();
  

});

function lista(){

  $.ajax({
        url:  "{{ route('Cargareventos')}}",
        method: 'GET' 

      }).done(function(res){
        var arreglo = JSON.parse(res);
     //   alert(arreglo);

        for (var i=0; i<arreglo.length; i++) {
       todo = '<tr><td>'+arreglo[i].id+'</td>';
       todo+='<td>'+arreglo[i].summary+'</td>';
       todo+='<td>'+arreglo[i].start+'</td>';
       todo+='<td>'+arreglo[i].end+'</td></tr>';

       $('#tbodyevent').append(todo);
         }  
        $('.titulomodal').append("Detalles de eventos ");

        $('#Eventos').modal();
        $("#cargando").css("display", "none");
      });

}

</script>

@stop
