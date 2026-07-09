<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monjhie Dulay | Game & Web Developer</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #ffffff;
            color: #0a0a0a;
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

        /* ══════════════════════════════════════
           SECTION 1 — HERO (white background)
        ══════════════════════════════════════ */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 6rem 8rem;
            gap: 5rem;
            background-color: #ffffff;
        }

        .hero-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            min-width: 0;
        }

        .greeting {
            font-size: 0.95rem;
            color: #555555;
            letter-spacing: 4px;
            text-transform: uppercase;
            margin-bottom: 1.5rem;
        }

        .hero-left h1 {
            font-size: clamp(2.2rem, 3.5vw, 4.2rem);
            font-weight: 800;
            line-height: 1.1;
            color: #0a0a0a;
            white-space: nowrap;
        }

        .hero-left h1 .highlight { color: #0a0a0a; }

        .role {
            font-size: 1.1rem;
            color: #555555;
            letter-spacing: 1px;
            margin-top: 1rem;
        }

        .role span {
            color: #0a0a0a;
            font-weight: 600;
        }

        .bio {
            max-width: 500px;
            color: #666666;
            margin-top: 1.5rem;
            line-height: 1.9;
            font-size: 1rem;
            border-left: 3px solid #0a0a0a;
            padding-left: 1.2rem;
        }

        .badges {
            display: flex;
            flex-wrap: wrap;
            gap: 0.6rem;
            margin-top: 2rem;
        }

        .badge {
            position: relative;
            overflow: hidden;
            padding: 0.45rem 1.1rem;
            background-color: #ffffff;
            border: 1px solid #d0d0d0;
            border-radius: 5px;
            font-size: 0.8rem;
            color: #555555;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: default;
            transition: border-color 0.5s ease, color 0.5s ease, box-shadow 0.5s ease, transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform, box-shadow;
        }

        .badge::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .badge:hover {
            border-color: #aaaaaa;
            color: #0a0a0a;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.08), 0 2px 6px rgba(0,0,0,0.05), inset 0 1px 0 rgba(255,255,255,0.95);
        }

        .badge.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        @keyframes sweepShine {
            0%   { left: -120%; opacity: 0; }
            8%   { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { left: 160%; opacity: 0; }
        }

        .buttons {
            display: flex;
            gap: 1rem;
            margin-top: 2.5rem;
        }

        .btn-primary {
            padding: 0.85rem 2rem;
            background-color: #0a0a0a;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background 0.3s;
        }

        .btn-primary:hover { background-color: #333333; }

        .btn-outline {
            padding: 0.85rem 2rem;
            border: 2px solid #0a0a0a;
            color: #0a0a0a;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: all 0.3s;
        }

        .btn-outline:hover { background-color: #0a0a0a; color: #ffffff; }

        .hero-right {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-width: 0;
        }

        .photo-container {
            position: relative;
            width: clamp(300px, 38vw, 600px);
            aspect-ratio: 520 / 620;
        }

        .photo-main {
            position: relative;
            z-index: 1;
            width: 100%;
            height: 100%;
            object-fit: contain;
            object-position: center;
            display: block;
            border-radius: 0;
            filter: grayscale(10%);
            transition: filter 0.3s ease;
        }

        .photo-main:hover { filter: grayscale(0%); }

        /* ══════════════════════════════════════
           SCROLL INDICATOR
        ══════════════════════════════════════ */
        .scroll-indicator {
            position: fixed;
            bottom: 2rem;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            z-index: 100;
            opacity: 1;
            pointer-events: none;
            transition: opacity 0.5s ease, transform 0.5s ease;
        }

        .scroll-indicator.hidden {
            opacity: 0;
            transform: translateX(-50%) translateY(10px);
        }

        .scroll-indicator span {
            display: block;
            width: 12px; height: 12px;
            border-right: 2px solid #cccccc;
            border-bottom: 2px solid #cccccc;
            transform: rotate(45deg);
        }

        .scroll-indicator span:nth-child(1) { animation: arrowBounce 1.6s ease-in-out infinite; animation-delay: 0s; }
        .scroll-indicator span:nth-child(2) { animation: arrowBounce 1.6s ease-in-out infinite; animation-delay: 0.2s; }
        .scroll-indicator span:nth-child(3) { animation: arrowBounce 1.6s ease-in-out infinite; animation-delay: 0.4s; }

        @keyframes arrowBounce {
            0%   { opacity: 0.15; transform: rotate(45deg) translate(-3px,-3px); }
            40%  { opacity: 1;    transform: rotate(45deg) translate(0px,0px); }
            80%  { opacity: 0.15; transform: rotate(45deg) translate(3px,3px); }
            100% { opacity: 0.15; transform: rotate(45deg) translate(-3px,-3px); }
        }

        /* ══════════════════════════════════════
           SECTION 2 — GODOT (black background)
        ══════════════════════════════════════ */
        .godot-section {
            background-color: #0a0a0a;
            color: #ffffff;
            padding: 8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6rem;
            min-height: 100vh;
        }

        .godot-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            min-width: 0;
        }

        .godot-logo-container {
            position: relative;
            overflow: hidden;
            width: clamp(180px, 22vw, 320px);
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #333333;
            border-radius: 16px;
            padding: 2rem;
            background-color: #111111;
            cursor: default;
            transition: border-color 0.4s, box-shadow 0.4s, transform 0.4s;
            animation: logoFloat 4s ease-in-out infinite;
        }

        .godot-logo-container:hover {
            border-color: #555555;
            box-shadow: 0 0 40px rgba(255,255,255,0.07);
            transform: translateY(-4px) scale(1.02);
            animation-play-state: paused;
        }

        @keyframes logoFloat {
            0%,100% { transform: translateY(0px); }
            50%     { transform: translateY(-8px); }
        }

        .godot-logo-container::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.08) 40%, rgba(255,255,255,0.20) 50%, rgba(255,255,255,0.08) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
            z-index: 2;
        }

        .godot-logo-container.sweep::before { animation: godotSweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        @keyframes godotSweepShine {
            0%   { left: -120%; opacity: 0; }
            8%   { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { left: 160%; opacity: 0; }
        }

        .godot-logo-container img { width: 100%; height: 100%; object-fit: contain; position: relative; z-index: 1; }

        .godot-logo-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
            animation: labelFadeUp 0.8s ease both;
            animation-delay: 0.3s;
        }

        @keyframes labelFadeUp {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .godot-logo-label .label-name { font-size: 1rem; font-weight: 700; color: #ffffff; letter-spacing: 3px; text-transform: uppercase; }
        .godot-logo-label .label-line { width: 40px; height: 2px; background-color: #ffffff; border-radius: 2px; animation: linePulse 2.5s ease-in-out infinite; }

        @keyframes linePulse {
            0%,100% { width: 30px; opacity: 0.4; }
            50%     { width: 56px; opacity: 1; }
        }

        .godot-logo-label .label-sub { font-size: 0.7rem; color: #555555; letter-spacing: 4px; text-transform: uppercase; }

        .godot-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 0;
        }

        .godot-label {
            font-size: 0.8rem;
            color: #ffffff;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            opacity: 0;
            animation: labelSlideIn 0.7s ease forwards;
            animation-delay: 0.1s;
            position: relative;
            padding-left: 1.2rem;
        }

        .godot-label::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 6px; height: 6px;
            background-color: #ffffff;
            border-radius: 50%;
        }

        @keyframes labelSlideIn {
            from { opacity: 0; transform: translateX(-16px); }
            to   { opacity: 1; transform: translateX(0); }
        }

        .godot-title { font-size: clamp(2rem, 3vw, 3.2rem); font-weight: 800; color: #ffffff; line-height: 1.1; margin-bottom: 1.5rem; }
        .godot-divider { width: 60px; height: 3px; background-color: #ffffff; margin-bottom: 1.5rem; }

        .godot-text {
            font-size: 1rem;
            color: #aaaaaa;
            line-height: 1.9;
            border-left: 3px solid #333333;
            padding-left: 1.2rem;
            max-width: 500px;
        }

        .godot-text strong { color: #ffffff; font-weight: 600; }

        .godot-tags { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-top: 2rem; }

        .godot-tag {
            position: relative;
            overflow: hidden;
            padding: 0.4rem 1rem;
            border: 1px solid #333333;
            border-radius: 4px;
            font-size: 0.8rem;
            color: #aaaaaa;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: default;
            transition: border-color 0.4s, color 0.4s, transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .godot-tag::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.06) 40%, rgba(255,255,255,0.18) 50%, rgba(255,255,255,0.06) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .godot-tag:hover { border-color: #ffffff; color: #ffffff; transform: translateY(-2px); }
        .godot-tag.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        .godot-btn {
            display: inline-block;
            margin-top: 2.5rem;
            padding: 0.85rem 2rem;
            background-color: #ffffff;
            color: #0a0a0a;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background 0.3s, color 0.3s;
            align-self: flex-start;
        }

        .godot-btn:hover { background-color: #cccccc; }

        /* ══════════════════════════════════════
           SECTION 3 — FLUTTER (white background)
        ══════════════════════════════════════ */
        .flutter-section {
            background-color: #ffffff;
            color: #0a0a0a;
            padding: 8rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6rem;
            min-height: 100vh;
        }

        .flutter-left {
            flex: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
            min-width: 0;
        }

        .flutter-section-label {
            font-size: 0.8rem;
            color: #0a0a0a;
            letter-spacing: 5px;
            text-transform: uppercase;
            margin-bottom: 1rem;
            position: relative;
            padding-left: 1.2rem;
        }

        .flutter-section-label::before {
            content: '';
            position: absolute;
            left: 0; top: 50%;
            transform: translateY(-50%);
            width: 6px; height: 6px;
            background-color: #0a0a0a;
            border-radius: 50%;
        }

        .flutter-title { font-size: clamp(2rem, 3vw, 3.2rem); font-weight: 800; color: #0a0a0a; line-height: 1.1; margin-bottom: 1.5rem; }
        .flutter-divider { width: 60px; height: 3px; background-color: #0a0a0a; margin-bottom: 1.5rem; }

        .flutter-text {
            font-size: 1rem;
            color: #666666;
            line-height: 1.9;
            border-left: 3px solid #e0e0e0;
            padding-left: 1.2rem;
            max-width: 500px;
        }

        .flutter-text strong { color: #0a0a0a; font-weight: 600; }

        .flutter-tags { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-top: 2rem; }

        .flutter-tag {
            position: relative;
            overflow: hidden;
            padding: 0.4rem 1rem;
            border: 1px solid #d0d0d0;
            border-radius: 4px;
            font-size: 0.8rem;
            color: #555555;
            letter-spacing: 1px;
            text-transform: uppercase;
            cursor: default;
            transition: border-color 0.4s, color 0.4s, transform 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .flutter-tag::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
        }

        .flutter-tag:hover { border-color: #0a0a0a; color: #0a0a0a; transform: translateY(-2px); }
        .flutter-tag.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        .flutter-btn {
            display: inline-block;
            margin-top: 2.5rem;
            padding: 0.85rem 2rem;
            background-color: #0a0a0a;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            font-size: 0.9rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            transition: background 0.3s;
            align-self: flex-start;
        }

        .flutter-btn:hover { background-color: #333333; }

        /* RIGHT — Logo stack */
        .flutter-right {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
            min-width: 0;
        }

        /* ── CHANGED: bigger logo box + bigger image inside ── */
        .flutter-logo-container {
            position: relative;
            overflow: hidden;
            width: clamp(220px, 26vw, 380px); /* was clamp(180px, 22vw, 320px) */
            aspect-ratio: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #e0e0e0;
            border-radius: 16px;
            padding: 2rem;
            background-color: #f9f9f9;
            cursor: default;
            transition: border-color 0.4s, box-shadow 0.4s, transform 0.4s;
            animation: logoFloat 4s ease-in-out infinite;
            animation-delay: 0.5s;
        }

        .flutter-logo-container:hover {
            border-color: #aaaaaa;
            box-shadow: 0 0 40px rgba(0,0,0,0.06);
            transform: translateY(-4px) scale(1.02);
            animation-play-state: paused;
        }

        .flutter-logo-container::before {
            content: '';
            position: absolute;
            top: 0; left: -120%;
            width: 60%; height: 100%;
            background: linear-gradient(110deg, transparent 10%, rgba(255,255,255,0.55) 40%, rgba(255,255,255,0.85) 50%, rgba(255,255,255,0.55) 60%, transparent 90%);
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
            z-index: 2;
        }

        .flutter-logo-container.sweep::before { animation: sweepShine 1.2s cubic-bezier(0.22,0.61,0.36,1) forwards; }

        /* ── CHANGED: image size 75% → 92% ── */
        .flutter-logo-container img { width: 92%; height: 92%; object-fit: contain; position: relative; z-index: 1; }

        .flutter-logo-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.4rem;
        }

        .flutter-logo-label .label-name { font-size: 1rem; font-weight: 700; color: #0a0a0a; letter-spacing: 3px; text-transform: uppercase; }
        .flutter-logo-label .label-line { width: 40px; height: 2px; background-color: #0a0a0a; border-radius: 2px; animation: linePulse 2.5s ease-in-out infinite; }
        .flutter-logo-label .label-sub { font-size: 0.7rem; color: #888888; letter-spacing: 4px; text-transform: uppercase; }

        .flutter-db-row {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }

        .db-badge {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.5rem;
            padding: 0.9rem 1.4rem;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            background: #f9f9f9;
            font-size: 0.7rem;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: #555555;
            transition: border-color 0.3s, transform 0.3s, box-shadow 0.3s;
            cursor: default;
            min-width: 100px;
        }

        .db-badge:hover {
            border-color: #aaaaaa;
            color: #0a0a0a;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(0,0,0,0.07);
        }

        .db-badge .db-icon { font-size: 1.6rem; line-height: 1; }

        /* ── RESPONSIVE ── */
        @media (max-width: 1600px) {
            .hero           { padding: 6rem 6rem; gap: 4rem; }
            .godot-section  { padding: 8rem 6rem; gap: 4rem; }
            .flutter-section{ padding: 8rem 6rem; gap: 4rem; }
        }

        @media (max-width: 1100px) {
            .hero           { padding: 6rem 3rem; gap: 3rem; }
            .hero-left h1   { font-size: clamp(2rem, 3.2vw, 3.2rem); }
            .godot-section  { padding: 6rem 3rem; gap: 3rem; }
            .flutter-section{ padding: 6rem 3rem; gap: 3rem; }
        }

        @media (max-width: 860px) {
            .hero {
                flex-direction: column-reverse;
                min-height: auto;
                padding: 8rem 2.5rem 4rem;
                gap: 2.5rem;
                text-align: center;
            }
            .hero-left { align-items: center; }
            .bio { border-left: none; border-top: 3px solid #0a0a0a; padding-left: 0; padding-top: 1rem; text-align: left; }
            .badges { justify-content: center; }
            .buttons { justify-content: center; }
            .photo-container { width: clamp(260px, 70vw, 420px); }
            .hero-right { width: 100%; }

            .godot-section {
                flex-direction: column;
                padding: 6rem 2.5rem;
                gap: 3rem;
                text-align: center;
            }
            .godot-right { align-items: center; }
            .godot-text { border-left: none; border-top: 3px solid #333333; padding-left: 0; padding-top: 1rem; text-align: left; }
            .godot-tags { justify-content: center; }
            .godot-btn { align-self: center; }
            .godot-divider { margin-left: auto; margin-right: auto; }
            .godot-label { padding-left: 1.5rem; }
            .godot-logo-container { width: clamp(160px, 50vw, 260px); }

            .flutter-section {
                flex-direction: column;
                padding: 6rem 2.5rem;
                gap: 3rem;
                text-align: center;
            }
            .flutter-left { align-items: center; }
            .flutter-text { border-left: none; border-top: 3px solid #e0e0e0; padding-left: 0; padding-top: 1rem; text-align: left; }
            .flutter-tags { justify-content: center; }
            .flutter-btn { align-self: center; }
            .flutter-divider { margin-left: auto; margin-right: auto; }
            .flutter-section-label { padding-left: 1.5rem; }
            .flutter-logo-container { width: clamp(180px, 55vw, 300px); } /* slightly bigger on mobile too */
        }

        @media (max-width: 640px) {
            .hero           { padding: 7rem 1.5rem 3rem; gap: 2rem; }
            .hero-left h1   { font-size: 2.2rem; white-space: normal; }
            .role           { font-size: 1rem; }
            .bio            { font-size: 0.95rem; }
            .btn-primary, .btn-outline { padding: 0.75rem 1.5rem; font-size: 0.8rem; }
            .godot-section  { padding: 5rem 1.5rem; }
            .flutter-section{ padding: 5rem 1.5rem; }
        }

        @media (max-width: 420px) {
            .hero           { padding: 6.5rem 1.2rem 2.5rem; }
            .hero-left h1   { font-size: 1.9rem; }
            .greeting       { font-size: 0.78rem; letter-spacing: 3px; }
            .buttons        { flex-direction: column; width: 100%; }
            .btn-primary, .btn-outline { text-align: center; }
            .godot-section  { padding: 4rem 1.2rem; }
            .flutter-section{ padding: 4rem 1.2rem; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR COMPONENT --}}
    <x-navbar />

    <div class="page-wrapper">

        <!-- ══════════════════════════════════════
             SECTION 1 — HERO
        ══════════════════════════════════════ -->
        <section class="hero">

            <div class="hero-left">
                <p class="greeting">Hello, World 👋</p>
                <h1>I'm <span class="highlight">Monjhie</span> Dulay.</h1>
                <p class="role">
                    <span>Game Developer</span> & <span>Web Developer</span>
                </p>
                <p class="bio">
                    A passionate developer who loves
                    creating immersive game experiences and clean,
                    functional web applications.
                </p>
                <div class="badges">
                    <span class="badge">🎮 Game Dev</span>
                    <span class="badge">🌐 Web Dev</span>
                    <span class="badge">⚙️ Laravel</span>
                    <span class="badge">🐘 PHP</span>
                    <span class="badge">🎨 UI Design</span>
                    <span class="badge">💙 Flutter</span>
                    <span class="badge">🎮 Godot</span>
                </div>
                <div class="buttons">
                    <a href="{{ route('projects') }}" class="btn-primary">View My Projects</a>
                    <a href="{{ route('contact') }}" class="btn-outline">Contact Me</a>
                </div>
            </div>

            <div class="hero-right">
                <div class="photo-container">
                    <img src="{{ asset('images/try_profile.png') }}"
                         alt="Monjhie Dulay"
                         class="photo-main">
                </div>
            </div>

        </section>

        <!-- ══════════════════════════════════════
             SECTION 2 — GODOT (black background)
        ══════════════════════════════════════ -->
        <section class="godot-section" id="godotSection">

            <div class="godot-left">
                <div class="godot-logo-container" id="godotLogoBox">
                    <img src="{{ asset('images/godot_logo.png') }}"
                         alt="Godot Engine"
                         onerror="this.style.display='none'; this.parentElement.innerHTML += '<p style=\'color:#888;font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;\'>Godot Engine</p>'">
                </div>
                <div class="godot-logo-label">
                    <span class="label-name">Godot Engine</span>
                    <span class="label-line"></span>
                    <span class="label-sub">Game Engine</span>
                </div>
            </div>

            <div class="godot-right">
                <p class="godot-label">Game Development</p>
                <h2 class="godot-title">Building Games<br>with Godot</h2>
                <div class="godot-divider"></div>
                <p class="godot-text">
                    During my time as a trainee at
                    <strong>GoCrayons Digital Inc.</strong>,
                    I had the opportunity to dive deep into game development
                    using the <strong>Godot Engine</strong>. Working in a
                    professional environment pushed me to level up my skills
                    from designing game mechanics and building 2D levels to
                    scripting interactive gameplay using <strong>GDScript</strong>.
                    It was an experience that shaped how I think about
                    game design, problem solving, and creative storytelling
                    through interactive media.
                </p>
                <div class="godot-tags">
                    <span class="godot-tag">🎮 Godot Engine</span>
                    <span class="godot-tag">⚙️ GDScript</span>
                    <span class="godot-tag">🕹️ 2D Games</span>
                    <span class="godot-tag">🏢 GoCrayons Digital Inc.</span>
                    <span class="godot-tag">🎨 Game Design</span>
                </div>
                <a href="{{ route('projects') }}" class="godot-btn">
                    View Game Projects →
                </a>
            </div>

        </section>

        <!-- ══════════════════════════════════════
             SECTION 3 — FLUTTER (white background)
        ══════════════════════════════════════ -->
        <section class="flutter-section" id="flutterSection">

            <div class="flutter-left">
                <p class="flutter-section-label">Mobile Development</p>
                <h2 class="flutter-title">Building Apps<br>with Flutter</h2>
                <div class="flutter-divider"></div>
                <p class="flutter-text">
                    I built the <strong>Olivarez College Tagaytay Canteen Ordering System</strong>
                    — a full-featured mobile app developed with <strong>Flutter</strong>
                    that lets students browse the canteen menu, place orders, and
                    track them in real time. The app uses <strong>Firebase</strong>
                    as the primary database for live order management and authentication,
                    and <strong>Supabase</strong> for efficient image storage of menu items.
                    It was a hands-on experience that taught me how to architect a
                    real-world mobile system from design to deployment.
                </p>
                <div class="flutter-tags">
                    <span class="flutter-tag">💙 Flutter</span>
                    <span class="flutter-tag">🔥 Firebase</span>
                    <span class="flutter-tag">⚡ Supabase</span>
                    <span class="flutter-tag">📱 Mobile App</span>
                    <span class="flutter-tag">🍽️ Canteen System</span>
                    <span class="flutter-tag">🎓 OC Tagaytay</span>
                </div>
                <a href="{{ route('projects') }}" class="flutter-btn">
                    View Project →
                </a>
            </div>

            <div class="flutter-right">
                <div class="flutter-logo-container" id="flutterLogoBox">
                    <img src="{{ asset('images/flutter_logo.png') }}"
                         alt="Flutter"
                         onerror="this.style.display='none'; this.parentElement.innerHTML += '<p style=\'color:#888;font-size:0.8rem;letter-spacing:2px;text-transform:uppercase;\'>Flutter</p>'">
                </div>
                <div class="flutter-logo-label">
                    <span class="label-name">Flutter</span>
                    <span class="label-line"></span>
                    <span class="label-sub">Mobile Framework</span>
                </div>
                <div class="flutter-db-row">
                    <div class="db-badge">
                        <span class="db-icon">🔥</span>
                        Firebase
                    </div>
                    <div class="db-badge">
                        <span class="db-icon">⚡</span>
                        Supabase
                    </div>
                </div>
            </div>

        </section>

    </div><!-- end .page-wrapper -->

    <div class="scroll-indicator" id="scrollIndicator">
        <span></span>
        <span></span>
        <span></span>
    </div>

    <script>
        /* ── BADGE SWEEP SHINE ── */
        document.querySelectorAll('.badge').forEach(badge => {
            badge.addEventListener('mouseenter', () => {
                badge.classList.remove('sweep');
                void badge.offsetWidth;
                badge.classList.add('sweep');
            });
        });

        /* ── GODOT LOGO BOX SWEEP ── */
        const godotLogoBox = document.getElementById('godotLogoBox');
        godotLogoBox.addEventListener('mouseenter', () => {
            godotLogoBox.classList.remove('sweep');
            void godotLogoBox.offsetWidth;
            godotLogoBox.classList.add('sweep');
        });

        /* ── GODOT TAG SWEEP ── */
        document.querySelectorAll('.godot-tag').forEach(tag => {
            tag.addEventListener('mouseenter', () => {
                tag.classList.remove('sweep');
                void tag.offsetWidth;
                tag.classList.add('sweep');
            });
        });

        /* ── FLUTTER LOGO BOX SWEEP ── */
        const flutterLogoBox = document.getElementById('flutterLogoBox');
        flutterLogoBox.addEventListener('mouseenter', () => {
            flutterLogoBox.classList.remove('sweep');
            void flutterLogoBox.offsetWidth;
            flutterLogoBox.classList.add('sweep');
        });

        /* ── FLUTTER TAG SWEEP ── */
        document.querySelectorAll('.flutter-tag').forEach(tag => {
            tag.addEventListener('mouseenter', () => {
                tag.classList.remove('sweep');
                void tag.offsetWidth;
                tag.classList.add('sweep');
            });
        });

        /* ── SCROLL INDICATOR ── */
        const indicator = document.getElementById('scrollIndicator');
        const BOTTOM_THRESHOLD = 80;

        function updateScrollIndicator() {
            const distanceFromBottom = document.documentElement.scrollHeight
                - (window.scrollY + window.innerHeight);
            indicator.classList.toggle('hidden', distanceFromBottom <= BOTTOM_THRESHOLD);
        }

        window.addEventListener('scroll', updateScrollIndicator, { passive: true });
        window.addEventListener('resize', updateScrollIndicator, { passive: true });
        updateScrollIndicator();

        /* ── SCROLL-TRIGGERED ANIMATIONS (Godot) ── */
        const godotSection = document.querySelector('#godotSection');
        const godotTargets = godotSection.querySelectorAll(
            '.godot-logo-container, .godot-logo-label, .godot-label, .godot-title, .godot-divider, .godot-text, .godot-tag, .godot-btn'
        );

        godotTargets.forEach((el, i) => {
            el.style.opacity    = '0';
            el.style.transform  = 'translateY(24px)';
            el.style.transition = `opacity 0.6s ease ${i * 0.08}s, transform 0.6s ease ${i * 0.08}s`;
        });

        new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    godotTargets.forEach(el => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; });
                    obs.disconnect();
                }
            });
        }, { threshold: 0.15 }).observe(godotSection);

        /* ── SCROLL-TRIGGERED ANIMATIONS (Flutter) ── */
        const flutterSection = document.querySelector('#flutterSection');
        const flutterTargets = flutterSection.querySelectorAll(
            '.flutter-logo-container, .flutter-logo-label, .flutter-db-row, .flutter-section-label, .flutter-title, .flutter-divider, .flutter-text, .flutter-tag, .flutter-btn'
        );

        flutterTargets.forEach((el, i) => {
            el.style.opacity    = '0';
            el.style.transform  = 'translateY(24px)';
            el.style.transition = `opacity 0.6s ease ${i * 0.08}s, transform 0.6s ease ${i * 0.08}s`;
        });

        new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    flutterTargets.forEach(el => { el.style.opacity = '1'; el.style.transform = 'translateY(0)'; });
                    obs.disconnect();
                }
            });
        }, { threshold: 0.15 }).observe(flutterSection);

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
        window.addEventListener('pageshow', e => {
            if (e.persisted) document.body.classList.remove('fade-out');
        });
    </script>

</body>
</html>