<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF Download</title>
</head>
<body>
    <style>
        li{
            font-size: 25px;
            line-height: 52px;
            text-align: center;
            list-style-type: none;
        }

        b{
            color: rgb(250, 14, 14);
        }
    </style>

    <div style="text-align: center;">
        <img src="./storage/profil_images/{{ $user->profil_img }}" alt="student" width="260">
    </div>
    
    <ul>
        <li><b>Nom :</b> {{ $user->nom }}</li>
        <li><b>Prenom :</b> {{ $user->prenom }}</li>
        <li><b>Date de naissance :</b> {{ $user->dateNaissance }}</li>
        <li><b>Téléphone :</b> {{ $user->telephone }}</li>
        <li><b>Filière :</b> {{ $user->filiere }}</li>
        <li><b>Email :</b> {{ $user->email }}</li>
    </ul>
</body>
</html>