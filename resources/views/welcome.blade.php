<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Doppar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body{margin:0;font-family:Poppins,sans-serif;background:var(--background-color);color:var(--text-color);display:flex;justify-content:center;align-items:center;min-height:100vh;padding:20px;box-sizing:border-box}.container{position:relative;text-align:center;padding:40px;background:var(--card-background);border-radius:var(--border-radius);box-shadow:var(--shadow);min-width:320px;max-width:450px;width:100%}
    </style>
</head>
<body>
    <div class="container">
        <p class="welcome-message">{{ trans('messages.welcome', ['version' => 'v'. Application::VERSION]) }}</p>
        <div class="btn-group">
            <a href="https://github.com/doppar" class="btn">GitHub</a>
            <a href="https://doppar.com" class="btn">Documentation</a>
        </div>
        <div class="php-version">
            PHP {{ phpversion() }}
        </div>
    </div>
</body>
</html>