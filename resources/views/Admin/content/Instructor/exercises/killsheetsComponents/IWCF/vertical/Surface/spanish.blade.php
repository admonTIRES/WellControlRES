<style>
    .container-iwcf-v-sur {
        width: 90%;
        margin: 0 auto;
        border: 2px solid #333;
    }

    .header-iwcf-v-sur {
        display: flex;
        justify-content: space-between;
        border: 0.8vw solid #1a1a1a;
    }

    .header-left-iwcf-v-sur {
        width: 70%;
        padding: 0.8vw;
        border-right: 0.8vw solid #1a1a1a;
    }

    .header-right-iwcf-v-sur {
        width: 30%;
        padding-left: 2vw;
        padding-top: 0.5vw;
        padding-right: 1vw;
    }

    .title-iwcf-v-sur {
        font-weight: bold;
        text-align: center;
        font-size: 2vw;
        margin-bottom: 5px;
        color: #000;
    }

    .subtitle-iwcf-v-sur {
        text-align: center;
        margin-bottom: 10px;
        color: #000;
        font-size: 1.6vw;
    }

    .page-number-iwcf-v-sur {
        text-align: right;
        font-size: 12px;
    }

    .form-section-iwcf-v-sur {
        display: flex;
        background: #e0e0e0;
        padding: 1vw;
        gap: 1vw;
    }

    .form-box-iwcf-v-sur {
        border: 1px solid #333;
        padding: 10px;
        flex: 1;
        background: #fff;
    }

    .section-title-iwcf-v-sur {
        font-weight: bold;
        margin-bottom: 10px;
        color: #000;
    }

    .form-row-iwcf-v-sur {
        display: flex;
        align-items: flex-end;
        width: 100%;

    }

    .form-label-iwcf-v-sur {
        flex: 1;
        padding: 0;
        color: #000;
    }

    .form-input-iwcf-v-sur {
        flex: 3;
        display: flex;
        width: 100%;
        padding-bottom: 0.45vw;
    }

    .form-input-iwcf-v-sur input {
        border: 0;
        width: 100%;
        border-bottom: 1px solid #000;
        flex-grow: 1;
    }

    .form-unit-iwcf-v-sur {
        flex: 1;
        padding-left: 5px;
    }

    .formula-iwcf-v-sur {
        display: flex;
        align-items: center;
        margin: 5px 0;
    }

    .formula-eq-iwcf-v-sur {
        margin: 0 5px;
    }

    .equal-iwcf-v-sur {
        margin: 0 5px;
    }

    .pumps-iwcf-v-sur {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .pump-box-iwcf-v-sur {
        flex: 1;
        text-align: center;
        border-bottom: 1px solid #000000;
        padding: 5px;
    }

    .table-iwcf-v-sur {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2vw;
        background: white;
    }

    .table-iwcf-v-sur th,
    .table-iwcf-v-sur td {
        border: 1px solid #000000;
        padding: 5px;
        text-align: center;
    }

    .diagram-iwcf-v-sur {
        text-align: center;
    }

    .volumes-grid-iwcf-v-sur {
        display: grid;
        grid-template-columns: 3fr 1fr 1fr 1fr 1fr 1fr;
        gap: 0.7vw;
        background: #aeaeae;
        padding: 1vw;

    }

    .volumes-grid-iwcf-v-sur>div {
        border: 1px solid #333;
        padding: 5px;
        text-align: center;
        background: #fff;
    }

    .volumes-row-iwcf-v-sur {
        display: flex;
    }

    .volumes-label-iwcf-v-sur {
        flex: 3;
        border: 1px solid #333;
        padding: 5px;
    }

    .volumes-calc-iwcf-v-sur {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        border: 1px solid #333;
    }

    .kill-mud-box-iwcf-v-sur {
        border: 1px solid #333;
        margin: 5px;
        padding: 10px;
    }

    .graph-container-iwcf-v-sur {
        display: flex;
        margin-top: 10px;
    }

    .graph-labels-iwcf-v-sur {
        flex: 1;
        border: 1px solid #333;
    }

    .graph-iwcf-v-sur {
        flex: 4;
        border: 1px solid #333;
    }

    .container-right-iwcf-v-sur {
        background: #fff;
        display: flex;
        border: 1px solid #000;
    }
</style>
<div class="container-iwcf-v-sur">

    <div class="header-iwcf-v-sur">
        <div class="header-left-iwcf-v-sur">
            <div class="title-iwcf-v-sur">International Well Control Forum </div>
            <div class="subtitle-iwcf-v-sur"><strong> (Unidades de Campo API)</strong> </div>
            <div class="subtitle-iwcf-v-sur" style="font-size: 1.4vw;"><strong> Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                    vertical</strong> </div>
        </div>
        <div class="header-right-iwcf-v-sur">
        </div>
    </div>

    <div class="form-section-iwcf-v-sur">
        <div id="PRIMERA_SECCION">
            <style>
                .form-box-iwcf-v-sur {
                    border: 2px solid #000;
                    padding: 18px;
                    font-family: Arial, sans-serif;
                }

                .section-title-iwcf-v-sur {
                    font-weight: bold;
                    font-size: 22px;
                    /* antes 26px */
                    margin-bottom: 14px;
                    /* antes 18px */
                }

                .form-row-iwcf-v-sur {
                    display: flex;
                    align-items: center;
                    margin-bottom: 12px;
                    /* antes 18px */
                }

                .form-text-iwcf-v-sur {
                    font-size: 18px;
                    /* antes 22px */
                    flex: 1;
                }

                .input-box-iwcf {
                    border: 2px solid #000;
                    padding: 4px 8px;
                    min-width: 240px;
                    display: flex;
                    align-items: center;
                    margin-left: 14px;

                }

                .input-box-iwcf span {
                    font-weight: bold;
                    margin-right: 6px;
                    font-size: 16px;
                }

                .input-box-iwcf input {
                    border: none;
                    outline: none;
                    width: 100%;
                    font-size: 16px;
                }

                .unit-iwcf {
                    font-size: 18px;
                    margin-left: 8px;
                    min-width: 44px;
                }

                .iwcf-fraccion {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    margin: 0 12px;
                }

                .iwcf-fraccion-linea {
                    width: 220px;
                    border-bottom: 2px solid #000;
                    margin: 4px 0;
                    text-align: center;
                    font-size: 18px;
                    font-weight: bold;
                }
            </style>
            <div class="form-box-iwcf-v-sur">

                <div class="section-title-iwcf-v-sur">
                    Datos de resistencia de la formación:
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur">
                        Presión de fuga (leak-off) en la superficie obtenida con la prueba de resistencia de la formación
                    </div>
                    <div class="input-box-iwcf">
                        <span>(A)</span>
                        <input type="text">
                    </div>

                    <div class="unit-iwcf">psi</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur">
                        Densidad del lodo durante la prueba
                    </div>
                    <div class="input-box-iwcf">
                        <span>(B)</span>
                        <input type="text">
                    </div>
                    <div class="unit-iwcf">ppg</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur">
                        Máxima densidad del lodo permitida =
                    </div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur">(B) +</div>
                    <div class="iwcf-fraccion">
                        <div style="font-size:22px; font-weight:bold;">(A)</div>
                        <div class="iwcf-fraccion-linea"></div>
                        <div class="form-text-iwcf-v-sur">
                            Profundidad vertical de la zapata x 0.052
                        </div>
                    </div>
                    <div class="form-text-iwcf-v-sur">=</div>
                    <div class="input-box-iwcf">
                        <span>(C)</span>
                        <input type="text">
                    </div>
                    <div class="unit-iwcf">ppg</div>
                </div>


                <div class="section-title-iwcf-v-sur" style="margin-top:30px;">
                    MAASP inicial (Presión anular máxima permitida en la superficie)
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur">
                        ((C) - Densidad del lodo actual) x Profundidad vertical de la zapata x 0.052
                    </div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-text-iwcf-v-sur"></div>
                    =
                    <div class="input-box-iwcf">
                        <input type="text">
                    </div>
                    <div class="unit-iwcf">psi</div>
                </div>
            </div>

            <style>
                .table-iwcf-v-sur {
                    width: 100%;
                    border-collapse: collapse;
                    border: 2px solid #000;
                }

                .table-iwcf-v-sur th,
                .table-iwcf-v-sur td {
                    border: 1.5px solid #000;
                    padding: 12px;
                    vertical-align: middle;
                }

                .table-iwcf-v-sur th {
                    font-size: 20px;
                    font-weight: normal;
                    text-align: left;
                }

                .td-iwcf-center {
                    text-align: center;
                }

                .input-iwcf {
                    width: 75%;
                    height: 28px;
                    border: 1.5px solid #000;
                    font-size: 16px;
                    margin-bottom: 6px;
                }

                .label-iwcf {
                    font-size: 16px;
                }
            </style>

            <table class="table-iwcf-v-sur">
                <tr>
                    <th>Desplazamiento de la bomba No.1</th>
                    <th>Desplazamiento de la bomba No. 2</th>
                </tr>
                <tr>
                    <td class="td-iwcf-center">
                        <input type="text" class="input-iwcf">
                        <div class="label-iwcf">bbls / emboladas (Estroques)</div>
                    </td>
                    <td class="td-iwcf-center">
                        <input type="text" class="input-iwcf">
                        <div class="label-iwcf">bbls / emboladas (Estroques)</div>
                    </td>
                </tr>
            </table>

            <style>
                .table-iwcf-v-sur {
                    width: 100%;
                    border-collapse: collapse;
                    border: 2px solid #000;
                }

                .table-iwcf-v-sur th,
                .table-iwcf-v-sur td {
                    border: 1.3px solid #000;
                    /* antes 1.5px */
                    padding: 10px;
                    /* antes 18px */
                    vertical-align: middle;
                }

                .no-border {
                    border: none !important;
                }

                .pl-title-iwcf {
                    font-size: 22px;
                    /* antes 28px */
                    font-weight: 600;
                    color: #000;
                    text-align: center;
                }

                .left-header-iwcf {
                    font-size: 20px;
                    /* antes 26px */
                    text-align: center;
                }

                .table-iwcf-v-sur th {
                    font-size: 20px;
                    /* antes 26px */
                    font-weight: normal;
                    text-align: center;
                }

                .td-spm-iwcf {
                    display: flex;
                    align-items: center;
                    width: 100%;
                }

                .input-spm-iwcf {
                    width: 120px;
                    height: 28px;
                    border: 1.5px solid #000;
                    font-size: 16px;
                }

                .spm-text {
                    font-size: 18px;
                    margin-left: auto;
                    padding-right: 6px;
                }

                .td-center-iwcf {
                    text-align: center;
                }

                .input-bomba-iwcf {
                    width: 65%;
                    height: 28px;
                    border: 1.5px solid #000;
                    font-size: 16px;
                }
            </style>


            <table class="table-iwcf-v-sur">

                <tr>
                    <td class="no-border"></td>
                    <th colspan="2" class="pl-title-iwcf">
                        (PL) Caída de presión dinámica (psi)
                    </th>
                </tr>
                <tr>
                    <th class="left-header-iwcf">
                        Datos de la tasa reducida de la bomba
                    </th>
                    <th>BOMBA No. 1</th>
                    <th>BOMBA No. 2</th>
                </tr>
                <tr>
                    <td class="td-spm-iwcf">
                        <input type="text" class="input-spm-iwcf">
                        <span class="spm-text">SPM</span>
                    </td>
                    <td class="td-center-iwcf">
                        <input type="text" class="input-bomba-iwcf">
                    </td>
                    <td class="td-center-iwcf">
                        <input type="text" class="input-bomba-iwcf">
                    </td>
                </tr>
                <tr>
                    <td class="td-spm-iwcf">
                        <input type="text" class="input-spm-iwcf">
                        <span class="spm-text">SPM</span>
                    </td>
                    <td class="td-center-iwcf">
                        <input type="text" class="input-bomba-iwcf">
                    </td>
                    <td class="td-center-iwcf">
                        <input type="text" class="input-bomba-iwcf">
                    </td>
                </tr>
            </table>



        </div> <!-- FIN DE LA PRIMERA SECCION-->


        <style>
            .container-right-iwcf-v-sur {
                display: flex;
                gap: 50px;
                padding: 30px 40px;
                box-sizing: border-box;
            }

            .container-right-iwcf-v-sur>div:first-child {
                flex: 1;
            }

            .section-title-iwcf-v-sur {
                font-size: 22px;
                font-weight: bold;
                margin: 22px 0 16px;
            }

            .form-row-iwcf-v-sur {
                display: flex;
                align-items: center;
                margin-bottom: 18px;
            }

            .form-label-iwcf-v-sur {
                width: 240px;
                font-size: 18px;
            }

            .form-input-iwcf-v-sur {
                flex: 1;
                max-width: 360px;
                margin-right: 14px;
            }

            .form-input-iwcf-v-sur input {
                width: 100%;
                height: 32px;
                border: 1.6px solid #000;
                padding: 4px 8px;
                font-size: 16px;
                box-sizing: border-box;
            }

            .form-unit-iwcf-v-sur {
                width: 60px;
                font-size: 18px;
                color: #555;
            }

            .diagram-iwcf-v-sur {
                width: 280px;
                display: flex;
                align-items: stretch;
            }

            .diagram-iwcf-v-sur img {
                width: 92%;
                height: 100%;
                object-fit: contain;
            }
        </style>
        <div class="container-right-iwcf-v-sur">
            <div>
                <div class="section-title-iwcf-v-sur">Datos actuales del pozo:</div>
                <div class="section-title-iwcf-v-sur">Lado de perforación actual:</div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Densidad</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">ppg</div>
                </div>

                <div class="section-title-iwcf-v-sur">Datos de la zapata del revestidor (revestimiento):</div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Tamaño</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pulg.</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Profundidad medida</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pies</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Profundidad vertical verdadera</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pies</div>
                </div>

                <div class="section-title-iwcf-v-sur">Datos del hoyo:</div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Tamaño</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pulg.</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Profundidad medida</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pies</div>
                </div>
                <div class="form-row-iwcf-v-sur">
                    <div class="form-label-iwcf-v-sur">Profundidad vertical verdadera</div>
                    <div class="form-input-iwcf-v-sur"><input type="text"></div>
                    <div class="form-unit-iwcf-v-sur">pies</div>
                </div>
            </div>
            <div class="diagram-iwcf-v-sur">
                <img src="/assets/images/killsheets/pozoiwcf.png" alt="Diagrama de pozo" style="min-width: 10vw;">
            </div>
        </div>

    </div>

    <style>
        .iwcf-volumen-header {
            width: 100%;
            border-collapse: collapse;
            /* CLAVE */
            table-layout: fixed;
            /* CLAVE */
        }

        .iwcf-volumen-header td {
            background: #ffffff;
            border: 1.5px solid #6f6f6f;
            text-align: center;
            vertical-align: middle;
            padding: 14px 8px;
            font-family: Arial, sans-serif;
            color: #000;
            box-sizing: border-box;
            /* CLAVE */
        }

        /* Primera columna */
        .col-descripcion {
            width: 30%;
            text-align: left;
            font-size: 18px;
            padding-left: 18px;
        }

        /* LONGITUD / CAPACIDAD / VOLUMEN */
        .col-longitud,
        .col-capacidad,
        .col-volumen {
            width: 12%;
            font-size: 18px;
        }

        /* EMBOLADAS */
        .col-emboladas {
            width: 22%;
            font-size: 17px;
        }

        /* TIEMPO */
        .col-tiempo {
            width: 12%;
            font-size: 18px;
        }

        /* Títulos */
        .iwcf-volumen-header strong {
            font-size: 20px;
            font-weight: 600;
        }

        .iwcf-input {
            width: 90%;
            height: 36px;
            border: 1.5px solid #6f6f6f;
            text-align: center;
            font-size: 16px;
            box-sizing: border-box;
        }

        .op {
            font-size: 22px;
            font-weight: bold;
            display: inline-block;
        }

        .col-op {
            width: 4%;
            text-align: center;
            font-size: 22px;
            font-weight: bold;
        }

        .iwcf-input {
            width: 85%;
            height: 34px;
            border: 1.5px solid #6f6f6f;
            text-align: center;
            font-size: 16px;
        }

        .op-suma {
            margin-left: 6px;
            font-size: 22px;
            font-weight: bold;
        }

        .bloque {
            text-align: center;
            vertical-align: middle;
            font-size: 18px;
        }

        .bloque hr {
            width: 80%;
            margin: 8px auto;
        }

        .col-volumen-detalle,
        .col-emboladas-detalle,
        .col-tiempo-detalle {
            text-align: center;
            vertical-align: middle;
            font-size: 17px;
        }

        .op-label {
            font-weight: bold;
            margin-right: 6px;
        }

        .unit {
            margin-left: 6px;
            font-size: 16px;
        }

        .iwcf-input-inline {
            width: 80px;
            height: 32px;
            border: 1.5px solid #6f6f6f;
            text-align: center;
            font-size: 16px;
            vertical-align: middle;
        }

        .op-label {
            font-weight: bold;
            margin-right: 6px;
        }

        .unit {
            margin-left: 6px;
            font-size: 16px;
        }

        .col-volumen-total {
            text-align: center;
        }

        .col-volumen-total {
            text-align: left;
            /* CLAVE */
            vertical-align: middle;
            padding-left: 12px;
            /* como el PDF */
        }


        /* Contenedor interno */
        .iwcf-inline-group {
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }


        /* Input chico pero correcto */
        .iwcf-input-inline {
            flex: 1;
            min-width: 80px;
            height: 34px;
            border: 1.5px solid #6f6f6f;
            text-align: center;
            font-size: 16px;
            box-sizing: border-box;
        }



        .col-descripcion-total {
            text-align: left;
            font-size: 20px;
            padding-left: 18px;
            font-weight: 600;
        }
    </style>
    <table class="iwcf-volumen-header">
        <tr>
            <td class="col-descripcion">
                Datos pre - registrados<br>
                del volumen
            </td>
            <td class="col-longitud">
                <strong>LONGITUD</strong><br>
                Pies
            </td>
            <td class="col-op">&nbsp;</td>
            <td class="col-capacidad">
                <strong>CAPACIDAD</strong><br>
                bbls / pie
            </td>
            <td class="col-op">&nbsp;</td>
            <td class="col-volumen">
                <strong>VOLUMEN</strong><br>
                Barriles
            </td>
            <td class="col-emboladas">
                <strong>EMBOLADAS (ESTROQUES)<br>DE LA BOMBA</strong><br>
                Emboladas (Estroques)
            </td>
            <td class="col-tiempo">
                <strong>TIEMPO</strong><br>
                Minutos
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Tubería de perforación
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>
            <td class="col-volumen">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-emboladas bloque" rowspan="3">
                <strong>Volumen</strong>
                <hr>
                Desplazamiento<br>de la bomba
            </td>
            <td class="col-tiempo bloque" rowspan="3">
                <strong>Emboladas (Estroques)<br>de la bomba</strong>
                <hr>
                Tasa reducida<br>de la bomba
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Tubería de perforación extra pesada
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>

            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    <span class="op-suma">+</span>
                </div>
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Collares (Portamechas) de perforación
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>
            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    <span class="op-suma">+</span>
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="5" class="col-descripcion-total">
                <strong>Volumen de la sarta de perforación</strong>
            </td>
            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <strong>(D)</strong>
                    <input type="text" class="iwcf-input-inline">
                    bbls
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <strong>(E)</strong>
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
            <td class="col-tiempo">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Min
                </div>
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Collares de perforación en el hoyo (Hueco) abierto
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>
            <td class="col-volumen">
                <input type="text" class="iwcf-input">
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Tubería de perforación / tubería extra pesada en el hoyo (Hueco) abierto
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>

            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    <span class="op-suma">+</span>
                </div>
            </td>

        </tr>

        <tr>
            <td colspan="5" class="col-descripcion-total">
                <strong>Volumen del hoyo (hueco) abierto</strong>
            </td>
            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <strong>(F)</strong>
                    <input type="text" class="iwcf-input-inline">
                    bbls
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
            <td class="col-tiempo">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Min
                </div>
            </td>
        </tr>

        <tr>
            <td class="col-descripcion">
                Tubería de perforación en el revestidor (Revestimiento)
            </td>
            <td class="col-longitud">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">x</td>
            <td class="col-capacidad">
                <input type="text" class="iwcf-input">
            </td>
            <td class="col-op">=</td>
            <td class="col-volumen">
                <div class="iwcf-inline-group">
                    <strong>(G)</strong>
                    <input type="text" class="iwcf-input-inline">
                    <span class="op-suma">+</span>
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
            <td class="col-tiempo">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Min
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="col-descripcion-total">
                <strong>Volumen total del anular</strong>
            </td>
            <td colspan="4" class="col-volumen-total">
                <div class="iwcf-inline-group">
                    <strong>(F + G) = (H)</strong>
                    <input type="text" class="iwcf-input-inline">
                    <span>bbls</span>
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
            <td class="col-tiempo">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Min
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="col-descripcion-total">
                <strong>Volumen total del sistema de pozo</strong>
            </td>
            <td colspan="4" class="col-volumen-total">
                <div class="iwcf-inline-group">
                    <strong>(D + H) = (I)</strong>
                    <input type="text" class="iwcf-input-inline">
                    <span>bbls</span>
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
            <td class="col-tiempo">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Min
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="col-descripcion">
                Volumen activo en la superficie
            </td>
            <td colspan="4" class="col-volumen-total">
                <div class="iwcf-inline-group">
                    (J)
                    <input type="text" class="iwcf-input-inline">
                    <span>bbls</span>
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
        </tr>

        <tr>
            <td colspan="2" class="col-descripcion">
                <strong>Fluido total en el sistema activo</strong>
            </td>
            <td colspan="4" class="col-volumen-total">
                <div class="iwcf-inline-group">
                    <strong>(I +J)</strong>
                    <input type="text" class="iwcf-input-inline">
                    <span>bbls</span>
                </div>
            </td>
            <td class="col-emboladas">
                <div class="iwcf-inline-group">
                    <input type="text" class="iwcf-input-inline">
                    Emb. (Estr.)
                </div>
            </td>
        </tr>

    </table>


    <div class="footer-iwcf-v-sur" style="text-align: right; font-size: 10px; margin-top: 10px;">
        Dr No SV 04 / 01 (Field Units)<br>
        27-01-2006
    </div>
</div>

<!-- Page 2 -->
<div class="container-iwcf-v-sur" style="margin-top: 20px;">
    <div class="header-iwcf-v-sur">
        <div class="header-left-iwcf-v-sur">
            <div class="title-iwcf-v-sur">International Well Control Forum</div>
            <div class="subtitle-iwcf-v-sur">(Unidades de Campo API)</div>
            <div class="subtitle-iwcf-v-sur">Hoja de control de pozo (Hoja para matar) - BOP de superficie pozo
                vertical</div>
        </div>
        <div class="header-right-iwcf-v-sur">
        </div>
    </div>

    <div class="kill-mud-box-iwcf-v-sur" style="background-color: #e0e0e0;">
        <style>
            /* CONTENEDOR GENERAL */
            .iwcf-box-arremetida {
                border: 2px solid #000;
                background: #fff;
                padding: 16px;
                margin-top: 20px;
                font-family: Arial, sans-serif;
            }

            /* TÍTULO */
            .iwcf-box-title {
                font-size: 22px;
                font-weight: bold;
                margin-bottom: 16px;
            }

            /* TABLA */
            .iwcf-arremetida-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            /* CELDAS */
            .iwcf-arremetida-table td {
                vertical-align: middle;
                padding: 6px 8px;
                font-size: 18px;
            }

            /* TEXTO */
            .iwcf-label {
                width: 26%;
                text-align: left;
            }

            /* INPUT */
            .iwcf-input-cell {
                width: 10%;
            }

            .iwcf-input {
                width: 100%;
                height: 36px;
                border: 1.5px solid #6f6f6f;
                font-size: 16px;
                text-align: center;
                box-sizing: border-box;
            }

            /* UNIDADES */
            .iwcf-unit {
                width: 5%;
                font-size: 18px;
                text-align: left;
            }

            /* TABLA */
            .iwcf-arremetida-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
                color: #000;
                font-weight: normal;
            }

            /* CELDAS */
            .iwcf-arremetida-table td {
                vertical-align: middle;
                padding: 6px 8px;
                font-size: 18px;
                color: #000;
                font-weight: normal;
            }

            /* TEXTOS */
            .iwcf-label {
                width: 26%;
                text-align: left;
                color: #000;
                font-weight: normal;
            }

            /* INPUTS */
            .iwcf-input-cell {
                width: 10%;
            }

            .iwcf-input {
                width: 100%;
                height: 36px;
                border: 1.5px solid #6f6f6f;
                font-size: 16px;
                text-align: center;
                box-sizing: border-box;
                color: #000;
                font-weight: normal;
            }

            /* UNIDADES */
            .iwcf-unit {
                width: 5%;
                font-size: 18px;
                text-align: left;
                color: #000;
                font-weight: normal;
            }
        </style>
        <div class="iwcf-box-arremetida">
            <div class="iwcf-box-title">
                Datos de la arremetida (del amago):
            </div>

            <table class="iwcf-arremetida-table">
                <tr>
                    <td class="iwcf-label">
                        SIDPP (Presión de cierre en la tubería de perforación)
                    </td>
                    <td class="iwcf-input-cell">
                        <input type="text" class="iwcf-input">
                    </td>
                    <td class="iwcf-unit">
                        psi
                    </td>
                    <td class="iwcf-label">
                        SICP (Presión de cierre en revestimiento)
                    </td>
                    <td class="iwcf-input-cell">
                        <input type="text" class="iwcf-input">
                    </td>
                    <td class="iwcf-unit">
                        psi
                    </td>
                    <td class="iwcf-label">
                        Aumento del volumen en los tanques<br>
                        (Ganancia en superficie)
                    </td>
                    <td class="iwcf-input-cell">
                        <input type="text" class="iwcf-input">
                    </td>
                    <td class="iwcf-unit">
                        bbls
                    </td>
                </tr>
            </table>
        </div>


        <style>
            .iwcf-kmd-container,
            .iwcf-icp-container {
                padding: 8px;
            }

            .kmd-label,
            .kmd-formula,
            .icp-label,
            .icp-formula {
                padding: 8px;
            }

            .kmd-formula,
            .icp-formula {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                min-height: 120px;
            }

            .kmd-line-top,
            .kmd-line-bottom {
                margin-bottom: 0;
            }

            .iwcf-op-base {
                width: 460px;
                gap: 10px;
            }

            .kmd-fraction {
                width: 300px;
            }


            .iwcf-kmd-container {
                background: #ffffff;
                border: 2px solid #6f6f6f;
                padding: 14px;
                margin-top: 20px;
                font-family: Arial, sans-serif;
                color: #000;
            }

            .iwcf-kmd-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            .kmd-label {
                width: 24%;
                font-size: 18px;
                vertical-align: middle;
                border-right: 1.5px solid #6f6f6f;
                padding: 14px;
            }

            .kmd-formula {
                width: 76%;
                padding: 14px;
            }

            .kmd-line-top,
            .kmd-line-bottom {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 10px;
                margin-bottom: 10px;
                font-size: 18px;
            }

            .kmd-plus,
            .kmd-equals {
                font-size: 20px;
                font-weight: normal;
            }

            .kmd-fraction {
                display: inline-block;
                width: 320px;
            }

            .kmd-numerator {
                text-align: center;
                border-bottom: 2px solid #000;
                padding-bottom: 4px;
                font-weight: normal;
            }

            .kmd-denominator {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                padding-top: 4px;
            }

            .kmd-input {
                width: 110px;
                height: 30px;
                border: 1.5px solid #000;
                font-size: 16px;
                text-align: center;
                background: #fff;
            }

            .kmd-input.small {
                width: 80px;
            }

            .kmd-input.result {
                width: 100px;
            }

            .kmd-input.dotted {
                border: none;
                border-bottom: 3px dotted #000;
                width: 140px;
                height: 30px;
                background: transparent;
            }

            .kmd-unit {
                font-size: 18px;
                margin-left: 4px;
            }

            .iwcf-op-base {
                width: 520px;
                margin: 0 auto;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
            }

            .kmd-dotted-stack {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 140px;
            }

            .kmd-dotted-stack .kmd-input {
                width: 100%;
                height: 28px;
                border: 1.5px solid #000;
                font-size: 16px;
                text-align: center;
                margin-bottom: 6px;
                background: #fff;
            }

            .kmd-dotted-line {
                width: 100%;
                border-bottom: 3px dotted #000;
            }
        </style>

        <div class="iwcf-kmd-container">
            <table class="iwcf-kmd-table">
                <tr>
                    <td class="kmd-label">
                        Densidad del lodo<br>
                        para matar<br><br>
                        KMD
                    </td>
                    <td class="kmd-formula">
                        <div class="kmd-line-top">
                            <div class="iwcf-op-base">
                                <span>Densidad del lodo actual</span>
                                <span class="kmd-plus">+</span>

                                <div class="kmd-fraction">
                                    <div class="kmd-numerator">SIDPP</div>
                                    <div class="kmd-denominator">
                                        Profundidad vertical verdadera x 0.052
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kmd-line-bottom">
                            <div class="iwcf-op-base">
                                <div class="kmd-dotted-stack">
                                    <input type="text" class="kmd-input">
                                    <div class="kmd-dotted-line"></div>
                                </div>
                                <span class="kmd-plus">+</span>

                                <div class="kmd-fraction">
                                    <div class="kmd-numerator">
                                        <input type="text" class="kmd-input">
                                    </div>
                                    <div class="kmd-denominator">
                                        <input type="text" class="kmd-input small">
                                        <span>x 0.052</span>
                                    </div>
                                </div>
                                <span class="kmd-equals">=</span>
                                <input type="text" class="kmd-input result">
                                <span class="kmd-unit">ppg</span>
                            </div>
                        </div>

                    </td>
                </tr>
            </table>
        </div>

        <style>
            .iwcf-icp-container {
                background: #fff;
                border: 2px solid #6f6f6f;
                padding: 18px;
                margin-top: 20px;
                font-family: Arial, sans-serif;
                color: #000;
            }

            .iwcf-icp-table {
                width: 108%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            .icp-label {
                width: 22%;
                padding: 20px;
                font-size: 20px;
                border-right: 1.5px solid #6f6f6f;
                vertical-align: middle;
            }

            .icp-formula {
                width: 78%;
                padding: 20px 30px;
            }

            .icp-title {
                font-size: 22px;
                margin-bottom: 24px;
                text-align: left;
            }

            .icp-operation {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 16px;
                width: 100%;
            }

            .icp-input {
                height: 34px;
                border: 1.5px solid #000;
                font-size: 18px;
                text-align: center;
                background: #fff;
            }

            .icp-input.line {
                width: 280px;
                border: none;
                border-bottom: 2px solid #000;
            }

            .icp-input.dotted {
                width: 260px;
                border: none;
                border-bottom: 3px dotted #000;
            }

            .icp-input.result {
                width: 120px;
            }

            .op {
                font-size: 26px;
                font-weight: bold;
            }

            .unit {
                font-size: 22px;
            }

            .icp-line-stack {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 260px;
            }

            .icp-line-stack .icp-input {
                width: 100%;
                height: 30px;
                border: 1.5px solid #000;
                font-size: 16px;
                text-align: center;
                margin-bottom: 6px;
                background: #fff;
            }

            .icp-line-solid {
                width: 100%;
                border-bottom: 2px solid #000;
            }

            .icp-line-dotted {
                width: 100%;
                border-bottom: 3px dotted #000;
            }
        </style>


        <div class="iwcf-icp-container">
            <table class="iwcf-icp-table">
                <tr>
                    <td class="icp-label">
                        Presión inicial de<br>
                        circulación<br><br>
                        ICP
                    </td>
                    <td class="icp-formula">
                        <div class="icp-title">
                            Caída de presión dinámica + SIDPP
                        </div>
                        <div class="icp-operation">
                            <div class="iwcf-op-base">
                                <div class="icp-line-stack">
                                    <input type="text" class="icp-input">
                                    <div class="icp-line-solid"></div>
                                </div>
                                <span class="op">+</span>
                                <div class="icp-line-stack">
                                    <input type="text" class="icp-input">
                                    <div class="icp-line-dotted"></div>
                                </div>
                                <span class="op">=</span>
                                <input type="text" class="icp-input result">
                                <span class="unit">psi</span>

                            </div>

                        </div>
                    </td>
                </tr>
            </table>
        </div>



        <style>
            .iwcf-fcp-container {
                background: #fff;
                border: 2px solid #6f6f6f;
                padding: 10px;
                margin-top: 16px;
                font-family: Arial, sans-serif;
                color: #000;
            }

            /* TABLA */
            .iwcf-fcp-table {
                width: 100%;
                border-collapse: collapse;
                table-layout: fixed;
            }

            /* COLUMNA IZQUIERDA */
            .fcp-label {
                width: 24%;
                padding: 10px;
                font-size: 18px;
                border-right: 1.5px solid #6f6f6f;
                vertical-align: middle;
            }

            /* COLUMNA FORMULA */
            .fcp-formula {
                width: 76%;
                padding: 8px 12px;
                display: flex;
                flex-direction: column;
                min-height: 110px;
                /* 👈 CONTROL PDF */
            }

            /* LINEAS */
            .fcp-line {
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 12px;
            }

            /* PEGA LA LINEA INFERIOR ABAJO */
            .fcp-line-bottom {
                margin-top: auto;
            }

            /* FRACCIÓN */
            .fcp-fraction {
                width: 300px;
                text-align: center;
            }

            .fcp-numerator {
                border-bottom: 2px solid #000;
                padding-bottom: 3px;
                font-size: 18px;
            }

            .fcp-denominator {
                padding-top: 3px;
                font-size: 18px;
            }

            .fcp-input {
                height: 26px;
                border: 1.5px solid #000;
                font-size: 15px;
                text-align: center;
                background: #fff;
            }

            .fcp-input.result {
                width: 110px;
            }

            .fcp-op {
                font-size: 22px;
            }

            .fcp-unit {
                font-size: 18px;
            }

            .fcp-stack {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 260px;
                gap: 4px;
            }

            .fcp-stack .fcp-line {
                width: 100%;
                height: 0;
                border-bottom: 2px solid #000;
            }

            .fcp-input.top,
            .fcp-input.bottom {
                width: 130px;
                height: 26px;
            }

            .fcp-dotted-stack {
                display: flex;
                flex-direction: column;
                align-items: center;
                width: 240px;
                gap: 4px;
            }

            .fcp-input.dotted-top {
                width: 130px;
                height: 26px;
                border: 1.5px solid #000;
            }

            .fcp-dotted-line {
                width: 100%;
                height: 0;
                border-bottom: 3px dotted #000;
            }
        </style>

        <div class="iwcf-fcp-container">
            <table class="iwcf-fcp-table">
                <tr>
                    <td class="fcp-label">
                        Presión final de<br>
                        circulación<br><br>
                        <strong>FCP</strong>
                    </td>

                    <td class="fcp-formula">
                        <div class="fcp-line fcp-line-top">
                            <div class="fcp-fraction">
                                <div class="fcp-numerator">KMD</div>
                                <div class="fcp-denominator">Densidad del lodo actual</div>
                            </div>
                            <span class="fcp-op">x</span>
                            <span class="fcp-text">Caída de presión dinámica</span>
                        </div>
                        <div class="fcp-line fcp-line-bottom">
                            <div class="fcp-stack">
                                <input type="text" class="fcp-input top">
                                <div class="fcp-line"></div>
                                <input type="text" class="fcp-input bottom">
                            </div>
                            <span class="fcp-op">x</span>
                            <div class="fcp-dotted-stack">
                                <input type="text" class="fcp-input dotted-top">
                                <div class="fcp-dotted-line"></div>
                            </div>
                            <span class="fcp-op">=</span>
                            <input type="text" class="fcp-input result">
                            <span class="fcp-unit">psi</span>
                        </div>
                    </td>
                </tr>
            </table>
        </div>

        <style>
            .iwcf-k-section {
                display: flex;
                gap: 24px;
                padding: 14px;
                border: 2px solid #6f6f6f;
                background: #ffffff;
                font-family: Arial, sans-serif;
            }

            .k-box {
                flex: 1;
                border: 2px solid #6f6f6f;
                padding: 14px;
                display: flex;
                align-items: center;
                gap: 10px;
                justify-content: space-evenly;
            }

            .k-text {
                font-size: 20px;
                white-space: nowrap;
            }

            .k-input {
                height: 30px;
                width: 90px;
                font-size: 16px;
                text-align: center;
                background: #fff;
                border: 1.5px solid #000;
            }

            .k-input-wrapper {
                position: relative;
                display: inline-flex;
                flex-direction: column;
                align-items: center;
            }

            .k-input-wrapper.dotted::after {
                content: "";
                width: 100%;
                border-bottom: 3px dotted #000;
                margin-top: 6px;
            }

            .k-input-wrapper.solid::after {
                content: "";
                width: 100%;
                border-bottom: 2px solid #000;
                margin-top: 6px;
            }

            .k-fraction {
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .k-fraction.wide {
                min-width: 200px;
            }

            .k-num {
                width: 100%;
                text-align: center;
                border-bottom: 2px solid #000;
                padding-bottom: 4px;
                font-size: 18px;
            }

            .k-den {
                padding-top: 4px;
                font-size: 18px;
                text-align: center;
            }

            .k-unit {
                font-size: 18px;
                margin-left: 4px;
            }
        </style>

        <div class="iwcf-k-section mt-3">

            <div class="k-box">
                <span class="k-text">(K) = ICP - FCP =</span>
                <div class="k-input-wrapper dotted">
                    <input class="k-input">
                </div>
                <span class="k-text">-</span>
                <div class="k-input-wrapper dotted">
                    <input class="k-input">
                </div>
                <span class="k-text">=</span>
                <div class="k-input-wrapper dotted">
                    <input class="k-input">
                </div>
                <span class="k-unit">psi</span>
            </div>
            <div class="k-box">
                <div class="k-fraction">
                    <div class="k-num">(k) x 100</div>
                    <div class="k-den">(E)</div>
                </div>
                <span class="k-text">=</span>
                <div class="k-fraction">
                    <div class="k-num">
                        <div class="k-input-wrapper solid">
                            <input class="k-input">
                        </div>
                        x 100
                    </div>
                    <div class="k-den">
                        <div class="k-input-wrapper solid">
                            <input class="k-input">
                        </div>
                    </div>
                </div>
                <span class="k-text">=</span>
                <input class="k-input">
                <div class="k-fraction wide">
                    <div class="k-num">
                        psi
                    </div>
                    <div class="k-den">
                        100 emb. (Estroque)
                    </div>
                </div>
            </div>

        </div>



        <style>
            /* CONTENEDOR GENERAL */
            .iwcf-graph-section {
                display: grid;
                grid-template-columns: 320px 90px 1fr;
                gap: 18px;
                padding: 18px;
                background: #e9e9e9;
                border: 2px solid #6f6f6f;
                font-family: Arial, sans-serif;
            }

            .graph-table {
                background: #fff;
                border: 2px solid #6f6f6f;
            }

            .graph-table table {
                width: 100%;
                border-collapse: collapse;
            }

            .graph-table th {
                border-bottom: 2px solid #000;
                border-right: 1px solid #999;
                padding: 10px;
                font-size: 16px;
                text-align: center;
            }

            .graph-table th:last-child {
                border-right: none;
            }

            .graph-table td {
                border-top: 1px solid #999;
                border-right: 1px solid #999;
                padding: 6px;
            }

            .graph-table td:last-child {
                border-right: none;
            }

            .graph-table input {
                width: 100%;
                height: 28px;
                border: 1.5px solid #000;
                text-align: center;
                font-size: 14px;
            }

            .graph-middle {
                display: flex;
                align-items: stretch;
                gap: 10px;
            }

            .graph-axis {
                display: flex;
                flex-direction: column-reverse;
                align-items: center;
                justify-content: center;
            }

            .vertical-text {
                writing-mode: vertical-rl;
                transform: rotate(180deg);
                font-size: 20px;
                color: #000;
                text-align: center;
                white-space: nowrap;
                margin-top: 2px;
            }

            .vertical-arrow {
                width: 0;
                height: 124px;
                border-left: 2px solid #000;
                position: relative;
            }

            .vertical-arrow::after {
                content: "";
                position: absolute;
                top: -6px;
                left: -5px;
                border-left: 5px solid transparent;
                border-right: 5px solid transparent;
                border-bottom: 6px solid #000;
            }

            .blank-box {
                width: 70px;
                background: #fff;
                border: 2px solid #6f6f6f;
            }

            .graph-grid {
                background: #fff;
                border: 2px solid #6f6f6f;
                position: relative;
            }

            .grid-area {
                width: 100%;
                height: 100%;
                background-image:
                    linear-gradient(to right, #000 1px, transparent 1px),
                    linear-gradient(to bottom, #000 1px, transparent 1px);
                background-size: 28px 28px;
            }

            .graph-wrapper {
                position: relative;
                /* 👈 CLAVE */
                width: 100%;
                height: 100%;
            }
            .graph-grid {
                width: 100%;
                height: 100%;
            }
            .axis-x {
                position: absolute;
                bottom: -28px;
                right: 10px;
                display: inline-flex;
                align-items: center;
                gap: 10px;
                font-size: 14px;
                color: #000;
                /* NEGRO */
                font-family: Arial, sans-serif;
            }

            .axis-arrow {
                width: 28px;
                height: 0;
                border-top: 2px solid #000;
                position: relative;
            }

            .axis-arrow::after {
                content: "";
                position: absolute;
                right: -6px;
                top: -5px;
                border-top: 5px solid transparent;
                border-bottom: 5px solid transparent;
                border-left: 6px solid #000;
            }
        </style>


        <div class="iwcf-graph-section mt-2">

            <div class="graph-table">
                <table>
                    <thead>
                        <tr>
                            <th>EMBOLADAS<br>(ESTROQUES)</th>
                            <th>PRESIÓN<br>(psi)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                        <tr>
                            <td><input></td>
                            <td><input></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="graph-middle">
                <div class="graph-axis">
                    <div class="vertical-text">
                        PRESIÓN ESTÁTICA Y DINÁMICA EN LA TUBERÍA DE PERFORACIÓN (psi)
                    </div>
                    <div class="vertical-arrow"></div>
                </div>
                <div class="blank-box"></div>
            </div>

            <div class="graph-wrapper">
                <div class="graph-grid">
                </div>
                <div class="axis-x">
                    Emboladas (Estroques)
                    <span class="axis-arrow"></span>
                </div>

            </div>

            <br>
        </div>



        <div class="footer-iwcf-v-sur" style="text-align: right; font-size: 10px; margin-top: 10px;">
            Dr No SV 04 / 02 (Field Units) 27-01-2006
        </div>
    </div>
</div>