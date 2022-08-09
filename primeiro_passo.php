<fieldset>
        <!-- BARBEIRO -->
        <h2>Dados do Responsável</h2>
        <div class="row">
            <div class="col-12 mb-4">
                <label for="nome">Nome Completo</label>
                <input type="text" class="letra-maiuscula" name="nome">
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="nascimento">Data de nascimento</label>
                <input type="date" name="nascimento">
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="telefone">Telefone <small class="text-muted">— apenas números</small></label>
                <input type="tel" autocomplete="off" class="telefone" id="telefone" name="telefone" maxlength="11" onkeypress="return onlynumber();">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="text-start" class="" for="cpf">CPF <small class="text-muted">— apenas números</small></label>
                <input type="text" name="cpf" autocomplete="off" id="cpf" minlength="11" maxlength="11" onkeypress="return onlynumber();">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="email">E-mail</label>
                <input type="email" name="email">
            </div>
        </div>

        <input type="submit" name="next" value="Próximo" class="next btn-barbeiro">

    </fieldset>