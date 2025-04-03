<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="./css/informe_auditoria.css">
</head>

<body>
    <header>
        <table>
          <tr>
            <td rowspan="3" style="padding: 0; font-weight: bold;" class="bordecompleto">
                <img src="./images/logo_horizontal.png">
            </td>
            <td colspan="4" class="negrita bordecompleto" style="font-size: 14px;">
                <span>INFORME DE AUDITORIA</span>
            </td>
          </tr>
          <tr>
            <td class="bordecompleto" style="font-weight: bold;">Código</td>
            <td class="bordecompleto" style="font-weight: bold;">Versión</td>
            <td class="bordecompleto" style="font-weight: bold;">Fecha</td>
            <td class="bordecompleto" style="font-weight: bold;">Página</td>
          </tr>
          <tr>
              <td class="bordecompleto">FO-400-09</td>
              <td class="bordecompleto">3</td>
              <td class="bordecompleto">02/10/2023</td>
            <td class="bordecompleto">1 de 22</td>
          </tr>
        </table>
        <hr>
    </header>
    <table>
        <tr style="width: 180px">
            <td class="bordecompleto negrita" style="width: 80px; background-color: darkgray"><span>Fecha de Auditoria:</span></td>
            <td class="bordecompleto" style="width: 100px"><span> {{ $report->star_date->format('d/m/Y') }} al {{ $report->end_date->format('d/m/Y') }}</span></td>
            <td style="width: 200px"></td>
        </tr>
    </table>
    <br>
    <div class="container">
        <table>
            <tr>
                <th class="bordecompleto" style="text-align: left; padding: 5px"><Span>Objetivo</Span></th>
            </tr>
            <tr style="padding: 5px">
                <td class="bordecompleto" style="text-align: justify; padding: 10px;">
                    <span> {{ $report->objective }}</span>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th class="bordecompleto" style="text-align: left; padding: 5px"><Span>Alcance</Span></th>
            </tr>
            <tr style="padding: 5px">
                <td class="bordecompleto" style="text-align: justify; padding: 10px;">
                    <span> {{ $report->scope }}</span>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th class="bordecompleto" style="width: 50%">Proceso (s) Auditado (s)</th>
                    <th class="bordecompleto" style="width: 50%">Responsable</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($process as $item)
                    <tr>
                        <td class="bordecompleto" style="text-align: unset; padding: 5px;"> {{ $item->process }}</td>
                        <td class="bordecompleto" style="text-align: justify; padding: 5px;"> {{ $item->responsible }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th class="bordecompleto" style="width: 50%">Auditores</th>
                    <th class="bordecompleto" style="width: 50%">Cargo y Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditors as $item)
                    <tr>
                        <td class="bordecompleto" style="text-align: unset; padding: 5px;"> {{ $item->first_name }} {{ $item->last_name }}</td>
                        <td class="bordecompleto" style="text-align: justify; padding: 5px;"> {{ $item->position }} {{ $item->rol_auditor }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table>
            <thead>
                <tr>
                    <th class="bordecompleto" style="width: 50%">Auditados</th>
                    <th class="bordecompleto" style="width: 50%">Cargo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($auditors as $item)
                    <tr>
                        <td class="bordecompleto" style="text-align: unset; padding: 5px;"> {{ $item->first_name }} {{ $item->last_name }}</td>
                        <td class="bordecompleto" style="text-align: justify; padding: 5px;"> {{ $item->position }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table>
            <tr>
                <th class="bordecompleto" style="text-align: left; padding: 5px"><Span>Documentación Consultada</Span></th>
            </tr>
            <tr style="padding: 5px">
                <td class="bordecompleto" style="text-align: justify; padding: 10px;">
                    <span> {{ $report->documents }}</span>
                </td>
            </tr>
        </table>
        <br>
        <div>
            <div class="bordecompleto title">
                <span style="">Fortalezas</span>
            </div>
            <div class="bordecompleto" style="padding: 1px;">
                @foreach ($process as $item)
                    <p>
                        <h3 style="margin-left: 50px;">{{ $item->process }}</h3>
                        <ul>
                            <li>{{ $item->strength }}</li>
                        </ul>
                    </p>
                @endforeach
            </div>
        </div>
        <br>
        <div>
            <div class="bordecompleto title">
                <span style="">Aspectos por Mejorar (Observaciones)</span>
            </div>
            <div class="bordecompleto" style="padding: 1px;">
                @foreach ($process as $item)
                    <p>
                        <h3 style="margin-left: 50px;">{{ $item->process }}</h3>
                        <ol>
                            @foreach ($item->observations as $observation)
                                <li>{{ $observation->description }}</li>
                            @endforeach
                        </ol>
                    </p>
                @endforeach
            </div>
        </div>
        <br>
        <table>
            <thead>
                <tr>
                    <th colspan="4" class="bordecompleto titulotabla" >Hallazgos</th>
                    <tr>
                        <th style="width: 5%" class="bordecompleto">N°</th>
                        <th style="width: 20%" class="bordecompleto">Proceso</th>
                        <th style="width: 30%" class="bordecompleto">Requisito</th>
                        <th style="width: 45%" class="bordecompleto">Descripción</th>
                    </tr>
                </tr>
            </thead>
            <tbody>
                @foreach ($findings as $find)
                <tr>
                    <td style="width: 5%" class="bordecompleto" style="padding: 5px;"> {{ $loop->iteration }}</td>
                    <td style="width: 20%" class="bordecompleto" style="text-align: justify; padding: 5px;"> {{ $find->checklist->process }}</td>
                    <td style="width: 30%" class="bordecompleto" style="text-align: justify; padding: 5px;"> {{ $find->criterion->evaluated }}</td>
                    <td style="width: 45%" class="bordecompleto" style="text-align: justify; padding: 5px;">
                        <span><strong>Descripción: </strong>{{ $find->description }}</span><br>
                        <span><strong>Evidencia: </strong>{{ $find->evidence }}</span><br>
                        <span><strong>Requisito: </strong>{{ $find->requirement }}</span><br>
                        <span><strong>Consecuencia: </strong>{{ $find->consequence }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <div>
            <h4>RESUMEN DE NO CONFORMIDADES (NC) Y OPORTUNIDADES DE MEJORA (O) POR PROCESOS</h4>
        </div>
        <table>
            <thead>
                <tr>
                    <th class="bordecompleto" style="width: 50%">PROCESOS</th>
                    <th class="bordecompleto" style="width: 5%">NC</th>
                    <th class="bordecompleto" style="width: 5%">O</th>
                    <th class="bordecompleto" style="width: 40%">TOTALES</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($resumen as $item)
                    <tr>
                        <td class="bordecompleto" style="width: 50%">{{ $item->process }}</td>
                        <td class="bordecompleto" style="width: 5%">{{ $item->NC }}</td>
                        <td class="bordecompleto" style="width: 5%">{{ $item->O }}</td>
                        <td class="bordecompleto" style="width: 40%">{{ $item->NC + $item->O }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <table>
            <tr>
                <th class="bordecompleto" style="text-align: left; padding: 5px"><Span>Observaciones</Span></th>
            </tr>
            <tr style="padding: 5px">
                <td class="bordecompleto" style="text-align: justify; padding: 10px;">
                    <span> {{ $report->observations }}</span>
                    <br>
                    <br>
                    @if (isset($report->diverging_opinions))
                        <span><strong>Opiniones divergentes: </strong><br>{{ $report->diverging_opinions }}</span><br>
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr>
                <th class="bordecompleto" style="text-align: left; padding: 5px"><Span>Conclusiones</Span></th>
            </tr>
            <tr style="padding: 5px">
                <td class="bordecompleto" style="text-align: justify; padding: 10px;">
                    <span> {{ $report->conclusions }}</span>
                </td>
            </tr>
        </table>
        <br>
        <table>
            <tr style="width: 180px">
                <td class="bordecompleto negrita" style="width: 30%; background-color: darkgray; padding: 20px"><span>Firma Auditor:</span></td>
                <td class="bordecompleto" style="width: 70%"><span>  </span></td>
            </tr>
        </table>
    </div>
    <footer>
        <hr>
    </footer>
</body>
</html>