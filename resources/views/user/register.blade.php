<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="user/css/login.css">

    <title>Facebook-Login or Sign up</title>
</head>
<body>
    <main>
        <div class="row">
            <div class="colm-form">
                <br>
                <br>
                <br>
                <h1>Inscription</h1>
                <br>
                <br>
                <form action="{{action('App\Http\Controllers\UserController@saveaccount')}}" method="POST">
                {{csrf_field()}}
                    <div class="form-container">
                        @if (count($errors) > 0)
                        <div class="alert-danger">
                            @foreach ($errors->all() as $error)
                                <p class="text-center" style="padding: 0; margin:0;">{{$error}}</p>
                            @endforeach
                        </div>
                        @endif
                        @if (Session::has('status'))
                            <div class="alert alert-success">
                            {{Session::get('status')}}
                            </div>
                        @endif
                        <input type="email" name="email" placeholder="Votre adresse email" value="{{old('email')}}">
                        <input type="text" name="username" placeholder="Nom d'utilisateur" value="{{old('username')}}">
                        <select name="type_account" id="">
                            <option value="1">je souhaite acheter des services</option>
                            <option value="2" selected>je souhaite vendre des services</option>
                        </select>
                        <input type="password" name="password" placeholder="Votre mot de passe">
                        <input type="password" name="password_confirm" placeholder="Confirmer mot de passe">
                        <div class="approve">
                            <input type="checkbox" name="condition" class="checkbox" id="approuve" name="condition">
                            <label for="approuve">Accepter <a href="">Conditions d'utilisation</a> et <a href="">politique de confidentialité</a></label>
                        </div>
                        <button type="submit" class="btn-login">S'inscrire</button>
                        <a href=""></a>
                        <a href="{{URL::to('/login')}}" class="btn-new">Se connecter</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

