<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>{{ $title }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; color: #1e293b; font-size: 10px; background: #fff; }

        .header { background: #0f172a; padding: 20px 28px; }
        .header-top { display: table; width: 100%; }
        .header-brand { display: table-cell; vertical-align: middle; }
        .header-stamp { display: table-cell; vertical-align: middle; text-align: right; width: 110px; }
        .brand-tag {
            background: #3b82f6;
            color: #fff;
            font-size: 13px;
            font-weight: bold;
            letter-spacing: 1.5px;
            padding: 4px 12px;
            display: inline-block;
        }
        .brand-name { color: #f1f5f9; font-size: 15px; font-weight: bold; margin-top: 5px; }
        .brand-sub { color: #64748b; font-size: 9px; margin-top: 2px; }
        .stamp {
            border: 1px solid #334155;
            border-radius: 3px;
            padding: 5px 8px;
            text-align: center;
        }
        .stamp-label { color: #94a3b8; font-size: 7px; letter-spacing: 1px; text-transform: uppercase; }
        .stamp-value { color: #3b82f6; font-size: 9px; font-weight: bold; margin-top: 2px; }

        .title-bar {
            background: #1e293b;
            border-left: 5px solid #3b82f6;
            padding: 10px 28px;
            display: table;
            width: 100%;
        }
        .title-bar-left { display: table-cell; vertical-align: middle; }
        .title-bar-right { display: table-cell; vertical-align: middle; text-align: right; width: 200px; }
        .report-title { color: #f1f5f9; font-size: 13px; font-weight: bold; }
        .report-date { color: #64748b; font-size: 9px; margin-top: 3px; }
        .record-count {
            background: #0f172a;
            color: #94a3b8;
            font-size: 9px;
            padding: 3px 10px;
            border-radius: 10px;
            display: inline-block;
        }
        .record-count strong { color: #3b82f6; }

        .content { padding: 18px 28px 0; }

        table { width: 100%; border-collapse: collapse; }
        thead tr { background: #1e293b; }
        th {
            color: #cbd5e1;
            padding: 8px 10px;
            text-align: left;
            font-size: 8px;
            text-transform: uppercase;
            letter-spacing: 0.7px;
            border-right: 1px solid #334155;
            font-weight: bold;
        }
        th:last-child { border-right: none; }
        th.col-num { background: #0f172a; color: #475569; text-align: center; width: 24px; }

        td {
            padding: 7px 10px;
            border-bottom: 1px solid #e2e8f0;
            border-right: 1px solid #f1f5f9;
            font-size: 9.5px;
            color: #374151;
            vertical-align: middle;
        }
        td:last-child { border-right: none; }
        td.col-num { text-align: center; color: #9ca3af; font-size: 9px; background: #fafafa; }
        tr:nth-child(even) td { background: #f8fafc; }
        tr:nth-child(even) td.col-num { background: #f1f5f9; }

        tfoot td {
            background: #f0f9ff;
            color: #0369a1;
            font-size: 9px;
            font-weight: bold;
            border-top: 2px solid #bae6fd;
            border-bottom: none;
            padding: 7px 10px;
        }
        tfoot td.col-num { background: #e0f2fe; }

        .footer { display: table; width: 100%; margin: 16px 28px 0; border-top: 1px solid #e2e8f0; padding-top: 8px; }
        .footer-left { display: table-cell; color: #9ca3af; font-size: 8px; }
        .footer-right { display: table-cell; text-align: right; color: #9ca3af; font-size: 8px; }
        .footer-right strong { color: #475569; }

        .badge-admis { color: #166534; font-weight: bold; }
        .badge-ajourné { color: #991b1b; font-weight: bold; }
    </style>
</head>
<body>

<div class="header">
    <div class="header-top">
        <div class="header-brand">
            <span class="brand-tag">CFTP-L2C</span>
            <div class="brand-name">Centre de Formation Professionnelle</div>
            <div class="brand-sub">Gestion des Apprenants &mdash; Système d&rsquo;Information</div>
        </div>
        <div class="header-stamp">
            <div class="stamp">
                <div class="stamp-label">Document</div>
                <div class="stamp-value">Officiel</div>
            </div>
        </div>
    </div>
</div>

<div class="title-bar">
    <div class="title-bar-left">
        <div class="report-title">{{ $title }}</div>
        <div class="report-date">
            Généré le {{ \Carbon\Carbon::now()->locale('fr')->isoFormat('dddd D MMMM YYYY [à] HH:mm') }}
        </div>
    </div>
    <div class="title-bar-right">
        @php $count = collect($data)->first()?->count() ?? 0; @endphp
        <span class="record-count"><strong>{{ $count }}</strong> enregistrement{{ $count > 1 ? 's' : '' }}</span>
    </div>
</div>

<div class="content">
    @include($view, $data)
</div>

<div class="footer" style="margin: 16px 28px 0; width: calc(100% - 56px);">
    <div class="footer-left">CFTP-L2C &mdash; Gestion des Apprenants &middot; Document confidentiel</div>
    <div class="footer-right"><strong>{{ now()->format('d/m/Y') }}</strong></div>
</div>

</body>
</html>
