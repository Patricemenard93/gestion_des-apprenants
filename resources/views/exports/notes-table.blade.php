<table>
    <thead>
        <tr>
            <th>Apprenant</th>
            <th>Matricule</th>
            <th>Filiere</th>
            <th>Module</th>
            <th>Note</th>
            <th>Coefficient</th>
        </tr>
    </thead>
    <tbody>
        @foreach($notes as $note)
            <tr>
                <td>{{ $note->apprenant->nom_complet }}</td>
                <td>{{ $note->apprenant->matricule }}</td>
                <td>{{ $note->apprenant->filiere->nom }}</td>
                <td>{{ $note->module }}</td>
                <td>{{ number_format((float) $note->note, 2, ',', ' ') }}</td>
                <td>{{ $note->coefficient }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
