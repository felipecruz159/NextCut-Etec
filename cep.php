    <div class="principais">

        <div class="row">
            <div class="col-6 mb-4 mt-2">
                <label class="" for="cep">CEP:</label>
                <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlterado" autocomplete="off" value="" required>
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