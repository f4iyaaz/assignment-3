<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }

        a {
            padding: 8px 12px;
            margin-right: 10px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            transition: all 0.3s ease;
        }

        /* Styling for Change Mechanic */
        .change-mechanic {
            background-color: #4CAF50; /* Green */
            color: white;
        }

        /* Styling for Change Appointment */
        .change-appointment {
            background-color: #2196F3; /* Blue */
            color: white;
        }

        /* Hover effects */
        a:hover {
            opacity: 0.8;
            transform: scale(1.05);
        }

        /* Optional: Hover effect for specific classes */
        .change-mechanic:hover {
            background-color: #45a049;
        }

        .change-appointment:hover {
            background-color: #1e88e5;
        }
    </style>
</head>
<body>
    @if ($authentic)
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mechanic Name</th>
                    <th>Phone</th>
                    <th>Car License Number</th>
                    <th>Appointment Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user_info as $user)
                    <tr>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['mechanic_name'] }}</td>
                        <td>{{ $user['phone'] }}</td>
                        <td>{{ $user['car_license_number'] }}</td>
                        <td>{{ $user['appointment_date'] }}</td>
                        <td>
                            <a href="{{ url('change-mechanic/'.$user['id']) }}" class="change-mechanic">Change Mechanic</a>
                            <a href="{{ url('change-appointment/'.$user['id']) }}" class="change-appointment">Change Appointment</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <h2>Login required</h2>
    @endif
</body>
</html>
