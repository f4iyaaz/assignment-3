<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fc;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        /* Styling for the List */
        ul {
            list-style-type: none;
            padding: 0;
        }

        li {
            background-color: #fff;
            padding: 15px;
            margin: 10px 0;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        li:hover {
            background-color: #f9f9f9;
        }

        .name {
            font-size: 18px;
            font-weight: bold;
        }

        .appointment-count {
            font-size: 16px;
            color: #777;
        }

        /* Button Styling */
        button {
            background-color: #b30202;
            color: white;
            border: none;
            padding: 10px 20px;
            margin-left: 10px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #911305;
        }

        button:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }

        /* Form Styling */
        form {
            display: inline-block;
        }

        .hidden {
            display: none;
        }
        #error-message {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    text-align: center;
    font-weight: bold;
    font-size: 16px;
    opacity: 1;
    transition: opacity 1s ease-out;  /* Added transition for opacity */
}

#error-message.hidden {
    opacity: 0;
    pointer-events: none;  /* Ensures it won't interfere with clicks after fading */
}



        /* Mobile responsiveness */
        @media (max-width: 600px) {
            body {
                padding: 10px;
            }

            li {
                flex-direction: column;
                align-items: flex-start;
            }

            .appointment-count {
                margin-top: 10px;
            }

            button {
                width: 100%;
                margin-top: 10px;
            }
        }
        /* Admin Link Styling */
.admin-link {
    display: inline-block;
    background-color: #0056b3;
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-size: 16px;
    margin-bottom: 20px;  /* Space below the link */
    transition: background-color 0.3s ease;
}

.admin-link:hover {
    background-color: #003d7a;  /* Darker shade on hover */
}

.admin-link:focus {
    outline: none;  /* Remove the outline on focus */
    box-shadow: 0 0 5px 2px rgba(0, 86, 179, 0.5); /* Optional shadow for focus */
}

    </style>
</head>
<body>

    @if(session('error'))
    <div id="error-message" class="alert alert-danger">
        {{ session('error') }}
    </div>

    {{-- @if(session('error'))
    <div id="error-message">
        {{ session('error') }}
    </div>
    @endif --}}

    <script>
        // Fade out the message after 5 seconds
        setTimeout(function() {
            let errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.classList.add('hidden');  // Add the 'hidden' class to trigger opacity transition
            }
        }, 5000);  // 5000ms = 5 seconds
    </script>
@endif


    <h1>Mechanic Appointment</h1>

    <div>
        <a href="/login" class="admin-link">Admin</a>
        <ul>
            @foreach ($mechanic as $m)
                <li>
                    <div>
                        <span class="name">{{ $m['first_name'] }} {{ $m['last_name'] }}</span>
                        <p class="appointment-count">Appointments: {{ $m['appointment_count'] }}</p>
                    </div>

                    <div>
                        @if ($m['appointment_count'] == 0) 
                            <p>Not Available</p>
                        
                        @else 
                            <a href="/appointment/{{$m['id']}}">Make appointment</a>
                        
                        @endif
                        
                    </div>
                </li>
            @endforeach
            </ul>
    </div>

</body>
</html>
