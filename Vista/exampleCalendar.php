<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario PHP</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td {
            height: 80px;
        }

        .today {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
    <h2>Calendario PHP</h2>
    <table>
        <thead>
            <tr>
                <th>Domingo</th>
                <th>Lunes</th>
                <th>Martes</th>
                <th>Miércoles</th>
                <th>Jueves</th>
                <th>Viernes</th>
                <th>Sábado</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Set the timezone to Bogotá, Colombia
            date_default_timezone_set('America/Bogota');

            // Get the current month and year
            $currentMonth = date('m');
            $currentYear = date('Y');

            // Get the first day of the month
            $firstDayOfMonth = strtotime("first day of $currentYear-$currentMonth");

            // Get the number of days in the month
            $daysInMonth = date('t', $firstDayOfMonth);

            // Get the day of the week for the first day of the month
            $dayOfWeek = date('w', $firstDayOfMonth);

            // Display the calendar
            for ($day = 1; $day <= $daysInMonth; $day++) {
                // Start a new row on the first day of the week
                if ($dayOfWeek == 0) {
                    echo '<tr>';
                }

                // Add empty cells for days before the first day of the month
                if ($dayOfWeek < date('w', strtotime("first day of $currentYear-$currentMonth"))) {
                    echo '<td></td>';
                } else {
                    $date = date('Y-m-d', strtotime("$currentYear-$currentMonth-$day"));

                    // Highlight today's date
                    $class = ($date == date('Y-m-d')) ? 'class="today"' : '';

                    echo "<td $class>$day</td>";
                    $dayOfWeek++;

                    // Start a new row on the last day of the week
                    if ($dayOfWeek == 7) {
                        echo '</tr>';
                        $dayOfWeek = 0;
                    }
                }
            }

            // Add empty cells for days after the last day of the month
            while ($dayOfWeek < 7) {
                echo '<td></td>';
                $dayOfWeek++;
            }
            ?>
        </tbody>
    </table>
</body>
</html>
