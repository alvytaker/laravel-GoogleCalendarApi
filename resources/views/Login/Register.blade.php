
<!--ventana para Add--->
<div class="modal fade" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
      <div class="modal-content">
        <div class="modal-header" style="background-color: #fff !important;">
          <h5 class="modal-title" style="text-align: center;">
              Agregar un nuevo Usuario
          </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
  
  
        <form method="POST" action="{{ route('register') }}" class="nav-link">
        @csrf
  
              <div class="modal-body" id="cont_modal">
  
                <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Rut</label>
                    <input type="number" name="rut" class="form-control" required="true">
                  </div>

                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Apellido</label>
                    <input type="text" name="apellido" class="form-control" required="true">
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Email</label>
                    <input type="text" name="email" class="form-control" required="true">
                  </div>
                  </div>
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label">Password</label>
                    <input type="password" name="password" class="form-control" required="true">
                  </div>      
              

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Agregar</button>
              </div>

            </div>
         </form>
  
      </div>
    </div>
  </div>
  <!---fin ventana Add --->

