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
            --black:   #1e1b4b;
            --white:   #ffffff;
            --cream:   #f5f3ff;
            --muted:   #7c7799;
            --border:  #e0d9ff;
            --grad:    linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        }

        html, body {
            min-height: 100%;
        }

        body {
            background: linear-gradient(135deg, #f5f3ff 0%, #eef2ff 45%, #fdf4ff 100%);
            background-attachment: fixed;
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
            max-width: 1200px;
            margin: 0 auto;
        }

        /* ══════════════════════════════════════
           CARDS ROW — sits both cards side by side
        ══════════════════════════════════════ */
        .cards-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            align-items: start;
            gap: 32px;
        }

        @media (max-width: 860px) {
            .cards-row {
                grid-template-columns: 1fr;
            }
        }

        /* ══════════════════════════════════════
           PAGE LABEL + TITLE + DIVIDER
        ══════════════════════════════════════ */
        .page-label {
            font-family: 'Syne', sans-serif;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 0.25em;
            text-transform: uppercase;
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
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
            background: var(--grad);
            border-radius: 2px;
            margin: 28px 0 56px;
            opacity: 0;
            animation: fadeUp 0.5s 0.25s ease forwards;
        }

        /* ══════════════════════════════════════
           SHARED CARD STYLE (used by both cards)
        ══════════════════════════════════════ */
        .card {
            background-color: #ffffff;
            border: 1px solid var(--border);
            border-radius: 16px;
            padding: 48px;
            box-shadow: 0 20px 50px rgba(139, 92, 246, 0.12);
        }

        @media (max-width: 640px) {
            .card { padding: 32px 24px; }
        }

        /* ══════════════════════════════════════
           CARD #1 — CONTACT INFO
        ══════════════════════════════════════ */
        .contact-info {
            opacity: 0;
            animation: fadeUp 0.7s 0.3s ease forwards;
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

        .info-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
            transition: padding-left 0.3s ease;
        }

        .info-item:first-child {
            border-top: 1px solid var(--border);
        }

        .info-item:hover {
            padding-left: 8px;
        }

        .info-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 700;
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
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
        }

        .info-value a:hover {
            color: #ec4899;
        }

        .address-block {
            padding: 20px 0;
            border-bottom: 1px solid var(--border);
            transition: padding-left 0.3s ease;
        }

        .address-block:hover {
            padding-left: 8px;
        }

        .address-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            margin-bottom: 6px;
        }

        .address-value {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            font-weight: 400;
            color: #55506e;
            line-height: 1.7;
        }

        /* SOCIAL LINKS */
        .social-block {
            padding: 24px 0 0;
        }

        .social-label {
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .social-row {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .social-icon {
            position: relative;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 46px;
            height: 46px;
            border-radius: 50%;
            border: 1px solid var(--border);
            background-color: #ffffff;
            color: #6d28d9;
            text-decoration: none;
            transition: border-color 0.35s ease, color 0.35s ease, transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.35s ease, background 0.35s ease;
        }

        .social-icon svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
            position: relative;
            z-index: 1;
        }

        .social-icon::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .social-icon.sweep::before {
            animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards;
        }

        @keyframes sweepShine {
            0%   { left: -120%; opacity: 0; }
            8%   { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { left: 160%; opacity: 0; }
        }

        .social-icon:hover {
            border-color: transparent;
            color: #ffffff;
            background: var(--grad);
            transform: translateY(-3px);
            box-shadow: 0 10px 24px rgba(139, 92, 246, 0.3), 0 2px 6px rgba(139, 92, 246, 0.15);
        }

        /* ══════════════════════════════════════
           CARD #2 — CONTACT FORM
        ══════════════════════════════════════ */
        .contact-form-card {
            opacity: 0;
            animation: fadeUp 0.7s 0.4s ease forwards;
        }

        .form-title {
            font-family: 'Syne', sans-serif;
            font-size: clamp(1.1rem, 1.8vw, 1.35rem);
            font-weight: 600;
            color: var(--black);
            margin-bottom: 8px;
        }

        .form-subtitle {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--muted);
            margin-bottom: 32px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-label {
            display: block;
            font-size: 0.65rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: var(--muted);
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            margin-bottom: 8px;
        }

        .form-input,
        .form-textarea {
            width: 100%;
            padding: 13px 14px;
            border: 1px solid var(--border);
            border-radius: 10px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.92rem;
            color: var(--black);
            background: var(--cream);
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #a855f7;
            box-shadow: 0 0 0 3px rgba(168, 85, 247, 0.15);
        }

        .form-textarea {
            resize: vertical;
            min-height: 130px;
            font-family: 'DM Sans', sans-serif;
        }

        .form-submit {
            appearance: none;
            border: none;
            border-radius: 10px;
            padding: 14px 32px;
            font-family: 'Syne', sans-serif;
            font-weight: 700;
            font-size: 0.85rem;
            letter-spacing: 0.02em;
            color: #ffffff;
            background: var(--grad);
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .form-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 24px rgba(139, 92, 246, 0.3);
        }

        .form-submit:disabled {
            opacity: 0.6;
            cursor: not-allowed;
            transform: none;
        }

        .form-status {
            margin-top: 18px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 500;
            display: none;
        }

        .form-status.success {
            color: #16a34a;
            display: block;
        }

        .form-status.error {
            color: #dc2626;
            display: block;
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
                 CARDS ROW — info card + form card, side by side
            ══════════════════════════════════════ -->
            <div class="cards-row">

            <!-- ══════════════════════════════════════
                 CARD #1 — CONTACT INFO
            ══════════════════════════════════════ -->
            <div class="contact-info card">

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

                    <!-- SOCIAL LINKS -->
                    <div class="social-block">
                        <p class="social-label">Follow / Connect</p>
                        <div class="social-row">

                            <a href="https://www.facebook.com/monjhie.dulay.35" target="_blank" rel="noopener" class="social-icon" aria-label="Facebook">
                                <svg viewBox="0 0 24 24"><path d="M22 12.06C22 6.5 17.52 2 12 2S2 6.5 2 12.06c0 5 3.66 9.15 8.44 9.94v-7.03H7.9v-2.91h2.54V9.85c0-2.51 1.49-3.9 3.77-3.9 1.09 0 2.24.2 2.24.2v2.46h-1.26c-1.24 0-1.63.77-1.63 1.56v1.88h2.78l-.44 2.91h-2.34V22c4.78-.79 8.44-4.94 8.44-9.94z"/></svg>
                            </a>

                            <a href="https://www.instagram.com/m.eekoo/#" target="_blank" rel="noopener" class="social-icon" aria-label="Instagram">
                                <svg viewBox="0 0 24 24"><path d="M12 2c2.72 0 3.06.01 4.12.06 1.06.05 1.79.22 2.43.47.66.26 1.22.6 1.77 1.16.56.55.9 1.11 1.16 1.77.25.64.42 1.37.47 2.43.05 1.06.06 1.4.06 4.12s-.01 3.06-.06 4.12c-.05 1.06-.22 1.79-.47 2.43a4.92 4.92 0 0 1-1.16 1.77 4.92 4.92 0 0 1-1.77 1.16c-.64.25-1.37.42-2.43.47-1.06.05-1.4.06-4.12.06s-3.06-.01-4.12-.06c-1.06-.05-1.79-.22-2.43-.47a4.92 4.92 0 0 1-1.77-1.16 4.92 4.92 0 0 1-1.16-1.77c-.25-.64-.42-1.37-.47-2.43C2.01 15.06 2 14.72 2 12s.01-3.06.06-4.12c.05-1.06.22-1.79.47-2.43.26-.66.6-1.22 1.16-1.77A4.92 4.92 0 0 1 5.46.53c.64-.25 1.37-.42 2.43-.47C8.94.01 9.28 0 12 0zm0 5a5 5 0 1 0 0 10 5 5 0 0 0 0-10zm0 8.2a3.2 3.2 0 1 1 0-6.4 3.2 3.2 0 0 1 0 6.4zM17.5 3.9a1.2 1.2 0 1 0 0 2.4 1.2 1.2 0 0 0 0-2.4z"/></svg>
                            </a>

                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=itsmonjhiedulay@gmail.com" target="_blank" rel="noopener" class="social-icon" aria-label="Gmail">
                                 <svg viewBox="0 0 24 24"><path d="M12 12.713l-11.985-9.713h23.97l-11.985 9.713zm0 2.574l-12-9.729v15.442h24v-15.442l-12 9.729z"/></svg>
                            </a>

                        </div>
                    </div>

                </div>

            </div><!-- end card #1 -->

            <!-- ══════════════════════════════════════
                 CARD #2 — CONTACT / SUBMIT FORM
            ══════════════════════════════════════ -->
            <div class="contact-form-card card">

                <p class="form-title">Send a message</p>
                <p class="form-subtitle">Fill this out and it'll land straight in my inbox.</p>

                <!--
                    ⚠️ REPLACE THE URL BELOW ⚠️
                    1. Go to https://formspree.io and sign up (free)
                    2. Create a new form, connect it to itsmonjhiedulay@gmail.com
                    3. Copy the endpoint they give you (looks like https://formspree.io/f/xxxxxxxx)
                    4. Paste it in place of "https://formspree.io/f/YOUR_FORM_ID" below
                -->
                <form id="contactForm" action="https://formspree.io/f/YOUR_FORM_ID" method="POST">

                    <div class="form-group">
                        <label class="form-label" for="name">Your Name</label>
                        <input class="form-input" type="text" id="name" name="name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="email">Your Email</label>
                        <input class="form-input" type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">Message</label>
                        <textarea class="form-textarea" id="message" name="message" required></textarea>
                    </div>

                    <button class="form-submit" type="submit" id="submitBtn">Send Message</button>

                    <p class="form-status" id="formStatus"></p>
                </form>

            </div><!-- end card #2 -->

            </div><!-- end .cards-row -->

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

        /* ── SOCIAL ICON SWEEP SHINE ── */
        document.querySelectorAll('.social-icon').forEach(icon => {
            icon.addEventListener('mouseenter', () => {
                icon.classList.remove('sweep');
                void icon.offsetWidth;
                icon.classList.add('sweep');
            });
        });

        /* ── CONTACT FORM SUBMISSION (via Formspree, no page reload) ── */
        const contactForm = document.getElementById('contactForm');
        const submitBtn = document.getElementById('submitBtn');
        const formStatus = document.getElementById('formStatus');

        contactForm.addEventListener('submit', async function (e) {
            e.preventDefault();

            submitBtn.disabled = true;
            submitBtn.textContent = 'Sending...';
            formStatus.className = 'form-status';
            formStatus.textContent = '';

            try {
                const response = await fetch(contactForm.action, {
                    method: 'POST',
                    body: new FormData(contactForm),
                    headers: { 'Accept': 'application/json' }
                });

                if (response.ok) {
                    formStatus.textContent = "Thanks! Your message has been sent — I'll get back to you soon.";
                    formStatus.className = 'form-status success';
                    contactForm.reset();
                } else {
                    formStatus.textContent = 'Something went wrong. Please try again or email me directly.';
                    formStatus.className = 'form-status error';
                }
            } catch (err) {
                formStatus.textContent = 'Network error. Please check your connection and try again.';
                formStatus.className = 'form-status error';
            } finally {
                submitBtn.disabled = false;
                submitBtn.textContent = 'Send Message';
            }
        });
    </script>

</body>
</html>