@extends('layouts.body')

@section('Title')
    Admin
@endsection

@section('img')
admin
@endsection

@section('UserName')
    Admin
@endsection  

@section('NavbarLinks')
<li class="nav-item active">
    <a href="{{Route('admin.index')}}" class="nav-link">Accueil</a>
</li>
@endsection

<style>

*,
*:before,
*:after {
  box-sizing: border-box;
}

</style>

@section('content')   

    <section id="Etudiant" class="text-center">

      @if ($errors->any())
        <div class="flag note note--error" style="margin-top:50px">
          @foreach ($errors->all() as $error)
            <div class="flag__image note__icon">
              <i class="fa fa-times"></i>
            </div>
              <div class="flag__body note__text">
                {{ $error }}
              </div>
            <a href="#" class="note__close">
              <i class="fa fa-times"></i>
            </a>
          @endforeach
        </div>
      @endif

    @if(session('success'))
      <div class="flag note note--success" style="margin-top:50px">
        <div class="flag__image note__icon">
          <i class="fa fa-check"></i>
        </div>
        <div class="flag__body note__text">
          {{ session('success') }}
        </div>
        <a href="#" class="note__close">
          <i class="fa fa-times"></i>
        </a>
      </div>
    @endif

        <h1 style="margin-top:30px;margin-bottom: 30px;">Gestion des Etudiants</h1>
      <button class="btn btn-primary mb-5" data-toggle="modal" data-target="#ajouterEtudiant">
        <i class="material-icons align-top mr-1">person_add</i>
        Ajouter
      </button>
      <table class="table table-striped table-bordered">
        <thead>
            <tr style="background-color: #435d7d">
              <th colspan="9" class="text-light" style="font-size: 25px">Liste des Etudiants</th>
            </tr>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Date de Naissance</th>
                <th>Téléphone</th>
                <th>Filière</th>
                <th>Email</th>
                <th colspan="3">Actions</th>
            </tr>
        </thead>
        <tbody>
          @foreach ($etudiants as $etudiant)
            <tr>
                <td>{{ $etudiant->nom }}</td>
                <td>{{ $etudiant->prenom }}</td>
                <td>{{ $etudiant->dateNaissance }}</td>
                <td>{{ $etudiant->telephone }}</td>
                <td>{{ $etudiant->filiere }}</td>
                <td>{{ $etudiant->email }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" onclick="editStudent({{ $etudiant->id }})">
                        <img src="/images/edit.png" alt="edit" width="25">
                    </a>
                </td>   
                <td class="text-center">
                    <a href="javascript:void(0)" onclick="deleteStudent({{ $etudiant->id }})">
                        <img src="/images/delete.png" alt="delete" width="25">
                    </a>
                </td>
                <td class="text-center">
                  <a href="{{ Route('admin.deleteView', ['id' => $etudiant->id]) }}">
                      <img src="/images/delete.png" alt="delete" width="25">
                  </a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
        {{ $etudiants->links() }}
      </div>
    </section>
    
{{-- -----------------------------------------------------Modal: AjouterEtudiant----------------------------------------------------- --}}

  <div class="modal fade" id="ajouterEtudiant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Etudiant</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ Route('admin.store') }}" method="POST">
            @csrf
              <div class="col-auto form-row">
                <div class="input-group mb-2 col-sm-6">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>

                <div class="input-group mb-2 col-sm-6">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                  </div>
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom">
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-phone"></i></div>
                  </div>
                  <input type="text" class="form-control" name="telephone" placeholder="Téléphone">
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                  </div>
                  <input type="date" class="form-control" name="dateNaissance" placeholder="Date de Naissance">
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-university"></i></div>
                  </div>
                  <select name="filiere" id="filiere"  class="form-control">
                    <option value="Genie Informatique">Génie Informatique</option>
                    <option value="Genie Industriel">Génie Industriel</option>
                    <option value="Genie Electrique">Génie Electrique</option>
                    <option value="Genie Mecanique">Génie Mécanique</option>
                    <option value="Genie Mathematique">Génie Mathématique</option>
                </select>
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                  </div>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
              </div>

              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <input type="submit" value="Ajouter" class="btn btn-primary">
              </div>
            </form>
        </div>
        
      </div>
    </div>
  </div>

{{-- -----------------------------------------------------Modal: ModifierEtudiant----------------------------------------------------- --}}

<div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modifier Etudiant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="editStudentForm" action="{{ Route('admin.update') }}" method="POST">
          @csrf
          @method('PUT')
          <input type="hidden" name="id" id="id">
          <div class="col-auto form-row">
            <div class="input-group mb-2 col-sm-6">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom">
            </div>

            <div class="input-group mb-2 col-sm-6">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-user"></i></div>
              </div>
              <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prenom">
            </div>
          </div>

          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-phone"></i></div>
              </div>
              <input type="text" class="form-control" id="telephone" name="telephone" placeholder="Téléphone">
            </div>
          </div>

          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
              </div>
              <input type="date" class="form-control" id="dateNaissance" name="dateNaissance" placeholder="Date de Naissance">
            </div>
          </div>

          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-university"></i></div>
              </div>
              <select name="filiere" id="filiere1"  class="form-control">
                <option value="Genie Informatique">Génie Informatique</option>
                <option value="Genie Industriel">Génie Industriel</option>
                <option value="Genie Electrique">Génie Electrique</option>
                <option value="Genie Mecanique">Génie Mécanique</option>
                <option value="Genie Mathematique">Génie Mathématique</option>
            </select>
            </div>
          </div>

          <div class="col-auto">
            <div class="input-group mb-2">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
              </div>
              <input type="email" class="form-control" id="email" name="email" placeholder="Email">
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
            <input type="submit" value="Modifier" class="btn btn-primary">
          </div>
        </form>
      </div>
      
    </div>
  </div>
</div>

{{-- -----------------------------------------------------Modal: SupprimerEtudiant----------------------------------------------------- --}}

<div class="modal fade" id="deleteStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Supprimer Etudiant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Voulez-vous vraiment supprimer cet Etudiant ?</p>
        <small class="font-weight-bold" style="color:#edb200;">
            <i class="fas fa-exclamation-triangle"></i>
            Cette action ne peut pas être annulée !
        </small>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
          <form id="deleteStudentForm" method="POST">
            @csrf
            @method('DELETE')
            <input type="submit" value="Supprimer" class="btn btn-danger">
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
</div>

{{-- -----------------------------------------------------Javascript----------------------------------------------------- --}}

<script>
  function editStudent(id){
    $('#editStudentModal').modal('toggle');

    $.get('/admin/' + id, function(etudiant){
      $('#nom').val(etudiant.nom);
      $('#prenom').val(etudiant.prenom);
      $('#telephone').val(etudiant.telephone);
      $('#dateNaissance').val(etudiant.dateNaissance);
      $('#filiere').val(etudiant.filiere);
      $('#email').val(etudiant.email);
      $('#id').val(etudiant.id);
    });
  }

  function deleteStudent(id){
    $('#deleteStudentModal').modal('toggle');
    $('#deleteStudentForm').attr('action', '/admin/' + id);
  }
</script>

@endsection
