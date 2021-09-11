@extends('layouts.body')

@section('Title')
Etudiant
@endsection

@section('img')
user
@endsection

@section('UserName')
Azdad Anas
@endsection

@section('profileActive')
active
@endsection

@section('NavbarLinks')
<li class="nav-item @yield('profileActive')">
    <a href="{{Route('student.profile')}}" class="nav-link">Profile</a>
</li>
<li class="nav-item @yield('notesActive')">
    <a href="{{Route('student.notes')}}" class="nav-link">Notes</a>
</li>
<li class="nav-item">
    <a href="#" class="nav-link">Emploi du temps</a>
</li>
@endsection

@section('content')
<style>
    .liProfil{
        font-size: 20px;
        line-height: 52px;
    }
</style>

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

    @if(session('status'))
      <div class="flag note note--success" style="margin-top:50px">
        <div class="flag__image note__icon">
          <i class="fa fa-check"></i>
        </div>
        <div class="flag__body note__text">
          Votre mot de passe a ete bien reintialise !!
        </div>
        <a href="#" class="note__close">
          <i class="fa fa-times"></i>
        </a>
      </div>
    @endif

<div class="d-flex flex-column justify-content-center">
  <div class="d-flex flex-row justify-content-center align-items-center" style="margin-top:50px; margin-bottom: 20px;">
      
      <div class="d-flex flex-column align-items-center">
          <img src="/storage/profil_images/{{ $user->profil_img }}" alt="student" width="260">
      </div>
      
      <ul>
          <li class="liProfil"><b>Nom :</b> {{ $user->nom }}</li>
          <li class="liProfil"><b>Prenom :</b> {{ $user->prenom }}</li>
          <li class="liProfil"><b>Date de naissance :</b> {{ $user->dateNaissance }}</li>
          <li class="liProfil"><b>Téléphone :</b> {{ $user->telephone }}</li>
          <li class="liProfil"><b>Filière :</b> {{ $user->filiere }}</li>
          <li class="liProfil"><b>Email :</b> {{ $user->email }}</li>
          <a href="javascript:void(0)"  class="btn btn-primary" style="padding: 5px 50px;" onclick="editStudent({{ $user->id }})">
              <i class="far fa-edit"></i>
              Modifier Mes Infos
          </a>
      </ul>
  </div>
  <a href="{{ Route('student.pdf') }}" class="btn btn-warning">
    <i class="fas fa-file-pdf"></i>
    Télécharger <b>PDF</b>
  </a>
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
          <form id="editStudentForm" action="{{ Route('student.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
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

            <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                  </div>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Mot de Passe">
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                  </div>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le Mot de Passe">
                </div>
              </div>

              <div class="col-auto">
                <div class="input-group mb-2">
                  <label class="btn btn-secondary" style="padding: 5px 50px;">
                    <i class="fas fa-image"></i>
                    Changer Image
                    <input type="file" name="profil_img">
                  </label>
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
<script>
function editStudent(id){
    $('#editStudentModal').modal('toggle');

    $('#nom').val('{{ $user->nom }}');
    $('#prenom').val('{{ $user->prenom }}');
    $('#telephone').val('{{ $user->telephone }}');
    $('#dateNaissance').val('{{ $user->dateNaissance }}');
    $('#filiere').val('{{ $user->filiere }}');
    $('#email').val('{{ $user->email }}');
}

</script>
@endsection