@props(['pupil', 'weekday'])
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/public/css/main.css" rel="stylesheet" >
    <title>Учнівський кабінет</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body>

    <div class="content">
        <header>
            <div class="header-title">
                <h3>Учнівський кабінет ліцею №1 </h3>
            </div>
            <div class="header-login">
                @auth
                    <form method="POST" action="/server.php/logout">
                        @csrf
                        <input class="login-button" value="Вийти" type="submit">
                    </form>
                @endauth
            </div>
        </header>
        @unless($pupil == null && $weekday == null)
        <div class="sidebar" id="sidebar">
            <h3 class="menu-sidebar">Меню</h3>
            <nav class="navbar">
                <a href="/server.php/pupil/{{$pupil->id}}">Головна</a>
                <a href="/server.php/schedule/{{$pupil->id}}/{{$weekday}}">Розклад</a>
                <a href="/server.php/polls/{{$pupil->id}}">Опитування</a>
            </nav>
        </div>
        <div class="toggle" id="toggle">&#10095;</div>
        @endunless
        <main>
            {{$slot}}
        </main>
        <footer>
            <div>&copy Ліцей №1 Коростишівської міської ради</div>
        </footer>
    </div>
    <x-flash-message />
<script>

    let toggle = document.querySelector('#toggle');
    let sidebar = document.querySelector('#sidebar');

    toggle?.addEventListener('click', function (){
        sidebar.classList.toggle('sidebar-toggled')
        toggle.classList.toggle('toggle-toggled')
    })

</script>
</body>
</html>
