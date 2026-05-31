<table>
    <colgroup>
        <col style="width:90pt;">
        <col style="width:80pt;">
        <col style="width:90pt;">
        <col style="width:110pt;">
        <col style="width:40pt;">
        <col style="width:55pt;">
    </colgroup>
    <thead>
        <tr>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Apprenant</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Matricule</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Filière</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Module</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Note /20</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Coeff.</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
            <tr>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $note->apprenant->nom_complet }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;mso-number-format:'\@';">{{ $note->apprenant->matricule }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $note->apprenant->filiere->nom }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $note->module }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;text-align:center;mso-number-format:'0.00';">{{ number_format((float) $note->note, 2, ',', '') }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;text-align:center;">{{ $note->coefficient }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="6" style="padding:7px 10px;border:1px solid #bae6fd;background:#f0f9ff;color:#0369a1;font-weight:bold;">
                Total : {{ $notes->count() }} note{{ $notes->count() > 1 ? 's' : '' }}
            </td>
        </tr>
    </tfoot>
</table>
