<link rel="stylesheet" href="css/main.css">

<style>
    body {
        padding-top: 150px;
    }

    .container .horarios-container .semanas {
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
    }

    .container .horarios-container .semanas .dias label {
        width: 150px;
        padding: 40px;
        border-radius: 5px;
        text-align: center;
        background-color: white;
        border-left: 2px solid var(--gray);
    }

    .container .horarios-container .semanas .dias input {
        position: absolute;
        margin-top: 15px;
        height: 25px;
        width: 30px;
    }

    .container .horarios-container .semanas .dias {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 40px;
    }
</style>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="horarios-container">
                <form action="">

                    <div class="row">
                        <div class="col-6">
                            <label for="">Horario Inicio</label>
                            <input type="time">
                        </div>
                        <div class="col-6">
                            <label for="">Horario Termino</label>
                            <input type="time">
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