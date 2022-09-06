<link rel="stylesheet" href="css/main.css">

<style>
    body {
        padding-top: 150px;
    }


</style>





<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" id="btn-modalHora" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
  Personalizar <i class="bi bi-calendar2-week"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-horario">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Disponibilidade de Horário</h5>
      </div>
      <div class="modal-body">
        

      <div class="container">
    <div class="row">
        <div class="col-12">
            <div class="horarios-container">
                <form action="" method="POST">

                    <div class="row">
                        <div class="col-6 hrcoluna">
                            <label for="hora1">Horário Início</label>
                            <input type="time" id="hora1">
                        </div>
                        <div class="col-6 hrcoluna">
                            <label for="hora2">Horário Término</label>
                            <input type="time" id="hora2">
                        </div>
                    </div>

                    <div class="row">
                        <div class="alerta-minutos text-center">
                            <p>Por padrão, o intervalo entre os cortes serão de 30 minutos!</p>
                        </div>
                    </div>

                    <div class="row">
                        <h3>Dias da semana</h3>
                        <div class="semanas">
                            <div class="dias">
                                <label for="check">Domingo</label>
                                <input type="checkbox" id="check">
                            </div>
                            <div class="dias">
                                <label for="check2">Segunda</label>
                                <input type="checkbox" id="check2">
                            </div>
                            <div class="dias">
                                <label for="check3">Terça</label>
                                <input type="checkbox" id="check3">
                            </div>
                            <div class="dias">
                                <label for="check4">Quarta</label>
                                <input type="checkbox" id="check4">
                            </div>
                            <div class="dias">
                                <label for="check5">Quinta</label>
                                <input type="checkbox" id="check5">
                            </div>
                            <div class="dias">
                                <label for="check6">Sexta</label>
                                <input type="checkbox" id="check6">
                            </div>
                            <div class="dias">
                                <label for="check7">Sabado</label>
                                <input type="checkbox" id="check7">
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div>
    </div>
  </div>
</div>





