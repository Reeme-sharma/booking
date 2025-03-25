<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Panel</title>
</head>
<body>
    <div>
        <header>this is user header</header>
        <aside id="sidebar">
            @yield('sidebar')
        </aside>
        <section>
            @yield('content')
        </section>
        <footer>this is user footer</footer>
    </div>
</body>
</html>