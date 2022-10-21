<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.css">

    <style>
        html,
        body {
            /* don't do scrollbars */
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;

        }

        .fc-week {
            height: auto;
        }

        .fc th {
            padding: 5px 0px;
            vertical-align: middle;
            background: lightskyblue;
        }

        .fc td {
            background: snow;
        }

        .fc td.fc-today {
            background: lightgreen;
        }

        .color-palette {
            height: 35px;
            line-height: 35px;
            text-align: right;
            padding-right: .75rem;
        }

        .color-palette.disabled {
            text-align: center;
            padding-right: 0;
            display: block;
        }

        .color-palette-set {
            margin-bottom: 15px;
        }

        .color-palette span {
            display: none;
            font-size: 12px;
        }

        .color-palette:hover span {
            display: block;
        }

        .color-palette.disabled span {
            display: block;
            text-align: left;
            padding-left: .75rem;
        }

        .color-palette-box h4 {
            position: absolute;
            left: 1.25rem;
            margin-top: .75rem;
            color: rgba(255, 255, 255, 0.8);
            font-size: 12px;
            display: block;
            z-index: 7;
        }

        .sidebar-dark-blue {
            background: #157e70 !important;
            text-decoration-color: rgb(255, 255, 255);
        }

        .sidebar-blue2 {
            background: #108b7b;
            text-decoration-color: rgb(255, 255, 255);
        }

        .modal-header {
            color: #ffffff;
            font-size: 20px;
            background-color: #157e70;
            width: auto;
            height: 45px;
            margin: none;
            border-top: none;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/locales-all.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@5.11.3/main.min.js"></script>

    <!-- Consultamos la base de datos -->
    <?php
    require './lib/conexion.php';
    $sql = ("SELECT * FROM asignacionauto");
    $resul = mysqli_query($miConexion, $sql);
    ?>

    <?php
    $sql = ("SELECT * FROM asignacionauto");
    $resulta = mysqli_query($miConexion, $sql);
    ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                schedulerLicenseKey: 'CC-Attribution-NonCommercial-NoDerivatives',
                timeZone: 'UTC',
                initialView: 'resourceTimelineMonth',
                aspectRatio: 1.5,
                headerToolbar: {
                    left: 'prev,next',
                    center: 'title',
                    right: 'resourceTimelineDay,resourceTimelineWeek,resourceTimelineMonth'
                },
                editable: true,
                resourceAreaHeaderContent: 'Mis Empleados',
                resources: [
                    <?php
                    while ($rows = mysqli_fetch_array($resul)) { ?> {
                            id: <?php echo $rows['idPersonalAsistencial']; ?>,
                            title: '<?php echo $rows['nombres']; ?> <?php echo $rows['apellidos']; ?> ',
                        },
                    <?php } ?>
                ],
                events: [
                    <?php
                    while ($filas = mysqli_fetch_array($resulta)) { ?> {
                            id: <?php echo $filas['idProgramacion']; ?>,
                            title: '<?php echo $filas['title']; ?>',
                            start: '<?php echo $filas['fechaInicio']; ?>',
                            end: '<?php echo $filas['fechaFin']; ?>',
                            color: '<?php echo $filas['color']; ?>',
                            textColor: '<?php echo $filas['textColor']; ?>',
                            resourceId: <?php echo $filas['idPersonalAsistencial']; ?>
                        },
                    <?php } ?>
                ]
            });

            calendar.render();
        });
    </script>
</head>

<body>
    <div id='calendar'></div>
</body>

</html>