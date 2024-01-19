<!-- resources/views/etudiant/show.blade.php -->




    <h1>Détails de l'étudiant</h1>

    <p>Nom: {{ $etudiant->nom }}</p>
    <p>Prénom: {{ $etudiant->prenom }}</p>
    <p>Sexe: {{ $etudiant->sexe }}</p>
    <p>Filière: {{ $etudiant->filiere ? $etudiant->filiere->nom : 'Non défini' }}</p>

