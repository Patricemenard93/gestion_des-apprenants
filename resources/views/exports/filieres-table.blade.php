<table>
    <thead>
        <tr>
            <th>Nom</th>
            <th>Duree</th>
            <th>Description</th>
            <th>Nombre apprenants</th>
        </tr>
    </thead>
    <tbody>
        @foreach($filieres as $filiere)
            <tr>
                <td>{{ $filiere->nom }}</td>
                <td>{{ $filiere->duree }}</td>
                <td>{{ $filiere->description }}</td>
                <td>{{ $filiere->apprenants_count }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
