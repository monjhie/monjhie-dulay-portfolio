<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact | Monjhie Dulay</title>
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=DM+Sans:ital,wght@0,300;0,400;0,500;1,300&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --black:  #0a0a0a;
            --white:  #ffffff;
            --cream:  #f5f2ee;
            --muted:  #888;
            --border: #e8e4df;
        }

        body {
            background-color: var(--white);
            color: var(--black);
            font-family: 'DM Sans', sans-serif;
            overflow-x: hidden;
        }

        /* ══════════════════════════════════════
           PAGE TRANSITION
        ══════════════════════════════════════ */
        .page-wrapper {
            animation: pageFadeIn 0.6s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        }

        @keyframes pageFadeIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        body.fade-out .page-wrapper {
            animation: pageFadeOut 0.35s ease forwards;
        }

        @keyframes pageFadeOut {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-10px); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ══════════════════════════════════════
           PAGE LAYOUT
        ══════════════════════════════════════ */
        .contact-page {
            padding: 120px 6vw 100px;
            max-width: 1300px;
            margin: 0 auto;
        }

        /* ══════════════════════════════════════
           PAGE LABEL + TITLE + DIVIDER
        ══════════════════════════════════════ */
        .page-label {
            font-family: 'Syne', sans-serif;
            font-size: 0.7rem;
            font-weight: 600;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 12px;
            opacity: 0;
            animation: fadeUp 0.5s 0.1s ease forwards;
        }

        .section-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(2.4rem, 5vw, 4rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.08;
            color: var(--black);
            opacity: 0;
            animation: fadeUp 0.6s 0.15s ease forwards;
        }

        .divider {
            width: 48px;
            height: 2px;
            background: var(--black);
            margin: 28px 0 56px;
            opacity: 0;
            animation: fadeUp 0.5s 0.25s ease forwards;
        }

        /* ══════════════════════════════════════
           CONTACT GRID
        ══════════════════════════════════════ */
        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 80px;
            align-items: start;
            opacity: 0;
            animation: fadeUp 0.7s 0.3s ease forwards;
        }

        @media (max-width: 900px) {
            .contact-grid {
                grid-template-columns: 1fr;
                gap: 60px;
            }
        }

        /* ══════════════════════════════════════
           LEFT COLUMN — INFO
        ══════════════════════════════════════ */
        .contact-info {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .info-intro {
            font-family: 'Syne', sans-serif;
            font-size: clamp(1.1rem, 1.8vw, 1.35rem);
            font-weight: 600;
            line-height: 1.45;
            color: var(--black);
            margin-bottom: 32px;
        }

        .info-intro span {
            color: var(--muted);
            font-weight: 400;
        }

        /* Info items */
        .info-list {
            display: flex;
            flex-direction: column;
            gap: 0;
            margin-bottom: 48px;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
        }

        .info-item:first-child {
            border-top: 1px solid var(--border);
        }

        .info-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 600;
        }

        .info-value {
            font-family: 'Syne', sans-serif;
            font-size: 0.92rem;
            font-weight: 700;
            color: var(--black);
            letter-spacing: 0.01em;
        }

        .info-value a {
            color: var(--black);
            text-decoration: none;
            transition: color 0.2s;
        }

        .info-value a:hover {
            color: var(--muted);
        }

        /* Address block */
        .address-block {
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
        }

        .address-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 600;
            margin-bottom: 6px;
        }

        .address-value {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 400;
            color: #444;
            line-height: 1.7;
        }

        /* ══════════════════════════════════════
           RIGHT COLUMN — MAP
        ══════════════════════════════════════ */
        .map-wrap {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .map-label {
            font-family: 'Syne', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
        }

        .map-frame {
            width: 100%;
            aspect-ratio: 4 / 3;
            overflow: hidden;
            border: 1px solid var(--border);
        }

        .map-frame iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        .map-caption {
            font-size: 0.72rem;
            letter-spacing: 0.08em;
            color: var(--muted);
            line-height: 1.6;
        }
    </style>
</head>
<body>

    {{-- NAVBAR COMPONENT --}}
    <x-navbar />

    <div class="page-wrapper">
        <div class="contact-page">

            <!-- ── Page label & heading ── -->
            <p class="page-label">Portfolio — Contact</p>
            <h1 class="section-title">Get in Touch</h1>
            <div class="divider"></div>

            <!-- ══════════════════════════════════════
                 CONTACT GRID
            ══════════════════════════════════════ -->
            <div class="contact-grid">

                <!-- Left: contact info -->
                <div class="contact-info">

                    <p class="info-intro">
                        Have a project in mind or just want to say hello?<br>
                        <span>I'd love to hear from you.</span>
                    </p>

                    <div class="info-list">

                        <div class="info-item">
                            <span class="info-label">Name</span>
                            <span class="info-value">Monjhie Dulay</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Email</span>
                            <span class="info-value">
                                <a href="mailto:itsmonjhiedulay@gmail.com">itsmonjhiedulay@gmail.com</a>
                            </span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Mobile Number</span>
                            <span class="info-value">+63 956 239 4657</span>
                        </div>

                        <div class="info-item">
                            <span class="info-label">Available for</span>
                            <span class="info-value">Freelance / Full-time</span>
                        </div>

                        <div class="address-block">
                            <p class="address-label">Address</p>
                            <p class="address-value">
                                Blk. 17 Lot. 9, Blessedville Subdivision<br>
                                Sampaloc II, Dasmari&ntilde;as City<br>
                                Cavite, 4114
                            </p>
                        </div>

                    </div>

                </div><!-- end .contact-info -->

                <!-- Right: map -->
                <div class="map-wrap">
                    <p class="map-label">Location</p>
                    <div class="map-frame">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d966.7067277987369!2d120.97109984117989!3d14.263314543677074!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sph!4v1780148191204!5m2!1sen!2sph"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Monjhie Dulay Location"
                        ></iframe>
                    </div>
                    <p class="map-caption">Dasmari&ntilde;as City, Cavite, Philippines</p>
                </div>

            </div><!-- end .contact-grid -->

        </div><!-- end .contact-page -->
    </div><!-- end .page-wrapper -->


    <script>
        /* ── PAGE FADE-OUT ON NAVIGATION ── */
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('mailto') || href.startsWith('tel')) return;
            if (link.target === '_blank') return;

            link.addEventListener('click', function (e) {
                const destination = this.href;
                if (destination === window.location.href) return;
                e.preventDefault();
                document.body.classList.add('fade-out');
                setTimeout(() => { window.location.href = destination; }, 350);
            });
        });

        /* ── FIX BACK BUTTON CACHE ── */
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) document.body.classList.remove('fade-out');
        });
    </script>

</body>
</html>