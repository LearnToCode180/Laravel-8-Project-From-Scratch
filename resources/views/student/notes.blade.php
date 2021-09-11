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

@section('notesActive')
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
<div class="col col-lg-9" style="margin-top:50px;">
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Module</th>
                <th>Note</th>
                <th>Mention</th>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>Analyse</td>
                <td>12.65</td>
                <td class="btn-success text-center font-weight-bold">validee</td>
            </tr>
            <tr>
                <td>Algebre</td>
                <td>5.65</td>
                <td class="btn-danger text-center font-weight-bold">Non validee</td>
            </tr>
        </tbody>
    </table>
</div>
@endsection