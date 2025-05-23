<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Welcome to Doppar</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #8486FF;
            --primary-hover: #8486FF;
            --text-color: #333;
            --light-text-color: #666;
            --background-color: #f7f9fc;
            --card-background: white;
            --shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
            --border-radius: 14px;
        }

        body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: var(--background-color);
            color: var(--text-color);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            box-sizing: border-box;
        }

        .container {
            position: relative;
            text-align: center;
            padding: 40px;
            background: var(--card-background);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            min-width: 320px;
            max-width: 450px;
            width: 100%;
        }

        .welcome-message {
            font-size: 1.4rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--primary-color);
            line-height: 1.4;
        }

        .btn-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 13px 28px;
            font-size: 1.05rem;
            font-weight: 600;
            text-decoration: none;
            color: #fff;
            background-color: var(--primary-color);
            border-radius: 9px;
            transition: background-color 0.3s ease, transform 0.2s ease;
            border: none;
            cursor: pointer;
        }

        .btn:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
        }

        .btn:active {
            transform: translateY(0);
            background-color: #004599;
        }

        .php-version {
            position: absolute;
            bottom: 18px;
            right: 18px;
            font-size: 0.85rem;
            color: var(--light-text-color);
            font-weight: 500;
        }

        @media (max-width: 500px) {
            .btn-group {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .btn {
                width: 80%;
                max-width: 250px;
            }

            .container {
                padding: 30px 25px;
            }

            .welcome-message {
                font-size: 1.3rem;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <p class="welcome-message">{{ trans('messages.welcome', ['version' => 'v'.\Phaseolies\Application::VERSION]) }}</p>
        <div class="btn-group">
            <a href="https://github.com/doppar/doppar" class="btn">GitHub</a>
            <a href="https://doppar.com" class="btn">Documentation</a>
        </div>
        <div class="php-version">
            PHP {{ phpversion() }}
        </div>
    </div>
</body>
</html>