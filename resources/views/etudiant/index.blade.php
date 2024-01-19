<!-- resources/views/etudiant/index.blade.php -->

    <h1>Liste des étudiants</h1>

    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Sexe</th>
            <th>Filière</th>
            <th colspan="3"><a href="/etudiants/create">Ajouter</a></th>
        </tr>
        @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->sexe }}</td>
                <td>{{ $etudiant->filiere ? $etudiant->filiere->nom : 'Non défini' }}</td>


                <td><a href="/etudiants/edit/{{ $etudiant->id }}">Modifier</a></td>
                <td><a href="/etudiants/delete/{{ $etudiant->id }}">Supprimer</td>
                <td><a href="/etudiants/show/{{ $etudiant->id }}">show</td>
            </tr>
        @endforeach
    </table>

