<table>
    <colgroup>
        <col style="width:80pt;">
        <col style="width:90pt;">
        <col style="width:45pt;">
        <col style="width:115pt;">
        <col style="width:75pt;">
        <col style="width:90pt;">
        <col style="width:70pt;">
    </colgroup>
    <thead>
        <tr>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Matricule</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Nom complet</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Sexe</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Email</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Téléphone</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Filière</th>
            <th style="background:#1e293b;color:#ffffff;padding:8px 10px;text-align:left;font-size:10px;font-weight:bold;border:1px solid #334155;">Date inscription</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apprenants as $apprenant)
            <tr>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;mso-number-format:'\@';">{{ $apprenant->matricule }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $apprenant->nom_complet }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $apprenant->sexe->label() }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;mso-number-format:'\@';">{{ $apprenant->email }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;mso-number-format:'\@';">{{ $apprenant->telephone }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;">{{ $apprenant->filiere->nom }}</td>
                <td style="padding:7px 10px;border:1px solid #e2e8f0;mso-number-format:'\@';">{{ $apprenant->date_inscription->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" style="padding:7px 10px;border:1px solid #bae6fd;background:#f0f9ff;color:#0369a1;font-weight:bold;">
                Total : {{ $apprenants->count() }} apprenant{{ $apprenants->count() > 1 ? 's' : '' }}
            </td>
        </tr>
    </tfoot>
</table>
