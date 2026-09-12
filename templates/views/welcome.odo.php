<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Doppar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500;700&family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@500;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        :root {
            --bg: #fbfbf9;
            --card-bg: #ffffff;
            --card-border: #ececea;
            --text: #18181b;
            --muted: #6b7280;
            --line: #e7e5e4;
            --emerald: #10b981;
            --emerald-soft: #34d399;
            --orange: #fb923c;
            --violet: #807dfc;
            --yellow: #facc15;
            --panel-bg: #0a0a0a;
            --mono: 'JetBrains Mono', ui-monospace, Menlo, Consolas, monospace;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: var(--text);
            background: var(--bg);
            padding: 40px 20px;
        }

        .wrap {
            width: 100%;
            max-width: 980px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 10px;
            margin: 0 4px 18px;
        }

        .brand img {
            width: 24px;
            height: auto;
        }

        .brand span {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 15px;
        }

        .card {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 28px;
            overflow: hidden;
            box-shadow: 0 50px 100px -40px rgba(15, 23, 42, 0.18);
        }

        .left {
            padding: 56px 52px;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            font-family: var(--mono);
            font-size: 11px;
            font-weight: 600;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--emerald);
            margin-bottom: 18px;
        }

        .eyebrow .dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: var(--emerald);
            box-shadow: 0 0 8px rgba(16, 185, 129, 0.7);
        }

        .left h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.85rem;
            line-height: 1.2;
            margin: 0 0 14px;
        }

        .left p.lede {
            color: var(--muted);
            font-size: 14.5px;
            line-height: 1.65;
            margin: 0 0 34px;
            max-width: 360px;
        }

        .steps {
            margin-bottom: 34px;
        }

        .step {
            position: relative;
            padding-left: 30px;
            padding-bottom: 22px;
        }

        .step:last-child {
            padding-bottom: 0;
        }

        .step::before {
            content: '';
            position: absolute;
            left: 5px;
            top: 20px;
            bottom: -2px;
            width: 1px;
            background: var(--line);
        }

        .step:last-child::before {
            display: none;
        }

        .step-marker {
            position: absolute;
            left: 0;
            top: 2px;
            width: 11px;
            height: 11px;
            border-radius: 50%;
            border: 1.5px solid var(--emerald-soft);
            background: #fff;
        }

        .step-marker::after {
            content: '';
            position: absolute;
            inset: 2.5px;
            border-radius: 50%;
            background: var(--emerald-soft);
        }

        .step-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.06em;
            text-transform: uppercase;
            color: #9ca3af;
            margin-bottom: 4px;
        }

        .step a {
            font-size: 14.5px;
            font-weight: 600;
            color: var(--text);
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .step a:hover {
            color: var(--emerald);
        }

        .step a .arrow {
            font-size: 12px;
            color: var(--orange);
        }

        .cta {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 13px 26px;
            border-radius: 999px;
            background: var(--yellow);
            color: #171717;
            text-decoration: none;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.01em;
            box-shadow: 0 14px 30px -12px rgba(250, 204, 21, 0.65);
            transition: transform .15s ease, box-shadow .15s ease;
        }

        .cta:hover {
            transform: translateY(-1px);
            box-shadow: 0 18px 34px -12px rgba(250, 204, 21, 0.8);
        }

        .meta {
            margin-top: 30px;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 4px;
            font-family: var(--mono);
            font-size: 12px;
            color: #9ca3af;
        }

        .meta img {
            height: 14px;
            width: auto;
            margin-right: 6px;
        }

        .meta a {
            color: var(--muted);
            text-decoration: none;
            border-bottom: 1px solid var(--line);
        }

        .meta a:hover {
            color: var(--orange);
            border-color: var(--orange);
        }

        .right {
            position: relative;
            background: var(--panel-bg);
            min-height: 460px;
        }

        .right svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
        }

        @media (max-width: 860px) {
            .card {
                grid-template-columns: 1fr;
            }

            .left {
                padding: 40px 28px;
                order: 2;
            }

            .right {
                min-height: 200px;
                order: 1;
            }
        }
    </style>
</head>

