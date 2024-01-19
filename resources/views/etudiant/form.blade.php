<!-- resources/views/etudiant/etudiant.blade.php -->

    <h1>Ajouter/Modifier un étudiant</h1>

    <form action="{{ isset($etudiant) ? url('/etudiants/update/' . $etudiant->id) : url('/etudiants/insert') }}" method="post">

        @csrf

        @if(isset($etudiant))
            @method('PUT')
        @endif

        <label for="nom">Nom de l'étudiant:</label>
        <input type="text" name="nom" value="{{ old('nom', isset($etudiant) ? $etudiant->nom : '') }}">
        @error('nom')
            <div>{{ $message }}</div>
        @enderror

        <label for="prenom">Prénom de l'étudiant:</label>
        <input type="text" name="prenom" value="{{ old('prenom', isset($etudiant) ? $etudiant->prenom : '') }}">
        @error('prenom')
            <div>{{ $message }}</div>
        @enderror

        <label for="sexe">Sexe de l'étudiant:</label>
        <input type="text" name="sexe" value="{{ old('sexe', isset($etudiant) ? $etudiant->sexe : '') }}">
        @error('sexe')
            <div>{{ $message }}</div>
        @enderror

        <label for="filiere_id">Filière:</label>
        <select name="filiere_id">
            @foreach($filieres as $filiere)
                <option value="{{ $filiere->id }}" {{ isset($etudiant) && $etudiant->filiere_id == $filiere->id ? 'selected' : '' }}>
                    {{ $filiere->nom }}
                </option>
            @endforeach
        </select>

        <!-- Champ pour sélectionner l'utilisateur -->
    <label for="user_id">Utilisateur:</label>
    <select name="user_id">
        @foreach($users as $user)
            <option value="{{ $user->id }}" {{ isset($etudiant) && $etudiant->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->name }} <!-- Assurez-vous d'ajuster le nom de l'attribut utilisateur en conséquence -->
            </option>
        @endforeach
    </select>
    <!-- Fin du champ pour sélectionner l'utilisateur -->

        <button type="submit">{{ isset($etudiant) ? 'Modifier' : 'Enregistrer' }}</button>
    </form>

