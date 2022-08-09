<fieldset>
        <!-- ESTABELECIMENTO -->
        <h2>Sobre a Barbearia</h2>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" class="" for="cnpf">CNPJ <small class="text-muted">— apenas números (opcional)</small></label>
                <input type="text" name="cnpj" id="cnpj" minlength="14" maxlength="14" onkeypress="return onlynumber();">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label for="razao">Razão Social <small class="text-muted">— (opcional)</small></label>
                <input type="text" name="razao">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label for="nome_fantasia">Nome Fantasia</label>
                <input type="text" name="fantasia">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA EMAIL IGUAL BARBEIRO ETC -->
                <label class="" for="email2">E-mail</label>
                <input type="email" name="email2">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <!-- ATENÇÃO, TALVEZ NECESSITE DE LÓGICA PARA TELEFONE IGUAL BARBEIRO ETC -->
                <label class="" for="telefone">Telefone-celular <small class="text-muted">— apenas números</small></label>
                <input type="tel" autocomplete="off" class="telefone" id="celular" name="telefone" maxlength="11" maxlength="11" onkeypress="return onlynumber();">
            </div>
        </div>

        <!-- ENDEREÇO -->
        <h3 class="mt-3">Endereço</h3>
        <hr style="width: 70%; margin:0 auto;">
        <div id="appCep">
            <div class="row">
                <div class="col-12 mb-4 mt-2">
                    <label class="" for="cep">CEP <small class="text-muted">— apenas números</small></label>
                    <input type="text" name="cep" id="cep" minlength="8" maxlength="8" onkeypress="return onlynumber();" v-model="endereco.cep" @change="cepAlterado" autocomplete="off">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="estado">Estado</label>
                    <input type="text" name="estado" v-model="endereco.estado" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="cidade">Cidade</label>
                    <input type="text" name="cidade" v-model="endereco.cidade" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="bairro">Bairro</label>
                    <input type="text" name="bairro" v-model="endereco.bairro" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="endereco">Rua</label>
                    <input type="text" name="endereco" v-model="endereco.rua" readonly>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="numero">Número</label>
                    <input type="text" name="numero" onkeypress="return onlynumber();">
                </div>
            </div>

            <div class="row">
                <div class="col-12 mb-4">
                    <label class="" for="complemento">Complemento <small class="text-muted">— opcional</small></label>
                    <input type="text" name="complemento">
                </div>
            </div>
        </div>

        <!-- PERGUNTAS IMPORTANTES -->
        <h3 class="mt-3">Título para perguntas importantes</h3>
        <hr style="width: 70%; margin:0 auto;">

        <div class="row">
            <div class="col-12 mb-4 mt-2">
                <label class="" for="cep">Horário de funcionamento</label>
                <input type="???">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-2">
                <label for="sexo">Quem você atende?</label><i title="isso nos ajuda a recomendar você para seu público-alvo, porém seu estabelecimento continuará sendo mostrado para todos" class="bi bi-question-circle label-icons"></i>
                <select class="form-select" id="atendimento" name="atendimento">
                    <option selected value="1">Unissex</option>
                    <option value="2">Feminino</option>
                    <option value="3">Masculino</option>
                </select>
            </div>
        </div>

        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">
    </fieldset>
