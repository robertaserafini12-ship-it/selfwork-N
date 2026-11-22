<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Atelier - Blog Disegni d\'Arte' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #ffedd5 0%, #fbcfe8 45%, #ddd6fe 100%);
            min-height: 100vh;
            color: #1e1b4b;
        }
        .nav-vivace {
            background: linear-gradient(90deg, #6d28d9 0%, #e11d48 50%, #f97316 100%);
        }
        .box-vivace {
            background: #ffffff;
            border: 3px solid #f472b6;
            box-shadow: 0 10px 25px rgba(109, 40, 217, 0.12);
        }
        .btn-corallo {
            background: linear-gradient(90deg, #f43f5e 0%, #fb923c 100%);
            border: none;
            color: #fff;
            font-weight: 600;
        }
        .btn-corallo:hover {
            background: linear-gradient(90deg, #e11d48 0%, #ea580c 100%);
            color: #fff;
        }
    </style>
</head>
<body>
    <x-navbar />

    <main class="container my-5">
        {{ $slot }}
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>