<body>
    <div class="wrap">

        <div class="card">
            <div class="left">
                <div class="eyebrow"><span class="dot"></span> Application ready</div>

                <h1>Let's build something.</h1>

                <div class="steps">
                    <div class="step">
                        <span class="step-marker"></span>
                        <div class="step-label">01 &middot; Learn</div>
                        <a href="https://doppar.com/versions/4.x/installation" target="_blank" rel="noopener">Read the documentation <span class="arrow">&#8599;</span></a>
                    </div>
                    <div class="step">
                        <span class="step-marker"></span>
                        <div class="step-label">02 &middot; Explore</div>
                        <a href="https://doppar.com/versions/4.x/releases" target="_blank" rel="noopener">See what's new in 4.x <span class="arrow">&#8599;</span></a>
                    </div>
                    <div class="step">
                        <span class="step-marker"></span>
                        <div class="step-label">03 &middot; Connect</div>
                        <a href="https://github.com/doppar" target="_blank" rel="noopener">Star the project on GitHub <span class="arrow">&#8599;</span></a>
                    </div>
                </div>

                <a href="https://www.youtube.com/@doppar-3x" class="cta">Learn</a>

                <div class="meta">
                    <img src="[[ enqueue('logo.png') ]]" alt="Doppar" />
                    v[[ Application::VERSION ]] &middot; PHP [[ phpversion() ]] &middot;
                    <a href="https://blog.doppar.com" target="_blank" rel="noopener">Doppar News &#8599;</a>
                </div>
            </div>

            <div class="right">
                <svg viewBox="0 0 480 620" preserveAspectRatio="xMidYMid slice" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="g1" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#34d399" />
                            <stop offset="100%" stop-color="#10b981" />
                        </linearGradient>
                        <linearGradient id="g2" x1="0" y1="0" x2="1" y2="1">
                            <stop offset="0%" stop-color="#fb923c" />
                            <stop offset="100%" stop-color="#f97316" />
                        </linearGradient>
                        <linearGradient id="g3" x1="0" y1="1" x2="1" y2="0">
                            <stop offset="0%" stop-color="#807dfc" />
                            <stop offset="100%" stop-color="#a78bfa" />
                        </linearGradient>
                        <pattern id="dots" width="26" height="26" patternUnits="userSpaceOnUse">
                            <circle cx="1.3" cy="1.3" r="1.3" fill="rgba(255,255,255,0.06)" />
                        </pattern>
                    </defs>

                    <rect width="480" height="620" fill="#0a0a0a" />
                    <rect width="480" height="620" fill="url(#dots)" />

                    <text x="500" y="470" text-anchor="end" font-family="'Space Grotesk', sans-serif" font-weight="700" font-size="480" fill="none" stroke="rgba(255,255,255,0.08)" stroke-width="2">4</text>

                    <g opacity="0.95">
                        <rect x="0" y="0" width="150" height="150" rx="22" fill="url(#g1)" transform="translate(60 90) rotate(45)" />
                        <rect x="0" y="0" width="92" height="92" rx="16" fill="url(#g2)" opacity="0.92" transform="translate(300 60) rotate(45)" />
                        <rect x="0" y="0" width="64" height="64" rx="12" fill="url(#g3)" opacity="0.85" transform="translate(120 330) rotate(45)" />
                        <rect x="0" y="0" width="118" height="118" rx="18" fill="none" stroke="url(#g1)" stroke-width="2.5" opacity="0.7" transform="translate(270 400) rotate(45)" />
                        <rect x="0" y="0" width="46" height="46" rx="10" fill="url(#g2)" opacity="0.9" transform="translate(60 500) rotate(45)" />
                    </g>

                    <g stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none">
                        <path d="M90 165 L90 260 L190 260" />
                        <path d="M300 145 L300 220 L230 220" />
                    </g>
                    <circle cx="90" cy="260" r="3.5" fill="#34d399" />
                    <circle cx="190" cy="260" r="3.5" fill="#fb923c" />
                    <circle cx="230" cy="220" r="3.5" fill="#a78bfa" />

                    <g font-family="'JetBrains Mono', monospace" font-size="12" font-weight="600" letter-spacing="2" fill="rgba(255,255,255,0.5)">
                        <text x="34" y="580">DOPPAR/4.X</text>
                    </g>
                </svg>
            </div>
        </div>
    </div>
</body>

</html>
