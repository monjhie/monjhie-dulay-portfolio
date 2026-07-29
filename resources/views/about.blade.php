<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About | Monjhie Dulay</title>
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

        /* ══════════════════════════════════════
           SHARED KEYFRAMES
        ══════════════════════════════════════ */
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        /* ══════════════════════════════════════
           PAGE LAYOUT
        ══════════════════════════════════════ */
        .about-page {
            padding: 120px 6vw 100px;
            max-width: 1300px;
            margin: 0 auto;
            background: transparent;
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
           SECTION 1 — WHO I AM (bio + photo)
        ══════════════════════════════════════ */
        .about-section {
            display: grid;
            grid-template-columns: 1fr 1.4fr;
            gap: 80px;
            align-items: start;
            margin-bottom: 110px;
            padding-bottom: 60px;
            border-bottom: 1px solid var(--border);
            opacity: 0;
            animation: fadeUp 0.7s 0.3s ease forwards;
        }

        @media (max-width: 768px) {
            .about-section { grid-template-columns: 1fr; gap: 48px; }
        }

        .about-photo-wrap {
            position: static;
            /* Give breathing room so the decoration overhanging the top-left
               isn't clipped by the parent. Padding offset by negative margin
               keeps the layout from shifting. */
            padding-top: 50px;
            padding-left: 50px;
            margin-top: -50px;
            margin-left: -50px;
        }

        @media (max-width: 768px) {
            .about-photo-wrap {
                padding-top: 44px;
                padding-left: 44px;
                margin-top: -44px;
                margin-left: -44px;
            }
        }

        @media (max-width: 480px) {
            .about-photo-wrap {
                padding-top: 36px;
                padding-left: 36px;
                margin-top: -36px;
                margin-left: -36px;
            }
        }

        /* ══════════════════════════════════════
           PHOTO FRAME WITH BAND-AID DECORATION
           (now interactive: 3D tilt + zoom on hover)
        ══════════════════════════════════════ */
        .photo-frame {
            position: relative;
            display: inline-block;
            width: 100%;
            perspective: 1000px;
        }

        .photo-placeholder {
            width: 100%;
            aspect-ratio: 3 / 4;
            background: var(--cream);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            border: 1px solid var(--border);
            box-shadow: 0 20px 50px rgba(139, 92, 246, 0.15);
            cursor: pointer;
            transform-style: preserve-3d;
            transition: transform 0.25s ease, box-shadow 0.4s ease;
            will-change: transform;
        }

        .photo-placeholder:hover,
        .photo-placeholder.is-tilting {
            box-shadow: 0 30px 65px rgba(139, 92, 246, 0.3);
        }

        .photo-placeholder::before {
            content: '';
            position: absolute;
            inset: 0;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 12px,
                rgba(139, 92, 246, 0.04) 12px,
                rgba(139, 92, 246, 0.04) 13px
            );
            z-index: 1;
            pointer-events: none;
        }

        /* soft light-sheen that follows the cursor */
        .photo-placeholder::after {
            content: '';
            position: absolute;
            inset: 0;
            background: radial-gradient(
                circle 220px at var(--mx, 50%) var(--my, 50%),
                rgba(255, 255, 255, 0.35),
                transparent 60%
            );
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
            pointer-events: none;
        }

        .photo-placeholder:hover::after {
            opacity: 1;
        }

        .photo-placeholder span {
            font-family: 'Syne', sans-serif;
            font-size: 0.65rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
            z-index: 1;
        }

        .about-photo {
            width: 100%;
            height: 100%;
            aspect-ratio: 3 / 4;
            object-fit: cover;
            display: block;
            background: var(--cream);
            border-radius: 12px;
            transition: transform 0.5s cubic-bezier(0.22, 1, 0.36, 1), filter 0.5s ease;
            filter: saturate(0.94);
        }

        .photo-placeholder:hover .about-photo {
            transform: scale(1.07);
            filter: saturate(1.08);
        }

        /* ── Band-aid decoration (larger + edge-hugging on all devices) ── */
        .bandaid-decoration {
            position: absolute;
            top: -50px;
            left: -50px;
            width: clamp(150px, 38%, 240px);
            height: auto;
            z-index: 10;
            pointer-events: none;
            filter: drop-shadow(1px 2px 4px rgba(139, 92, 246, 0.25));
            transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .photo-frame:hover .bandaid-decoration {
            transform: rotate(-6deg) translateY(-4px);
        }

        /* iPad mini (768px) — single column, photo fills wider area,
           pull the decoration back to the edge of the photo frame */
        @media (max-width: 768px) {
            .bandaid-decoration {
                top: -44px;
                left: -44px;
                width: clamp(150px, 28vw, 210px);
            }
        }

        /* Small phones — keep it from clipping too far off-screen */
        @media (max-width: 480px) {
            .bandaid-decoration {
                top: -36px;
                left: -36px;
                width: clamp(120px, 32vw, 160px);
            }
        }

        .photo-caption {
            margin-top: 14px;
            font-size: 0.72rem;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--muted);
            font-weight: 600;
        }

        /* ── Bio column ── */
        .bio-label {
            font-family: 'Syne', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            background: var(--grad);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 24px;
        }

        .bio-intro {
            font-family: 'Syne', sans-serif;
            font-size: clamp(1.3rem, 2.2vw, 1.65rem);
            font-weight: 600;
            line-height: 1.4;
            color: var(--black);
            margin-bottom: 28px;
        }

        .bio-body {
            font-size: 0.95rem;
            font-weight: 400;
            line-height: 1.85;
            color: #55506e;
            margin-bottom: 20px;
        }

        .bio-body:last-of-type { margin-bottom: 44px; }

        .bio-details {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px 32px;
            padding: 32px 0;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
            margin-bottom: 40px;
        }

        .detail-label {
            font-size: 0.65rem;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: var(--muted);
            margin-bottom: 4px;
            font-weight: 600;
        }

        .detail-value {
            font-family: 'Syne', sans-serif;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--black);
        }

        /* CTA buttons */
        .cta-row {
            display: flex;
            gap: 16px;
            flex-wrap: wrap;
        }

        .btn {
            font-family: 'Syne', sans-serif;
            font-size: 0.72rem;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            text-decoration: none;
            padding: 14px 28px;
            border-radius: 6px;
            display: inline-block;
            transition: background-position 0.5s ease, transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, color 0.3s ease, border-color 0.3s ease;
            cursor: pointer;
        }

        .btn-primary {
            background: var(--grad);
            background-size: 200% auto;
            color: var(--white);
            border: 1.5px solid transparent;
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
        }

        .btn-primary:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(139, 92, 246, 0.4);
        }

        .btn-outline {
            background: transparent;
            color: #6d28d9;
            border: 1.5px solid #8b5cf6;
        }

        .btn-outline:hover {
            background: var(--grad);
            border-color: transparent;
            color: var(--white);
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(139, 92, 246, 0.3);
        }

        /* ══════════════════════════════════════
           SECTION 2 — SKILLS & EXPERTISE
        ══════════════════════════════════════ */

        /* Gradient panel wrapping the whole skills area */
        .skills-panel {
            background: linear-gradient(135deg, #0f0c29 0%, #1e1240 45%, #2d1b4e 100%);
            border-radius: 20px;
            padding: 64px 5vw;
            margin: 0 -5vw;
        }

        @media (max-width: 768px) {
            .skills-panel {
                padding: 48px 6vw;
                border-radius: 14px;
            }
        }

        .skills-heading {
            opacity: 0;
            animation: fadeUp 0.5s 0.45s ease forwards;
            margin-bottom: 48px;
        }

        .skills-heading .page-label {
            animation: none;
            opacity: 1;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #a5b4fc, #f0abfc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .skills-heading h2 {
            font-family: 'Syne', sans-serif;
            font-size: clamp(1.8rem, 3.5vw, 2.8rem);
            font-weight: 800;
            letter-spacing: -0.02em;
            line-height: 1.1;
            color: var(--white);
        }

        .skills-heading .divider {
            animation: none;
            opacity: 1;
            margin: 20px 0 0;
            background: linear-gradient(90deg, #818cf8, #f472b6);
        }

        .skills-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px 100px;
            opacity: 0;
            animation: fadeUp 0.7s 0.5s ease forwards;
        }

        @media (max-width: 768px) {
            .skills-section { grid-template-columns: 1fr; gap: 60px; }
        }

        .skill-group-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            background: linear-gradient(90deg, #a5b4fc, #f0abfc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 28px;
            padding-bottom: 10px;
            border-bottom: 1px solid rgba(167, 139, 250, 0.25);
        }

        .skill-item {
            margin-bottom: 22px;
        }

        .skill-meta {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 8px;
        }

        .skill-name {
            font-family: 'DM Sans', sans-serif;
            font-size: 0.88rem;
            font-weight: 500;
            color: var(--white);
            letter-spacing: 0.01em;
        }

        .skill-pct {
            font-family: 'Syne', sans-serif;
            font-size: 0.75rem;
            font-weight: 700;
            color: #c4bfe0;
            letter-spacing: 0.05em;
            min-width: 36px;
            text-align: right;
            transition: all 0.3s;
        }

        .skill-track {
            height: 3px;
            background: rgba(167, 139, 250, 0.18);
            border-radius: 2px;
            overflow: hidden;
        }

        .skill-bar {
            height: 100%;
            background: linear-gradient(90deg, #818cf8, #a855f7, #f472b6);
            border-radius: 2px;
            width: 0%;
            transition: width 1.1s cubic-bezier(0.22, 1, 0.36, 1);
        }
    </style>
</head>
<body>

    {{-- NAVBAR COMPONENT --}}
    <x-navbar />

    <div class="page-wrapper">
        <div class="about-page">

            <!-- ── Page label & main heading ── -->
            <p class="page-label">Portfolio — About</p>
            <h1 class="section-title">Who I Am</h1>
            <div class="divider"></div>

            <!-- ══════════════════════════════════════
                 SECTION 1 — WHO I AM
            ══════════════════════════════════════ -->
            <div class="about-section">

                <!-- Left: photo -->
                <div class="about-photo-wrap">

                    <!-- Photo frame with band-aid decoration -->
                    <div class="photo-frame" id="photoFrame">

                        <!-- Band-aid image overlaid on upper-left corner -->
                        <img
                            src="{{ asset('images/decoration1_profile_photo.png') }}"
                            alt=""
                            class="bandaid-decoration"
                            aria-hidden="true"
                        >

                        <div class="photo-placeholder" id="photoTilt">
                            <img src="{{ asset('images/about_profile_photo.jpg') }}" alt="Monjhie Dulay" class="about-photo">
                        </div>

                    </div><!-- end .photo-frame -->

                    <p class="photo-caption">Monjhie Dulay — Developer</p>
                </div>

                <!-- Right: bio content -->
                <div class="about-bio">

                    <p class="bio-label">Who I Am</p>

                    <p class="bio-intro">
                        I build things I'm proud of clean code, thoughtful design, and work that actually holds up.
                    </p>

                    <p class="bio-body">
                        I'm Monjhie Dulay, a web developer. I like figuring out how things work, new tools, new frameworks, whatever a project calls for, because that's what lets me write code I can actually stand behind, not just code that runs.
                    </p>

                    <p class="bio-body">
                        I care about getting the details right: solid architecture, clean design, code that's tested before it ships. Doesn't matter if it's a client project or something I'm building on my own time, I hold it to the same standard.
                    </p>

                    <p class="bio-body">
                        I also work with AI tools like <strong style="color:#6d28d9;">Claude</strong>, <strong style="color:#6d28d9;">ChatGPT</strong>, and <strong style="color:#6d28d9;">Cursor</strong> as part of my modern development workflow, using them to speed up debugging, explore solutions faster, and reduce repetitive work, while I stay in control of the architecture, logic, and final code quality. It's a practical skill set that reflects how development teams build software today.
                    </p>

                    <!-- Quick-info grid -->
                    <div class="bio-details">
                        <div class="detail-item">
                            <p class="detail-label">Focus</p>
                            <p class="detail-value">Full-Stack Web</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Available for</p>
                            <p class="detail-value">Freelance / Full-time</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Languages</p>
                            <p class="detail-value">Filipino, English</p>
                        </div>
                        <div class="detail-item">
                            <p class="detail-label">Approach</p>
                            <p class="detail-value">Design-First</p>
                        </div>
                    </div>

                    <!-- Call-to-action buttons -->
                    <div class="cta-row">
                        <a href="/contact" class="btn btn-primary">Get in Touch</a>
                        <a href="{{ asset('resume/Resume.pdf') }}" class="btn btn-outline" target="_blank" download="Monjhie_Dulay_Resume.pdf">Download CV</a>
                    </div>

                </div><!-- end .about-bio -->

            </div><!-- end .about-section -->


            <!-- ══════════════════════════════════════
                 SECTION 2 — SKILLS & EXPERTISE
            ══════════════════════════════════════ -->
            <div class="skills-panel">

                <div class="skills-heading">
                    <p class="page-label">My Toolkit</p>
                    <h2>Skills &amp; Expertise</h2>
                    <div class="divider"></div>
                </div>

                <div class="skills-section" id="skills-section">

                    <!-- ── Group 1: Programming Languages ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">Programming Languages</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Python</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Java</span>
                                <span class="skill-pct" data-target="80">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="80"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">C++</span>
                                <span class="skill-pct" data-target="70">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="70"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">JavaScript</span>
                                <span class="skill-pct" data-target="88">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="88"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">PHP</span>
                                <span class="skill-pct" data-target="88">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="88"></div>
                            </div>
                        </div>
                    </div><!-- end Group 1 -->

                    <!-- ── Group 2: Frontend Development ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">Frontend Development</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">HTML &amp; CSS</span>
                                <span class="skill-pct" data-target="95">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="95"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Bootstrap</span>
                                <span class="skill-pct" data-target="88">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="88"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">jQuery</span>
                                <span class="skill-pct" data-target="80">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="80"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Vue.js</span>
                                <span class="skill-pct" data-target="78">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="78"></div>
                            </div>
                        </div>
                    </div><!-- end Group 2 -->

                    <!-- ── Group 3: Frameworks, Backend &amp; Cloud ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">Frameworks, Backend &amp; Cloud</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Laravel</span>
                                <span class="skill-pct" data-target="88">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="88"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Flutter</span>
                                <span class="skill-pct" data-target="75">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="75"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">MySQL</span>
                                <span class="skill-pct" data-target="82">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="82"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Firebase / Supabase</span>
                                <span class="skill-pct" data-target="78">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="78"></div>
                            </div>
                        </div>
                    </div><!-- end Group 3 -->

                    <!-- ── Group 4: Tools & Version Control ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">Tools &amp; Version Control</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Git, GitHub &amp; Bitbucket</span>
                                <span class="skill-pct" data-target="90">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="90"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Visual Studio Code</span>
                                <span class="skill-pct" data-target="92">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="92"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Android Studio</span>
                                <span class="skill-pct" data-target="80">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="80"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">XAMPP</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>
                    </div><!-- end Group 4 -->

                    <!-- ── Group 5: QA & Game Development ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">QA &amp; Game Development</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Godot Engine (GDScript)</span>
                                <span class="skill-pct" data-target="70">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="70"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Manual Testing</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Test Case Creation</span>
                                <span class="skill-pct" data-target="82">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="82"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Bug Reporting</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">UI/UX Testing</span>
                                <span class="skill-pct" data-target="80">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="80"></div>
                            </div>
                        </div>
                    </div><!-- end Group 5 -->

                    <!-- ── Group 6: Support & Soft Skills ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">Support &amp; Soft Skills</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Hardware / Software Support</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Troubleshooting &amp; Networking</span>
                                <span class="skill-pct" data-target="82">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="82"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Problem-Solving</span>
                                <span class="skill-pct" data-target="93">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="93"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Teamwork &amp; Communication</span>
                                <span class="skill-pct" data-target="90">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="90"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Time Management</span>
                                <span class="skill-pct" data-target="87">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="87"></div>
                            </div>
                        </div>
                    </div><!-- end Group 6 -->

                    <!-- ── Group 7: AI-Augmented Development ── -->
                    <div class="skill-group">
                        <p class="skill-group-title">AI-Augmented Development</p>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Claude</span>
                                <span class="skill-pct" data-target="90">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="90"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">ChatGPT</span>
                                <span class="skill-pct" data-target="85">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="85"></div>
                            </div>
                        </div>

                        <div class="skill-item">
                            <div class="skill-meta">
                                <span class="skill-name">Cursor</span>
                                <span class="skill-pct" data-target="80">0%</span>
                            </div>
                            <div class="skill-track">
                                <div class="skill-bar" data-width="80"></div>
                            </div>
                        </div>
                    </div><!-- end Group 7 -->

                </div><!-- end .skills-section -->

            </div><!-- end .skills-panel -->

        </div><!-- end .about-page -->
    </div><!-- end .page-wrapper -->


    <script>
        /* ══════════════════════════════════════
           INTERACTIVE PHOTO — 3D TILT + CURSOR SHEEN
        ══════════════════════════════════════ */
        const photoTilt = document.getElementById('photoTilt');

        if (photoTilt) {
            const MAX_TILT = 10; // degrees

            photoTilt.addEventListener('mousemove', (e) => {
                const rect = photoTilt.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;

                const percentX = x / rect.width;
                const percentY = y / rect.height;

                const tiltX = (percentY - 0.5) * -MAX_TILT * 2;
                const tiltY = (percentX - 0.5) * MAX_TILT * 2;

                photoTilt.style.transform =
                    `rotateX(${tiltX}deg) rotateY(${tiltY}deg) scale3d(1.02, 1.02, 1.02)`;

                photoTilt.style.setProperty('--mx', `${percentX * 100}%`);
                photoTilt.style.setProperty('--my', `${percentY * 100}%`);
            });

            photoTilt.addEventListener('mouseleave', () => {
                photoTilt.style.transform = 'rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });

            /* Touch support: tap gives a gentle pop instead of tilt */
            photoTilt.addEventListener('touchstart', () => {
                photoTilt.style.transform = 'scale3d(1.03, 1.03, 1.03)';
            }, { passive: true });

            photoTilt.addEventListener('touchend', () => {
                photoTilt.style.transform = 'rotateX(0deg) rotateY(0deg) scale3d(1, 1, 1)';
            });
        }


        /* ══════════════════════════════════════
           SKILL BAR ANIMATION
        ══════════════════════════════════════ */
        function animateCounter(el, target, duration) {
            let start = 0;
            const step = (timestamp) => {
                if (!start) start = timestamp;
                const progress = Math.min((timestamp - start) / duration, 1);
                const eased    = 1 - Math.pow(1 - progress, 3);
                el.textContent = Math.round(eased * target) + '%';
                if (progress < 1) requestAnimationFrame(step);
            };
            requestAnimationFrame(step);
        }

        const skillsObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (!entry.isIntersecting) return;

                const section = entry.target;
                const bars    = section.querySelectorAll('.skill-bar');
                const pcts    = section.querySelectorAll('.skill-pct');

                bars.forEach((bar, i) => {
                    const target = parseInt(bar.dataset.width, 10);
                    setTimeout(() => {
                        bar.style.width = target + '%';
                        animateCounter(pcts[i], target, 1100);
                    }, i * 80);
                });

                skillsObserver.unobserve(section);
            });
        }, { threshold: 0.15 });

        skillsObserver.observe(document.getElementById('skills-section'));


        /* ══════════════════════════════════════
           PAGE FADE-OUT ON NAVIGATION
        ══════════════════════════════════════ */
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

        /* ══════════════════════════════════════
           FIX BACK BUTTON CACHE
        ══════════════════════════════════════ */
        window.addEventListener('pageshow', function (e) {
            if (e.persisted) document.body.classList.remove('fade-out');
        });
    </script>

</body>
</html>