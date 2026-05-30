<table>
    <thead>
        <tr>
            <th>Matricule</th>
            <th>Nom complet</th>
            <th>Sexe</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Filière</th>
            <th>Date inscription</th>
        </tr>
    </thead>
    <tbody>
        @foreach($apprenants as $apprenant)
            <tr>
                <td>{{ $apprenant->matricule }}</td>
                <td>{{ $apprenant->nom_complet }}</td>
                <td>{{ $apprenant->sexe->label() }}</td>
                <td>{{ $apprenant->email }}</td>
                <td>{{ $apprenant->telephone }}</td>
                <td>{{ $apprenant->filiere->nom }}</td>
                <td>{{ $apprenant->date_inscription->format('d/m/Y') }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
