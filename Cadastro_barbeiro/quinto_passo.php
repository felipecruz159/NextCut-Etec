<fieldset>
        <!-- SENHA -->
        <h2>Crie sua senha</h2>
        <h4>Falta pouco para concluir seu cadastro</h4>
        <div class="row">
            <div class="col-12 mb-4">
                <label for="">Senha</label>
                <div class="submit-line">
                    <input type="password" id="senha" name="senha" onchange="confereSenha()" onkeyup="validarSenhaForca()">
                    <i id="senhaIcon" class="bi bi-eye-slash-fill submit-lente2" onclick="verSenha()"></i>
                </div>
            </div>
        </div>
        <label id="labelForca" style="display:none;" for="">Força da senha</label>
        <div id="erroSenhaForca" class="container"></div> <!-- pode estar na div errada -->
        <div class="row">
            <div class="col-12 mb-4">
                <label class="" for="senha">Confirme a Senha</label>
                <div class="submit-line">
                    <input type="password" id="confirma" name="confirma" onchange="confereSenha()" onkeyup="validarSenhaForca()">
                    <i id="senhaIcon2" class="bi bi-eye-slash-fill submit-lente2" onclick="verConfirma()"></i>
                </div>
            </div>
        </div>
        <input type="submit" name="prev" value="Anterior" class="prev btn-barbeiro">
        <input type="submit" name="botao" value="Concluir" class="btn-barbeiro">

    </fieldset>