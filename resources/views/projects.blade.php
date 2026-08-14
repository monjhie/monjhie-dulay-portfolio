<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects | Monjhie Dulay</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f8f7ff;
            color: #1e1b4b;
            font-family: 'Segoe UI', sans-serif;
        }

        /* ── PAGE TRANSITION ── */
        .page-wrapper {
            animation: pageFadeIn 0.5s ease forwards;
        }

        @keyframes pageFadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        body.fade-out .page-wrapper {
            animation: pageFadeOut 0.35s ease forwards;
        }

        @keyframes pageFadeOut {
            from { opacity: 1; transform: translateY(0); }
            to   { opacity: 0; transform: translateY(-10px); }
        }

        @keyframes sweepShine {
            0%   { left: -120%; opacity: 0; }
            8%   { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { left: 160%; opacity: 0; }
        }

        /* ══════════════════════════════════════
           HEADER (soft gradient, matches hero)
        ══════════════════════════════════════ */
        .projects-header-section {
            padding: 9rem 8rem 3rem;
            background: linear-gradient(135deg, #f5f3ff 0%, #eef2ff 45%, #fdf4ff 100%);
            text-align: center;
        }

        .projects-eyebrow {
            font-size: 0.9rem;
            background: linear-gradient(90deg, #7c3aed, #db2777);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 800;
            letter-spacing: 5px;
            text-transform: uppercase;
        }

        .projects-header-section h1 {
            font-size: clamp(2.4rem, 4.5vw, 3.8rem);
            font-weight: 900;
            line-height: 1.1;
            margin-top: 0.8rem;
            color: #1e1b4b;
        }

        .projects-header-section h1 .highlight {
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        .projects-header-section p {
            margin: 1.2rem auto 0;
            max-width: 560px;
            font-size: 1rem;
            font-weight: 700;
            color: #55506e;
            line-height: 1.8;
        }

        /* ── FILTER TOGGLE (single shared border, segmented-control style) ── */
        .filter-row {
            position: relative;
            display: inline-flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 0.3rem;
            margin: 2.2rem auto 0;
            padding: 0.35rem;
            border: 2px solid #ddd6fe;
            border-radius: 50px;
            background-color: #ffffff;
        }

        /*
           Only .filter-row carries the border now — the buttons themselves
           are borderless and sit inside it. The "pill" that marks which
           one is active is a single absolutely-positioned element that
           slides/resizes to the selected button and crossfades its
           gradient in via opacity, so switching feels like one smooth
           motion instead of separate buttons popping on/off.

           top/left are 0 here (not the row's padding) because the pill's
           position is driven entirely by JS via `transform: translate(x, y)`
           using each button's offsetLeft/offsetTop — that's what lets it
           correctly follow a button onto a second line when the row wraps
           on narrow screens, instead of only being able to slide sideways.
        */
        .filter-pill {
            position: absolute;
            top: 0;
            left: 0;
            width: 0;
            height: 0;
            border-radius: 50px;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            box-shadow: 0 10px 26px rgba(139, 92, 246, 0.35);
            opacity: 0;
            transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        width 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        height 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94),
                        opacity 0.3s ease;
            pointer-events: none;
            will-change: transform;
        }

        .filter-pill.ready { opacity: 1; }

        .filter-btn {
            position: relative;
            isolation: isolate;
            z-index: 1;
            overflow: hidden;
            padding: 0.7rem 1.7rem;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 800;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            border: none;
            background-color: transparent;
            color: #6d28d9;
            cursor: pointer;
            font-family: inherit;
            transition: color 0.35s ease;
        }

        .filter-btn::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            z-index: 1;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .filter-btn.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        .filter-btn:not(.active):hover {
            color: #a855f7;
        }

        .filter-btn.active {
            color: #ffffff;
        }

        /* ══════════════════════════════════════
           PROJECT SECTIONS (alternating, no cards)
        ══════════════════════════════════════ */
        .projects-list {
            display: flex;
            flex-direction: column;
        }

        .project-section {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 5rem;
            padding: 6rem 8rem;
        }

        /* Only force near-full-height sections on large desktop screens.
           Tablets/laptops size to their content instead, which avoids
           the big empty gap that showed up on iPad Pro and similar
           mid-size screens when min-height: 90vh applied everywhere. */
        @media (min-width: 1401px) {
            .project-section {
                min-height: 90vh;
            }
        }

        /* alternate background: soft lavender / soft sky, like hero + flutter section */
        .project-section:nth-child(odd) {
            background: linear-gradient(135deg, #f5f3ff 0%, #eef2ff 45%, #fdf4ff 100%);
        }

        .project-section:nth-child(even) {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 45%, #ecfeff 100%);
        }

        .project-section:nth-child(even) .project-media {
            order: 2;
        }

        .project-section.is-hidden {
            display: none;
        }

        .project-media {
            flex: 1;
            min-width: 0;
            position: relative;
        }

        .project-media-frame {
            position: relative;
            border-radius: 18px;
            overflow: hidden;
            border: 1px solid #ddd6fe;
            box-shadow: 0 20px 50px rgba(139, 92, 246, 0.18);
        }

        .project-media-frame img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
            aspect-ratio: 16 / 10;
            transition: transform 0.5s ease;
        }

        .project-media-frame:hover img {
            transform: scale(1.04);
        }

        .project-media-placeholder {
            width: 100%;
            aspect-ratio: 16 / 10;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            color: #aaaaaa;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        .project-content {
            flex: 1;
            min-width: 0;
            display: flex;
            flex-direction: column;
        }

        .project-label {
            font-size: 0.8rem;
            font-weight: 800;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            position: relative;
            padding-left: 1.2rem;
        }

        .project-section:nth-child(odd) .project-label {
            background: linear-gradient(90deg, #7c3aed, #db2777);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .project-section:nth-child(odd) .project-label::before {
            background: linear-gradient(90deg, #818cf8, #f472b6);
        }

        .project-section:nth-child(even) .project-label {
            background: linear-gradient(90deg, #0284c7, #0891b2);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        .project-section:nth-child(even) .project-label::before {
            background: linear-gradient(90deg, #0ea5e9, #06b6d4);
        }

        .project-label::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 6px; height: 6px;
            border-radius: 50%;
        }

        /* ── PROJECT YEAR BADGE ── */
        .project-label-row {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-bottom: 1rem;
        }

        .project-label-row .project-label {
            margin-bottom: 0;
        }

        .project-year {
            font-size: 0.75rem;
            font-weight: 800;
            letter-spacing: 1px;
            padding: 0.25rem 0.7rem;
            border-radius: 50px;
            white-space: nowrap;
        }

        .project-section:nth-child(odd) .project-year {
            color: #6d28d9;
            background-color: rgba(139, 92, 246, 0.12);
            border: 1px solid rgba(167, 139, 250, 0.4);
        }

        .project-section:nth-child(even) .project-year {
            color: #0369a1;
            background-color: rgba(14, 165, 233, 0.12);
            border: 1px solid #bae6fd;
        }

        @media (max-width: 900px) {
            .project-label-row {
                justify-content: center;
            }
        }

        .project-title {
            font-size: clamp(1.8rem, 2.6vw, 2.8rem);
            font-weight: 900;
            color: #1e1b4b;
            line-height: 1.15;
            margin-bottom: 1.3rem;
        }

        /* ── ANIMATED MOVING DIVIDER (under title) ── */
        .project-divider {
            position: relative;
            width: 60px;
            height: 3px;
            border-radius: 2px;
            margin-bottom: 1.5rem;
            overflow: hidden;
        }

        .project-divider::after {
            content: '';
            position: absolute;
            top: 0;
            left: -40%;
            width: 40%;
            height: 100%;
            background: linear-gradient(90deg, transparent 0%, rgba(255,255,255,0.95) 50%, transparent 100%);
            animation: dividerMove 2.2s linear infinite;
        }

        @keyframes dividerMove {
            0%   { left: -40%; }
            100% { left: 140%; }
        }

        .project-section:nth-child(odd) .project-divider {
            background: linear-gradient(90deg, #818cf8, #f472b6);
        }
        .project-section:nth-child(even) .project-divider {
            background: linear-gradient(90deg, #0ea5e9, #06b6d4);
        }

        .project-desc {
            font-size: 1rem;
            font-weight: 700;
            color: #47597a;
            line-height: 1.9;
            border-left: 3px solid transparent;
            padding-left: 1.2rem;
            max-width: 520px;
        }

        .project-section:nth-child(odd) .project-desc {
            color: #55506e;
            border-image: linear-gradient(180deg, #6366f1, #ec4899) 1;
        }
        .project-section:nth-child(even) .project-desc {
            border-image: linear-gradient(180deg, #0ea5e9, #06b6d4) 1;
        }

        .project-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 1.8rem;
        }

        .project-tag {
            position: relative;
            overflow: hidden;
            padding: 0.4rem 1rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: default;
            transition: border-color 0.4s, color 0.4s, transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94), background 0.4s;
        }

        .project-section:nth-child(odd) .project-tag {
            border: 1px solid rgba(167, 139, 250, 0.35);
            color: #6d28d9;
        }
        .project-section:nth-child(odd) .project-tag:hover {
            border-color: transparent;
            color: #ffffff;
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            transform: translateY(-2px);
        }

        .project-section:nth-child(even) .project-tag {
            border: 1px solid #bae6fd;
            color: #0369a1;
        }
        .project-section:nth-child(even) .project-tag:hover {
            border-color: transparent;
            color: #ffffff;
            background: linear-gradient(90deg, #0ea5e9, #06b6d4);
            transform: translateY(-2px);
        }

        .project-tag::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .project-tag.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        .project-actions {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
            flex-wrap: wrap;
        }

        .project-btn {
            padding: 0.85rem 2rem;
            border-radius: 6px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-decoration: none;
            cursor: pointer;
            font-family: inherit;
            border: none;
            transition: background-position 0.5s ease, transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease, color 0.3s ease;
        }

        .project-section:nth-child(odd) .project-btn-primary {
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            background-size: 200% auto;
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(139, 92, 246, 0.35);
        }
        .project-section:nth-child(odd) .project-btn-primary:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(139, 92, 246, 0.45);
        }
        .project-section:nth-child(odd) .project-btn-outline {
            background: transparent;
            border: 2px solid #8b5cf6;
            color: #6d28d9;
        }
        .project-section:nth-child(odd) .project-btn-outline:hover {
            background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
            border-color: transparent;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(139, 92, 246, 0.3);
        }

        .project-section:nth-child(even) .project-btn-primary {
            background: linear-gradient(90deg, #0ea5e9, #06b6d4, #22d3ee);
            background-size: 200% auto;
            color: #ffffff;
            box-shadow: 0 8px 20px rgba(14, 165, 233, 0.3);
        }
        .project-section:nth-child(even) .project-btn-primary:hover {
            background-position: right center;
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(14, 165, 233, 0.4);
        }
        .project-section:nth-child(even) .project-btn-outline {
            background: transparent;
            border: 2px solid #0284c7;
            color: #0369a1;
        }
        .project-section:nth-child(even) .project-btn-outline:hover {
            background: linear-gradient(90deg, #0ea5e9, #06b6d4);
            border-color: transparent;
            color: #ffffff;
            transform: translateY(-2px);
            box-shadow: 0 10px 22px rgba(14, 165, 233, 0.3);
        }

        /* ── EMPTY STATE ── */
        .projects-empty {
            display: none;
            padding: 6rem 2rem;
            text-align: center;
            font-size: 1rem;
            font-weight: 700;
            color: #8b85a8;
        }

        .projects-empty.visible {
            display: block;
        }

        /* ── PREVIEW MODAL ── */
        .preview-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(30, 27, 75, 0.92);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .preview-modal.active {
            display: flex;
            opacity: 1;
        }

        .preview-modal-content {
            position: relative;
            width: 90%;
            max-width: 480px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .preview-image-wrap {
            width: 100%;
            max-height: 78vh;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            overflow: hidden;
            background-color: #1e1240;
        }

        .preview-image-wrap img {
            width: 100%;
            height: 100%;
            max-height: 78vh;
            object-fit: contain;
            display: block;
            user-select: none;
        }

        .preview-counter {
            margin-top: 1rem;
            color: #e0d9ff;
            font-size: 0.85rem;
            letter-spacing: 1px;
        }

        .preview-close {
            position: absolute;
            top: -3rem;
            right: 0;
            background: none;
            border: none;
            color: #ffffff;
            font-size: 2rem;
            line-height: 1;
            cursor: pointer;
            padding: 0.3rem 0.6rem;
        }

        .preview-nav {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(255, 255, 255, 0.1);
            border: 2px solid rgba(255, 255, 255, 0.6);
            color: #ffffff;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            font-size: 1.3rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background-color 0.3s;
        }

        .preview-nav:hover {
            background-color: rgba(255, 255, 255, 0.25);
        }

        .preview-prev { left: -60px; }
        .preview-next { right: -60px; }

        @media (max-width: 700px) {
            .preview-prev { left: 0.5rem; }
            .preview-next { right: 0.5rem; }
        }

        /* ── RESPONSIVE ── */
        @media (max-width: 1600px) {
            .projects-header-section { padding: 9rem 6rem 3rem; }
            .project-section { padding: 5rem 6rem; gap: 4rem; }
        }

        @media (max-width: 1100px) {
            .projects-header-section { padding: 8rem 3rem 3rem; }
            .project-section { padding: 4rem 3rem; gap: 3rem; }
        }

        @media (max-width: 900px) {
            .project-section {
                flex-direction: column;
                min-height: auto;
                padding: 4rem 2.5rem;
                gap: 2.5rem;
                text-align: center;
            }
            .project-section:nth-child(even) .project-media {
                order: 0;
            }
            .project-content { align-items: center; }
            .project-desc {
                border-left: none;
                border-image: none;
                border-top: 3px solid #a855f7;
                padding-left: 0;
                padding-top: 1rem;
                text-align: left;
            }
            .project-tags { justify-content: center; }
            .project-actions { justify-content: center; }
            .project-divider { margin-left: auto; margin-right: auto; }
            .project-label { padding-left: 1.5rem; }
        }

        @media (max-width: 640px) {
            .projects-header-section { padding: 7rem 1.5rem 2.5rem; }
            .project-section { padding: 3rem 1.5rem; }
            .filter-row { gap: 0.6rem; }
            .filter-btn { padding: 0.6rem 1.3rem; font-size: 0.75rem; }
        }

        @media (max-width: 420px) {
            .project-actions { flex-direction: column; width: 100%; }
            .project-btn { text-align: center; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR COMPONENT --}}
    <x-navbar />

    <!-- PAGE WRAPPER -->
    <div class="page-wrapper">

        <!-- ══════════ HEADER + FILTER ══════════ -->
        <section class="projects-header-section">
            <p class="projects-eyebrow">Portfolio</p>
            <h1>My <span class="highlight">Projects</span></h1>
            <p>A collection of games, websites, and applications I've built.</p>

            <div class="filter-row" id="filterRow">
                <span class="filter-pill" id="filterPill"></span>
                <button type="button" class="filter-btn active" data-filter="all">All</button>
                <button type="button" class="filter-btn" data-filter="website">Website</button>
                <button type="button" class="filter-btn" data-filter="application">Application</button>
                <button type="button" class="filter-btn" data-filter="game">Game</button>
            </div>
        </section>

        <!-- ══════════ PROJECT SECTIONS ══════════ -->
        <div class="projects-list" id="projectsList">

            <!-- PROJECT — Godot Game -->
            <section class="project-section" data-category="game">
                <div class="project-media">
                    <div class="project-media-frame">
                        <img src="{{ asset('images/project_game_1.png') }}" alt="Wizard Curse"
                             onerror="this.parentElement.innerHTML='<div class=\'project-media-placeholder\'>No Image</div>'">
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-label-row">
                        <p class="project-label">Game Development</p>
                        <span class="project-year">2026</span>
                    </div>
                    <h2 class="project-title">Wizard Curse</h2>
                    <div class="project-divider"></div>
                    <p class="project-desc">
                        A 2D pixel-art game where you fight against a wizard, built in Godot
                        using GDScript. It's still a work in progress, and I'm actively adding
                        more mechanics, enemies, and polish as I go.
                    </p>
                    <div class="project-tags">
                        <span class="project-tag">🎮 Godot</span>
                        <span class="project-tag">⚙️ GDScript</span>
                    </div>
                    <div class="project-actions">
                        <a href="{{ asset('games/project1/first-game.html') }}"
                           class="project-btn project-btn-primary"
                           target="_blank">Live Demo</a>
                        <a href="#" class="project-btn project-btn-outline" target="_blank">GitHub</a>
                    </div>
                </div>
            </section>

            <!-- PROJECT — Flutter App (Canteen Ordering App) -->
            <section class="project-section" data-category="application">
                <div class="project-media">
                    <div class="project-media-frame">
                        <img src="{{ asset('CanteenOrderingAppPreview/canteen-ordering-app-thumbnail.png') }}" alt="Canteen Ordering App"
                             onerror="this.parentElement.innerHTML='<div class=\'project-media-placeholder\'>No Image</div>'">
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-label-row">
                        <p class="project-label">Mobile Development</p>
                        <span class="project-year">2025 - 2026</span>
                    </div>
                    <h2 class="project-title">Canteen Ordering App</h2>
                    <div class="project-divider"></div>
                    <p class="project-desc">
                        A mobile ordering app built for Olivarez College Tagaytay using Flutter, with Firebase
                        powering the backend and authentication. I only used
                        Supabase for storing and serving images.
                    </p>
                    <div class="project-tags">
                        <span class="project-tag">💙 Flutter</span>
                        <span class="project-tag">📱 Mobile</span>
                    </div>
                    <div class="project-actions">
                        <button type="button" class="project-btn project-btn-primary" onclick="openPreview()">Preview</button>
                        <a href="#" class="project-btn project-btn-outline" target="_blank">GitHub</a>
                    </div>
                </div>
            </section>

            <!-- PROJECT — Meeko's Haven (CMS CRUD Website) -->
            <section class="project-section" data-category="website">
                <div class="project-media">
                    <div class="project-media-frame">
                        <img src="{{ asset('images/project_website_1.png') }}" alt="Meeko's Haven"
                             onerror="this.parentElement.innerHTML='<div class=\'project-media-placeholder\'>No Image</div>'">
                    </div>
                </div>
                <div class="project-content">
                    <div class="project-label-row">
                        <p class="project-label">Web Development</p>
                        <span class="project-year">2025</span>
                    </div>
                    <h2 class="project-title">Meeko's Haven</h2>
                    <div class="project-divider"></div>
                    <p class="project-desc">
                        An academic CRUD website for a home decoration business, built with PHP,
                        jQuery, and AJAX for dynamic content handling, Bootstrap for layout, and
                        custom CSS for responsiveness. It features a full CMS with role-based
                        access for Super Admin, Admin, Editor, and User roles.
                    </p>
                    <div class="project-tags">
                        <span class="project-tag">🐘 PHP</span>
                        <span class="project-tag">🔄 AJAX</span>
                        <span class="project-tag">💠 jQuery</span>
                        <span class="project-tag">🎨 Bootstrap</span>
                    </div>
                    <div class="project-actions">
                        <a href="https://meekos-haven.infinityfreeapp.com/"
                           class="project-btn project-btn-primary"
                           target="_blank">Live Demo</a>
                        <a href="#" class="project-btn project-btn-outline" target="_blank">GitHub</a>
                    </div>
                </div>
            </section>

        </div>

        <p class="projects-empty" id="projectsEmpty">No projects found in this category yet.</p>

    </div>

    <!-- ══════════ CANTEEN APP PREVIEW MODAL ══════════ -->
    <div class="preview-modal" id="previewModal">
        <div class="preview-modal-content">
            <button type="button" class="preview-close" onclick="closePreview()">&times;</button>
            <button type="button" class="preview-nav preview-prev" onclick="prevImage()">&#10094;</button>
            <div class="preview-image-wrap">
                <img id="previewImage" src="" alt="Canteen Ordering App preview">
            </div>
            <button type="button" class="preview-nav preview-next" onclick="nextImage()">&#10095;</button>
            <div class="preview-counter" id="previewCounter"></div>
        </div>
    </div>

    <script>
        /* ── SWEEP SHINE (tags + filter buttons) ── */
        function bindSweep(selector) {
            document.querySelectorAll(selector).forEach(el => {
                el.addEventListener('mouseenter', () => {
                    el.classList.remove('sweep');
                    void el.offsetWidth;
                    el.classList.add('sweep');
                });
            });
        }
        bindSweep('.project-tag');
        bindSweep('.filter-btn');

        /* ── FILTER TOGGLE (single-select, sliding pill inside one shared border) ── */
        const filterButtons = document.querySelectorAll('.filter-btn');
        const projectSections = document.querySelectorAll('.project-section');
        const projectsEmpty = document.getElementById('projectsEmpty');
        const filterPill = document.getElementById('filterPill');

        function applyFilter(filter) {
            let visibleCount = 0;
            projectSections.forEach(section => {
                const category = section.getAttribute('data-category');
                const show = filter === 'all' || category === filter;
                section.classList.toggle('is-hidden', !show);
                if (show) visibleCount++;
            });
            projectsEmpty.classList.toggle('visible', visibleCount === 0);
        }

        function movePillTo(btn) {
            // Use the button's own box (relative to .filter-row's padding
            // edge — the same coordinate space the pill's transform/left/top
            // originate from) so the pill lands correctly whether the row
            // is a single line or has wrapped onto multiple lines.
            filterPill.style.width = btn.offsetWidth + 'px';
            filterPill.style.height = btn.offsetHeight + 'px';
            filterPill.style.transform = `translate(${btn.offsetLeft}px, ${btn.offsetTop}px)`;
            filterPill.classList.add('ready');
        }

        function setActiveButton(selectedBtn) {
            filterButtons.forEach(b => b.classList.toggle('active', b === selectedBtn));
            movePillTo(selectedBtn);
        }

        filterButtons.forEach(btn => {
            btn.addEventListener('click', () => {
                if (btn.classList.contains('active')) return; // no-op, already selected
                setActiveButton(btn);
                applyFilter(btn.getAttribute('data-filter'));
            });
        });

        // position the pill under the initially-active button once layout is ready
        window.addEventListener('load', () => {
            const initiallyActive = document.querySelector('.filter-btn.active') || filterButtons[0];
            movePillTo(initiallyActive);
        });
        window.addEventListener('resize', () => {
            const currentActive = document.querySelector('.filter-btn.active') || filterButtons[0];
            filterPill.style.transition = 'none';
            movePillTo(currentActive);
            requestAnimationFrame(() => { filterPill.style.transition = ''; });
        });

        /* ── PAGE FADE-OUT ON NAVIGATION ── */
        document.querySelectorAll('a[href]').forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('mailto') || href.startsWith('tel')) return;
            if (link.target === '_blank') return;

            link.addEventListener('click', function(e) {
                const destination = this.href;
                if (destination === window.location.href) return;
                e.preventDefault();
                document.body.classList.add('fade-out');
                setTimeout(() => { window.location.href = destination; }, 350);
            });
        });

        /* ── FIX BACK BUTTON CACHE ── */
        window.addEventListener('pageshow', function(e) {
            if (e.persisted) document.body.classList.remove('fade-out');
        });

        /* ── CANTEEN APP PREVIEW GALLERY ── */
        const previewTotal = 17;
        let previewIndex = 1;

        function previewImageSrc(index) {
            return "{{ asset('CanteenOrderingAppPreview/canteen-ordering-app-preview-') }}" + index + ".jpg";
        }

        function updatePreviewImage() {
            document.getElementById('previewImage').src = previewImageSrc(previewIndex);
            document.getElementById('previewCounter').textContent = previewIndex + ' / ' + previewTotal;
        }

        function openPreview() {
            previewIndex = 1;
            updatePreviewImage();
            document.getElementById('previewModal').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closePreview() {
            document.getElementById('previewModal').classList.remove('active');
            document.body.style.overflow = '';
        }

        function nextImage() {
            previewIndex = previewIndex < previewTotal ? previewIndex + 1 : 1;
            updatePreviewImage();
        }

        function prevImage() {
            previewIndex = previewIndex > 1 ? previewIndex - 1 : previewTotal;
            updatePreviewImage();
        }

        document.getElementById('previewModal').addEventListener('click', function(e) {
            if (e.target === this) closePreview();
        });

        document.addEventListener('keydown', function(e) {
            if (!document.getElementById('previewModal').classList.contains('active')) return;
            if (e.key === 'Escape') closePreview();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        });

        /* ── SCROLL REVEAL FOR PROJECT SECTIONS ── */
        projectSections.forEach(section => {
            const targets = section.querySelectorAll(
                '.project-media-frame, .project-label, .project-title, .project-divider, .project-desc, .project-tag, .project-actions'
            );
            targets.forEach((el, i) => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(24px)';
                el.style.transition = `opacity 0.6s ease ${i * 0.08}s, transform 0.6s ease ${i * 0.08}s`;
            });
            new IntersectionObserver((entries, obs) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        targets.forEach(el => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; });
                        obs.disconnect();
                    }
                });
            }, { threshold: 0.15 }).observe(section);
        });
    </script>

</body>
</html>