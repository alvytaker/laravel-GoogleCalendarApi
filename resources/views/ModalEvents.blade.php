<!--ventana--->
<div class="modal fade" id="Eventos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #563d7c !important;">
          <h6 class="modal-title titulomodal" style="color: #fff; text-align: center;">
              Detalles de eventos desde base de datos
          </h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
        <table class="table">
            <thead>
              <tr>
                <th scope="col">Id</th>
                <th scope="col">Event</th>
                <th scope="col">Fecha y hora de inicio</th>
                <th scope="col">Fecha y hora de termino</th>
            
              </tr>
            </thead>
            <tbody id="tbodyevent">
            
            </tbody>
        </table>
        
      </div>
    </div>
  </div>