<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des étudiants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif

<h2>Liste des étudiants</h2>

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Classe</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody> 
        @foreach ($etudiants as $etudiant)
            <tr scope="row">
                <td>{{ $etudiant->id }}</td>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->classe }}</td>
                <td>
                    <a href="/update/etudiant/{{ $etudiant->id }}" class="btn btn-info">Update</a> 
                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" onclick="setDeleteRoute({{ $etudiant->id }})">Delete</button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal de confirmation de suppression -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header   alert alert-danger">
        <h5 class="modal-title" id="deleteModalLabel">Confirmer la suppression</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Êtes-vous sûr de vouloir supprimer cet étudiant ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        <form id="deleteForm" method="POST" >
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div>
    <a href="/ajouter/etudiant" class="btn btn-success">Ajouter un étudiant</a>
</div>

<script>
    // Fonction pour définir l'URL de la route de suppression avec l'ID de l'étudiant
    function setDeleteRoute(id) {
        // Remplacez '/delete/etudiant/' par la route de suppression correcte
        document.getElementById('deleteForm').action = `/delete/etudiant/${id}`;
    }
</script>

</body>
</html>
