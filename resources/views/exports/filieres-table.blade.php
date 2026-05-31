<table>
    <colgroup>
        <col style="width:120pt;">
        <col style="width:55pt;">
        <col style="width:240pt;">
        <col style="width:70pt;">
    </colgroup>
    <thead>
        <tr>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Filière</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Durée</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Description</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Nb apprenants</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filieres as $filiere)
            <tr>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;font-weight:bold;">{{ $filiere->nom }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $filiere->duree }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $filiere->description }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;text-align:center;">{{ $filiere->apprenants_count }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3" style="padding:7px 10px;border:1px solid #bae6fd;background:#f0f9ff;color:#0369a1;font-weight:bold;">
                Total : {{ $filieres->count() }} filière{{ $filieres->count() > 1 ? 's' : '' }}
            </td>
            <td style="padding:7px 10px;border:1px solid #bae6fd;background:#f0f9ff;color:#0369a1;font-weight:bold;text-align:center;">
                {{ $filieres->sum('apprenants_count') }}
            </td>
        </tr>
    </tfoot>
</table>
