<html>
    <head>
        <title>Reporte - Proyecto</title>
    </head>
    <body>
        <div align="center" style="min-height:900px;">
        <h1 align="center">Reporte de Proyectos</h1>
            <table>
                <tr>
                    <td width="600px"><h3 align="left">Gobierno de El Salvador</h3></td>
                    <td>
                        <img src="../public/images/logo.png" width="100" height="100" >
                    </td>
                </tr>
                <tr>
                    <td>
                        <?php date_default_timezone_set('America/El_Salvador'); echo date('l jS \of F Y h:i:s A'); ?>
                    </td>
                </tr>
            </table>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th class="th1">Nombre del Proyecto</th>
                            <th class="th1">Fuente de Fondos</th>
                            <th class="th1">Monto Planificado</th>
                            <th class="th1">Monto Patrocinado</th>
                            <th class="th1">Monto Fondos Propios</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($proyecto as $proyectos)
                        <tr>
                            <td>{{ $proyectos->NombreProyecto }}</td>
                            <td>{{ $proyectos->fuenteFondos }}</td>
                            <td>{{ $proyectos->MontoPlanificado }}</td>
                            <td>{{ $proyectos->MontoPatrocinado }}</td>
                            <td>{{ $proyectos->MontoFondosPropios }}</td>
                        </tr>
                        @empty
                        <tr class="bg-red-400 text-black text-center">
                            <td colspan="3" class="border px-4 py-2">{{ __('No hay registros para mostrar') }}</td>
                        </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>
        </div>

        <div align="center" >
            <hr width="75%" style="border: 1px solid black;">
            <small>Fondo Solidario para la Salud</small>
        </div>
    </body>
    <style>
        .th1{
            background-color:grey;
            color:white;
            padding:10px;
        }
    </style>
</html>