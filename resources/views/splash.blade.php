<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loading Portfolio...</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            width: 100%;
            overflow: hidden;
            background-color: #0a0a0a;
            color: #ffffff;
            font-family: 'Segoe UI', sans-serif;
        }

        .splash {
            position: relative;
            height: 100vh;
            width: 100vw;
        }

        /* ── BACKGROUND GIF ── */
        .splash-gif {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Dark gradient overlay so text stays readable */
        .splash-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg,
                rgba(0,0,0,0.55) 0%,
                rgba(0,0,0,0.25) 35%,
                rgba(0,0,0,0.35) 65%,
                rgba(0,0,0,0.85) 100%);
        }

        /* ── CENTER CONTENT ── */
        .splash-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            text-align: center;
            padding: 0 1.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 1.4rem;
        }

        .splash-eyebrow {
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 5px;
            text-transform: uppercase;
            color: #cccccc;
            opacity: 0;
            animation: fadeUp 0.7s ease forwards;
            animation-delay: 0.1s;
        }

        .splash-title {
            font-size: clamp(1.8rem, 4.2vw, 3.4rem);
            font-weight: 800;
            letter-spacing: 1px;
            line-height: 1.15;
            text-shadow: 0 6px 24px rgba(0,0,0,0.6);
            opacity: 0;
            animation: fadeUp 0.7s ease forwards;
            animation-delay: 0.25s;
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(14px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ── LOADING BAR ── */
        .loading-bar-track {
            width: clamp(180px, 22vw, 280px);
            height: 3px;
            background: rgba(255,255,255,0.15);
            border-radius: 3px;
            overflow: hidden;
            opacity: 0;
            animation: fadeUp 0.7s ease forwards;
            animation-delay: 0.4s;
        }

        .loading-bar-fill {
            height: 100%;
            width: 0%;
            background: #ffffff;
            border-radius: 3px;
            /* Wait until the track has fully faded in (0.4s delay + 0.7s fade)
               before starting the fill, so it visually starts at 0% */
            animation: fillBar 3s ease forwards;
            animation-delay: 1.1s;
        }

        @keyframes fillBar {
            from { width: 0%; }
            to   { width: 100%; }
        }

        .loading-label {
            font-size: 0.7rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #999999;
            opacity: 0;
            animation: fadeUp 0.7s ease forwards, pulse 1.8s ease-in-out infinite;
            animation-delay: 0.5s, 0.9s;
        }

        @keyframes pulse {
            0%, 100% { opacity: 0.45; }
            50%      { opacity: 0.9; }
        }

        /* ── SCROLLING ROLE TICKER ── */
        .ticker-wrap {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            overflow: hidden;
            white-space: nowrap;
            padding: 1rem 0;
            background-color: rgba(255,255,255,0.04);
            border-top: 1px solid rgba(255,255,255,0.12);
            backdrop-filter: blur(6px);
            -webkit-backdrop-filter: blur(6px);
        }

        .ticker-track {
            display: inline-block;
            white-space: nowrap;
            animation: scrollLeft 20s linear infinite;
        }

        .ticker-track span {
            display: inline-block;
            font-size: 0.85rem;
            font-weight: 600;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #ffffff;
            padding: 0 2.2rem;
            opacity: 0.75;
        }

        .ticker-track span::after {
            content: '•';
            margin-left: 2.2rem;
            opacity: 0.35;
        }

        @keyframes scrollLeft {
            0%   { transform: translateX(0%); }
            100% { transform: translateX(-50%); }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 640px) {
            .splash-eyebrow { letter-spacing: 3px; }
            .ticker-track span { font-size: 0.75rem; padding: 0 1.4rem; }
            .ticker-track span::after { margin-left: 1.4rem; }
        }
    </style>
</head>
<body>

    <div class="splash">

        <img src="{{ asset('images/loading_screen.gif') }}" alt="Loading" class="splash-gif">
        <div class="splash-overlay"></div>

        <div class="splash-content">
            <p class="splash-eyebrow">Monjhie Dulay</p>
            <h1 class="splash-title">Loading Portfolio</h1>

            <div class="loading-bar-track">
                <div class="loading-bar-fill"></div>
            </div>
            <p class="loading-label">Please wait a moment</p>
        </div>

        <div class="ticker-wrap">
            <div class="ticker-track">
                <span>Game Developer</span>
                <span>Website Developer</span>
                <span>UI Designer</span>
                <span>Flutter Developer</span>
                <span>Laravel Developer</span>
                <!-- duplicate set so the loop is seamless -->
                <span>Game Developer</span>
                <span>Website Developer</span>
                <span>UI Designer</span>
                <span>Flutter Developer</span>
                <span>Laravel Developer</span>
            </div>
        </div>

    </div>

    <script>
        // Bar becomes visible at 1.1s and takes 3s to fill = 4.1s total,
        // then fade out and redirect
        var totalWait = 1100 + 3000; // 4100ms
        setTimeout(function () {
            document.querySelector('.splash').style.transition = 'opacity 0.5s ease';
            document.querySelector('.splash').style.opacity = '0';
            setTimeout(function () {
                window.location.href = "{{ route('home') }}";
            }, 500);
        }, totalWait);
    </script>

</body>
</html>