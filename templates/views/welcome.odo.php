<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Doppar</title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
        <style>
            .cta-box,.version{margin-bottom:40px}:root{--primary:#10b981;--background:#f9fafb;--card-bg:#ffffff;--text-color:#111827;--border:#d1d5db}*{box-sizing:border-box}body{margin:0;padding:40px 20px;font-family:Poppins,sans-serif;background:var(--background);color:var(--text-color);text-align:center}.cta-box h2,h1,header img{margin-bottom:10px}header img{width:48px;height:auto}h1{font-size:2rem;font-weight:700}.version{font-size:14px;color:#6b7280}.cta-box{border:2px solid var(--primary);border-radius:12px;padding:20px;display:inline-block;max-width:600px;width:100%;background:#ecfdf5}.cta-box h2{font-size:1.2rem}.cta-box code{background:#e5e7eb;padding:2px 6px;border-radius:4px;font-family:monospace}.grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:20px;max-width:800px;margin:0 auto 40px}.card{background:var(--card-bg);padding:20px;border:1px solid var(--border);border-radius:12px;text-align:left;transition:box-shadow .2s}.card:hover{box-shadow:0 4px 12px rgba(0,0,0,.05)}.card h3{font-size:1rem;margin-bottom:8px}.card p{font-size:14px;color:#4b5563}.footer{font-size:13px;color:#9ca3af;margin-top:50px}.btn-group{margin-top:20px}.btn{display:inline-block;margin:0 10px;padding:10px 18px;background-color:#fff;color:#00f;text-decoration:none;border-radius:6px;font-weight:500;transition:background .2s}.btn:hover{background-color:#c4c9c8;border:1px solid #ddd}
        </style>
    </head>
    <body>
        <header>
            <img src="[[ enqueue('logo.png') ]]" alt="Logo" />
            <h2>Welcome to Doppar</h2>
        </header>
        <section class="cta-box">
            <h3>[[ trans('messages.welcome', ['version' => 'v' . Application::VERSION]) ]]</h3>
            <p>Craft Fast-Loading PHP Application</p>
        </section>
        <section class="grid">
            <a href="https://doppar.com/versions/3.x/starter-kits" class="card">
                <h3>Starter kits</h3>
                <p>To give you a head start building your new Doppar application, we are happy to offer application
                    starter kits.</p>
            </a>
            <a href="https://doppar.com/versions/3.x/architecture-concept" class="card">
                <h3>System Architecture</h3>
                <p>Doppar follows the Model-View-Controller (MVC) architectural pattern, a widely accepted standard in web application development.</p>
            </a>
            <a href="https://doppar.com/versions/3.x/routing" class="card">
                <h3>Routing</h3>
                <p>With support for route prefix grouping, named routes, throttle route, middleware assignment, and RESTful resource routing, Doppar gives developers full control over how requests are handled.</p>
            </a>
            <a href="https://doppar.com/versions/3.x/authentication" class="card">
                <h3>Authentication</h3>
                <p>Doppar simplifies this process by providing built-in tools and scaffolding to help you implement user authentication quickly and securely.</p>
            </a>
        </section>
        <div class="btn-group">
            <a href="https://github.com/doppar" class="btn">GitHub</a>
            <a href="https://doppar.com" class="btn">Website</a>
        </div>
        <div class="footer">
            PHP [[ phpversion() ]]
        </div>
    </body>
</html>
