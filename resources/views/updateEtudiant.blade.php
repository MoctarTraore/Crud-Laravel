<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap-grid.rtl.min.css" integrity="sha512-V7mESobi1wvYdh9ghD/BDbehOyEDUwB4c4IVp97uL0QSka0OXjBrFrQVAHii6PNt/Zc1LwX6ISWhgw1jbxQqGg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="{{ asset('js/app.js') }}"></script>

</head>
<body>
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <ul>
        @foreach ($errors->all() as $error )
            <li class="alert alert-danger"> {{$error}} </li>
        @endforeach
    </ul>
    <h2>Modifier un Etudiant</h2>
    <div>
        <a href="/liste/etudiant" class="btn btn-danger">Liste</a>
    </div>
    
    <form action="/update/etudiant" method="POST" class="form-group">
        @csrf

        <input type="text" class="form-control" name="id" id="name" value="{{$etudiant -> id}}"  style="display: none;">
        <div>
            <label for="name">Nom</label>
            <input type="text" class="form-control" name="nom" id="name" value="{{$etudiant -> nom}}">
        </div> 
        <div>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" class="form-control" id="prenom" value="{{$etudiant -> prenom}}">
        </div> 
        <div>
            <label for="classe">Classe</label>
            <input type="text" class="form-control" name="classe" id="classe" value="{{$etudiant -> classe}}">
        </div> 
        <button class="btn btn-info">Modifier un etudiant</button>
    </form>
</body>
</html>