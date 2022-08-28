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
                <h1>Se connecter</h1>
                <br>
                <br>
                <form action="{{action('App\Http\Controllers\UserController@loginaction')}}" method="POST">
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
                    <input type="email" name="email" placeholder="Votre adresse email">
                    <input type="password" name="password" placeholder="Votre mot de passe">
                    <button class="btn-login">Se connecter</button>
                    <a href="#">Mot de passe oublié</a>
                    <a href="{{URL::to('/register')}}" class="btn-new">Créer un compte</a>
                </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>

