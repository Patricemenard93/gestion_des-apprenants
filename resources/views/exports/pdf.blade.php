<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #1f2937; font-size: 12px; }
        h1 { margin-bottom: 4px; }
        .meta { margin-bottom: 16px; color: #6b7280; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #d1d5db; padding: 8px; text-align: left; }
        th { background: #eff6ff; }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <div class="meta">CFTP-L2C · Généré le {{ now()->format('d/m/Y H:i') }}</div>
    @include($view, $data)
</body>
</html>
