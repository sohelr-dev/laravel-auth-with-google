<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary-color: #4e73df;
        }

        body {
            background: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .auth-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .auth-card {
            width: 100%;
            max-width: 450px;
            padding: 40px;
            background: #ffffff;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        }

        .btn-google {
            background: #fff;
            border: 1px solid #ddd;
            color: #555;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-facebook {
            background: linear-gradient(#fff, rgb(148, 144, 144)2f5);
            border: 1px solid #ddd;
            color: #0840e9;
            font-weight: 600;
            transition: all 0.3s;
        }

        .btn-facebook:hover {
            background: #89a281;
            border-color: #bbb;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #ddd;
        }

        .divider:not(:empty)::before {
            margin-right: .5em;
        }

        .divider:not(:empty)::after {
            margin-left: .5em;
        }
    </style>
</head>

<body>

    <div class="auth-container">
        @yield('content')

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    
    let userId = {{ auth()->id() }};

    window.Echo.private('App.Models.User.' + userId)
        .notification((notification) => {
            // incriment notification count
            let countEl = document.getElementById('count');
            countEl.innerText = parseInt(countEl.innerText) + 1;
            
            // add dropdown-style notification item
            let list = document.getElementById('noty-list');
            list.innerHTML = `<li><a class="dropdown-item" href="${notification.action_url}">${notification.package_name} - ${notification.editor_name}</a></li>` + list.innerHTML;
        });
</script>
</body>

</html>
