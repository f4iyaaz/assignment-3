<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Form</title>

    <style>
        /* Reset some basic styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        /* Container for form */
        .form-container {
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
        }

        /* Form styling */
        form {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 1rem;
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="tel"],
        input[type="date"],
        textarea {
            padding: 10px;
            margin-bottom: 20px;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        button {
            padding: 12px 20px;
            background-color: #4CAF50;
            color: white;
            font-size: 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #45a049;
        }

        /* Error message styling (optional, for form validation) */
        .error {
            color: red;
            font-size: 0.9rem;
            margin-top: -10px;
        }
    </style>
</head>
<body>
    <h2>Appointment Form</h2>

    <!-- Form starts here -->
    <div class="form-container">
        <form action="/submitted/{{$id}}" method="POST">
            @csrf <!-- Laravel CSRF token for security -->

            <!-- Name input -->
            <div>
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <!-- Address input -->
            <div>
                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>
            </div>

            <!-- Phone input -->
            <div>
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone">
            </div>

            <!-- Car License Number input -->
            <div>
                <label for="car_license">Car License Number:</label>
                <input type="text" id="car_license" name="car_license_number" required>
            </div>

            <!-- Car Engine Number input -->
            <div>
                <label for="car_engine">Car Engine Number:</label>
                <input type="text" id="car_engine" name="car_engine_number" required>
            </div>

            <!-- Appointment Date input -->
            <div>
                <label for="appointment_date">Appointment Date:</label>
                <input type="date" id="appointment_date" name="appointment_date" required>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit">Submit Appointment</button>
            </div>
        </form>
        {{-- <h3>{{$id}}</h3> --}}
    </div>
</body>
</html>
