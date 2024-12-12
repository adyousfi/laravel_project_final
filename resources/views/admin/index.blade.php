<!DOCTYPE html>
<html lang="eng">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>

<h1>ADMIn</h1>

<form method="POST" action="{{ route('logout') }}">
                    @csrf

                  <input type="submit" value="Logout">
                </form>
            

</body>
</html>