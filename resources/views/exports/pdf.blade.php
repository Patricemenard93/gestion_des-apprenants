<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; color: #1f2937; font-size: 11px; margin: 0; }
        .header { background: #0f172a; color: #fff; padding: 20px 30px; margin: -10px -10px 0; }
        .header h1 { font-size: 18px; margin: 0 0 4px; }
        .header .subtitle { color: #94a3b8; font-size: 11px; }
        .content { padding: 20px 30px; }
        .meta { margin-bottom: 16px; color: #6b7280; font-size: 10px; border-bottom: 1px solid #e5e7eb; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th { background: #1e293b; color: #fff; padding: 8px 10px; text-align: left; font-size: 10px; text-transform: uppercase; letter-spacing: 0.5px; }
        td { border-bottom: 1px solid #e5e7eb; padding: 7px 10px; }
        tr:nth-child(even) td { background: #f8fafc; }
        .footer { margin-top: 20px; text-align: center; color: #9ca3af; font-size: 9px; border-top: 1px solid #e5e7eb; padding-top: 10px; }
    </style>
</head>
<body>
    <div class="header">
        <h1>CFTP-L2C &middot; Centre de Formation</h1>
        <div class="subtitle">{{ $title }}</div>
    </div>
    <div class="content">
        <div class="meta">Document généré le {{ now()->format('d/m/Y à H:i') }} &middot; {{ now()->format('l') }}</div>
        @include($view, $data)
        <div class="footer">CFTP-L2C &mdash; Gestion des Apprenants &middot; Document confidentiel</div>
    </div>
</body>
</html>
