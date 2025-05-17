<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Welcome</title>
    </head>
    <body>
        <div style="display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0;">
            <div style="text-align: center;">
                <p>{{ trans('messages.welcome', ['version' => \Phaseolies\Application::VERSION]) }}</p>
                <div>
                    <a href="https://github.com/doppar/doppar" class="btn btn-light"
                        style="padding: 10px 20px; margin: 5px;">Github</a>
                    <a href="https://doppar.com" class="btn btn-light"
                        style="padding: 10px 20px; margin: 5px;">Documentation</a>
                </div>
            </div>
        </div>
    </body>
</html>