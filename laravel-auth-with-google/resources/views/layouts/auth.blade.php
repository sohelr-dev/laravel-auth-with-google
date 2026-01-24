<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --primary-color: #4e73df; }
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
            box-shadow: 0 10px 25px rgba(0,0,0,0.05); 
        }
        .btn-google { 
            background: #fff; 
            border: 1px solid #ddd; 
            color: #555; 
            font-weight: 600; 
            transition: all 0.3s; 
        }
        .btn-google:hover { 
            background: #f8f9fa; 
            border-color: #bbb; 
        }
        .divider { 
            display: flex; 
            align-items: center; 
            text-align: center; 
            margin: 20px 0; 
        }
        .divider::before, .divider::after { 
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
</body>
</html>