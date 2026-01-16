<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AbdouX | Portfolio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #f4f4f4; }
        header { background: #111; color: white; padding: 15px; }
        nav a { color: white; margin-right: 15px; text-decoration: none; }
        .container { padding: 20px; }
        footer { background: #111; color: white; text-align: center; padding: 10px; }
    </style>
</head>
<body>

<header>
    <nav>
        <a href="/">Home</a>
        <a href="/projects">Projects</a>
        <a href="/skills">Skills</a>
        <a href="/contact">Contact</a>
        <a href="/chatbot">Chatbot 🤖</a>
    </nav>
</header>

<div class="container">
    @yield('content')
</div>

<footer>
    © {{ date('Y') }} AbdouX – Laravel Developer
</footer>

</body>
</html>
