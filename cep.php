<div class="endereco-logado">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <?php if (!isset($cep)) {
        echo 'Adicione um endereço...';
      } else {
        if (isset($rua)) {
          echo $rua . ' ';
        }
      }
      ?><i class="bi bi-chevron-down"></i>
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="btn-close-logado" data-bs-dismiss="modal" aria-label="Close"><i class="bi bi-x-lg"></i></button>
          </div>
          <form method="post">
          <div class="modal-body">
            <?php if (isset($cep)) {
              echo '<div id="clickCep" style="cursor:pointer;">' . $rua . '</div>';
              echo '<div style="height:30px;"> </div>';
              echo '<div id="clickCep2" style="cursor:pointer;" onclick="mostraCep();">Alterar Endereço <i class="bi bi-geo-alt"></i></div>';
              echo '<div id="appCep" style="display:none;">';
              include 'cep.php';
              echo '<div class="modal-footer">
              
              <input type="submit" name="botao2" value="Salvar"></input>
            </div>';
            }
            else {
              echo '<div id="clickCep" style="cursor:pointer;" onclick="mostraCep();">Registre seu Endereço <i class="bi bi-geo-alt"></i></div>';
              echo '<div id="appCep" style="display:none;">';
              include 'cep.php';
              echo '<div class="modal-footer">
              
              <input type="submit" name="botao" value="Salvar"></input>
            </div>';  
            } ?>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- RETIRADO DO HEADER LOGADO ^^^^^^^^^^^^^^^^ -->
    
    
    <div class="principais">

        <div class="row">
            <div class="col-6 mb-4 mt-2">
                <label class="" for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlteradoEvento" autocomplete="off" value="" required>
            </div>


            <div class="col-6 mb-4 mt-2">
                <label class="" for="numero">Número:</label>
                <input type="text" name="numero" onkeypress="return onlynumber();" required>
            </div>
        </div>
    </div>

    <div class="desabilitados">
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="estado">Estado:</label>
                <input type="text" name="estado" v-model="endereco.estado" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="cidade">Cidade:</label>
                <input type="text" name="cidade" v-model="endereco.cidade" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="bairro">Bairro:</label>
                <input type="text" name="bairro" v-model="endereco.bairro" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="endereco">Rua:</label>
                <input type="text" name="endereco" v-model="endereco.rua" readonly>
            </div>
        </div>
    </div>
</div>

