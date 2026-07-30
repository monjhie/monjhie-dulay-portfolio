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
            /* Single source of truth for the photo's decorative overhang.
               Capped at 50px on large screens, but on narrow screens it
               shrinks to match the page's own 6vw side padding so the
               negative margin used below can never pull content past the
               edge of the viewport (that mismatch was the cause of the
               horizontal scroll on mobile). */
            --photo-overhang: min(50px, 6vw);
        }

        html, body {
            min-height: 100%;
            width: 100%;
            max-width: 100%;
            overflow-x: hidden;
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
            padding: 60px 6vw 100px;
            max-width: 1300px;
            margin: 0 auto;
            background: transparent;
            overflow-x: hidden;
        }

        /* ══════════════════════════════════════
           SECTION 0 — INTERACTIVE ID CARD
        ══════════════════════════════════════ */
        /* ── Big outlined name text sitting behind the ID card ── */
        .id-bg-text {
            position: absolute;
            font-family: 'Syne', sans-serif;
            font-weight: 800;
            font-size: clamp(2.6rem, 9vw, 7rem);
            line-height: 1;
            letter-spacing: -0.01em;
            color: transparent;
            -webkit-text-stroke: 1.5px rgba(139, 92, 246, 0.28);
            z-index: 1;
            pointer-events: none;
            user-select: none;
            white-space: nowrap;
            /* Safety net: even if the nowrap text is wider than expected
               on an unusual viewport, it gets clipped here rather than
               ever forcing the page to scroll horizontally. */
            max-width: 94vw;
            overflow: hidden;
        }

        .id-bg-text-top {
            top: 100px;
            left: 2vw;
        }

        .id-bg-text-bottom {
            bottom: 0;
            right: 2vw;
        }

        @media (max-width: 640px) {
            .id-bg-text {
                font-size: clamp(2rem, 13vw, 3.2rem);
                -webkit-text-stroke: 1.2px rgba(139, 92, 246, 0.28);
            }
        }

        .id-card-wrap {
            position: relative;
            display: flex;
            justify-content: center;
            padding: 150px 6vw 60px;
            opacity: 0;
            overflow: visible;
            animation: fadeUp 0.7s 0.15s ease forwards;
        }

        @media (max-width: 768px) {
            .id-card-wrap { padding: 130px 6vw 50px; }
        }

        @media (max-width: 480px) {
            .id-card-wrap { padding: 108px 6vw 36px; }
        }

        /* ── The peg the lace hangs from ── */
        .lanyard-anchor {
            position: absolute;
            top: 54px;
            left: 50%;
            width: 22px;
            height: 22px;
            margin-left: -11px;
            border-radius: 50%;
            background: linear-gradient(160deg, #4c1d95, #7c3aed);
            box-shadow: 0 4px 10px rgba(76, 29, 149, 0.4), inset 0 1px 2px rgba(255, 255, 255, 0.4);
            z-index: 3;
        }

        .lanyard-anchor::after {
            content: '';
            position: absolute;
            inset: 5px;
            border-radius: 50%;
            background: #f5f3ff;
        }

        /* ── The lace itself (an SVG path so it can bend as you drag) ── */
        .lanyard-svg {
            position: absolute;
            inset: 0;
            width: 100%;
            height: 100%;
            overflow: visible;
            pointer-events: none;
            z-index: 2;
        }

        .lanyard-path-bg {
            fill: none;
            stroke: url(#laceGradient);
            stroke-width: 20;
            stroke-linecap: round;
        }

        .lanyard-path-edge {
            fill: none;
            stroke: rgba(30, 27, 75, 0.18);
            stroke-width: 20;
            stroke-linecap: round;
            fill-rule: evenodd;
        }

        .lanyard-path-weave {
            fill: none;
            stroke: rgba(255, 255, 255, 0.4);
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-dasharray: 5 7;
        }

        /* ── "Developer" tag printed on the lace ── */
        .lanyard-label {
            position: absolute;
            top: 0;
            left: 0;
            padding: 5px 14px;
            background: #ffffff;
            border-radius: 4px;
            font-family: 'Syne', sans-serif;
            font-size: 0.62rem;
            font-weight: 800;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #6d28d9;
            box-shadow: 0 4px 10px rgba(76, 29, 149, 0.28);
            white-space: nowrap;
            z-index: 4;
            pointer-events: none;
        }

        /* ── Metal clip connecting the lace to the card ── */
        .id-card-clip {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 44px;
            height: 20px;
            background: linear-gradient(160deg, #e5e7eb 0%, #9ca3af 55%, #d1d5db 100%);
            border-radius: 5px;
            z-index: 4;
            box-shadow: 0 3px 6px rgba(0, 0, 0, 0.25), inset 0 1px 1px rgba(255, 255, 255, 0.6);
        }

        .id-card-clip::after {
            content: '';
            position: absolute;
            top: 3px;
            left: 50%;
            width: 16px;
            height: 7px;
            transform: translateX(-50%);
            border: 2px solid #6b7280;
            border-bottom: none;
            border-radius: 7px 7px 0 0;
        }

        .id-card {
            width: 320px;
            max-width: 90vw;
            perspective: 1600px;
            position: relative;
            z-index: 5;
            cursor: grab;
            touch-action: none;
            -webkit-user-select: none;
            user-select: none;
            transform-origin: top center;
        }

        .id-card.dragging {
            cursor: grabbing;
        }

        .id-card.dragging .id-card-inner {
            transition: none;
        }

        .id-card-inner {
            position: relative;
            width: 100%;
            aspect-ratio: 320 / 460;
            transform-style: preserve-3d;
            transition: transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .id-card.is-flipped .id-card-inner {
            transform: rotateY(180deg);
        }

        .id-card-face {
            position: absolute;
            inset: 0;
            backface-visibility: hidden;
            border-radius: 20px;
            background: linear-gradient(160deg, #ffffff 0%, #f5f3ff 100%);
            border: 1px solid var(--border);
            box-shadow: 0 25px 60px rgba(99, 102, 241, 0.22);
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 46px 28px 28px;
            text-align: center;
        }

        @media (max-width: 380px) {
            .id-card-face { padding: 34px 18px 20px; }
            .id-card-photo { width: 96px; height: 96px; margin: 16px 0 14px; }
            .id-card-name { font-size: 1.12rem; }
        }

        .id-card-back {
            transform: rotateY(180deg);
            background: linear-gradient(160deg, #1e1b4b 0%, #2d1b4e 100%);
            color: var(--white);
            justify-content: flex-start;
        }

        .id-card-back .id-card-clip {
            background: linear-gradient(160deg, #d1d5db 0%, #6b7280 55%, #9ca3af 100%);
        }

        .id-card-photo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 22px 0 18px;
            border: 3px solid #fff;
            box-shadow: 0 10px 24px rgba(139, 92, 246, 0.3);
            flex-shrink: 0;
        }

        .id-card-photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .id-card-name {
            font-family: 'Syne', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: var(--black);
            letter-spacing: -0.01em;
        }

        .id-card-role {
            font-size: 0.78rem;
            font-weight: 500;
            color: var(--muted);
            letter-spacing: 0.06em;
            text-transform: uppercase;
            margin-top: 6px;
        }

        .id-card-barcode {
            width: 80%;
            height: 34px;
            margin-top: auto;
            background: repeating-linear-gradient(
                90deg,
                var(--black) 0px, var(--black) 2px,
                transparent 2px, transparent 5px
            );
            opacity: 0.65;
        }

        .id-card-number {
            font-family: 'Syne', sans-serif;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 0.1em;
            color: var(--muted);
            margin-top: 10px;
        }

        .id-card-flip-hint {
            font-size: 0.62rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #a78bfa;
            margin-top: 12px;
            font-weight: 600;
        }

        .id-card-back-title {
            font-family: 'Syne', sans-serif;
            font-size: 0.65rem;
            font-weight: 700;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            background: linear-gradient(90deg, #a5b4fc, #f0abfc);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin: 26px 0 20px;
        }

        .id-card-info {
            list-style: none;
            width: 100%;
            text-align: left;
            padding: 0 6px;
        }

        .id-card-info li {
            display: flex;
            flex-direction: column;
            font-size: 0.85rem;
            padding: 12px 0;
            border-bottom: 1px solid rgba(167, 139, 250, 0.2);
        }

        .id-card-info li span {
            font-size: 0.6rem;
            letter-spacing: 0.14em;
            text-transform: uppercase;
            color: #c4bfe0;
            margin-bottom: 4px;
        }

        .id-card-back .id-card-flip-hint {
            margin-top: auto;
            padding-top: 16px;
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
               keeps the layout from shifting. The value is capped so it can
               never exceed .about-page's own 6vw side padding — that's what
               was causing the horizontal scroll on narrow phones before. */
            padding-top: var(--photo-overhang);
            padding-left: var(--photo-overhang);
            margin-top: calc(var(--photo-overhang) * -1);
            margin-left: calc(var(--photo-overhang) * -1);
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

        /* ── Band-aid decoration (larger + edge-hugging on all devices) ──
           top/left are tied to the same --photo-overhang variable as the
           wrapper's padding/margin above, so they always cancel out
           correctly and the decoration can bleed to the edge without ever
           pushing the page wider than the viewport. Width now scales
           fluidly with clamp() instead of jumping between fixed
           breakpoints. */
        .bandaid-decoration {
            position: absolute;
            top: calc(var(--photo-overhang) * -1);
            left: calc(var(--photo-overhang) * -1);
            width: clamp(110px, 30vw, 240px);
            height: auto;
            z-index: 10;
            pointer-events: none;
            filter: drop-shadow(1px 2px 4px rgba(139, 92, 246, 0.25));
            transition: transform 0.35s cubic-bezier(0.22, 1, 0.36, 1);
        }

        .photo-frame:hover .bandaid-decoration {
            transform: rotate(-6deg) translateY(-4px);
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

        @media (max-width: 420px) {
            .bio-details { grid-template-columns: 1fr; gap: 18px; }
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

        <!-- ══════════════════════════════════════
             SECTION 0 — INTERACTIVE ID CARD
        ══════════════════════════════════════ -->
        <div class="id-card-wrap" id="idCardWrap">

            <!-- Big name watermark, sitting behind the card -->
            <span class="id-bg-text id-bg-text-top" aria-hidden="true">MONJHIE</span>
            <span class="id-bg-text id-bg-text-bottom" aria-hidden="true">DULAY</span>

            <!-- Peg the lace hangs from -->
            <div class="lanyard-anchor" id="lanyardAnchor"></div>

            <!-- The lace, drawn as a curve so it bends while you drag -->
            <svg class="lanyard-svg" id="lanyardSvg">
                <defs>
                    <linearGradient id="laceGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                        <stop offset="0%" stop-color="#6366f1"/>
                        <stop offset="50%" stop-color="#a855f7"/>
                        <stop offset="100%" stop-color="#ec4899"/>
                    </linearGradient>
                </defs>
                <path id="lanyardPathEdge" class="lanyard-path-edge"></path>
                <path id="lanyardPathBg" class="lanyard-path-bg"></path>
                <path id="lanyardPathWeave" class="lanyard-path-weave"></path>
            </svg>

            <!-- Printed tag sewn onto the lace -->
            <div class="lanyard-label" id="lanyardLabel">Developer</div>

            <div class="id-card" id="idCard">
                <div class="id-card-inner">

                    <!-- FRONT FACE -->
                    <div class="id-card-face id-card-front">
                        <div class="id-card-clip"></div>

                        <div class="id-card-photo">
                            <img src="{{ asset('images/id_pic.png') }}" alt="Monjhie Dulay">
                        </div>

                        <p class="id-card-name">Monjhie Dulay</p>
                        <p class="id-card-role">Full-Stack Web Developer</p>

                        <div class="id-card-barcode"></div>
                        <p class="id-card-number">ID No. DEV-2026-001</p>
                        <p class="id-card-flip-hint">Drag to swing &middot; Tap to flip &#8635;</p>
                    </div>

                    <!-- BACK FACE -->
                    <div class="id-card-face id-card-back">
                        <div class="id-card-clip"></div>

                        <p class="id-card-back-title">Quick Info</p>
                        <ul class="id-card-info">
                            <li><span>Focus</span>Full-Stack Web</li>
                            <li><span>Available For</span>Freelance / Full-time</li>
                            <li><span>Languages</span>Filipino, English</li>
                            <li><span>Approach</span>Design-First</li>
                        </ul>
                        <p class="id-card-flip-hint">Tap to flip back &#8634;</p>
                    </div>

                </div><!-- end .id-card-inner -->
            </div><!-- end .id-card -->
        </div><!-- end .id-card-wrap -->

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
                            <p class="detail-label">Focus </p>
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
           INTERACTIVE ID CARD — DRAGGABLE LANYARD SWING
           Click/tap (no movement) flips the card.
           Click-and-drag pulls it off the lace, which bends
           to follow, then it swings back to rest like a
           real lanyard when you let go.
        ══════════════════════════════════════ */
        (function () {
            const wrap        = document.getElementById('idCardWrap');
            const card        = document.getElementById('idCard');
            const anchor      = document.getElementById('lanyardAnchor');
            const pathEdge    = document.getElementById('lanyardPathEdge');
            const pathBg      = document.getElementById('lanyardPathBg');
            const pathWeave   = document.getElementById('lanyardPathWeave');
            const label       = document.getElementById('lanyardLabel');

            if (!wrap || !card || !anchor) return;

            let posX = 0, posY = 0, angle = 0;
            let velX = 0, velY = 0, angleVel = 0;
            let dragging = false, moved = false;
            let startX = 0, startY = 0, origX = 0, origY = 0;
            let lastX = 0, lastY = 0, lastTime = 0;
            let rafId = null;

            // mode: 'idle' (ambient sway), 'dragging', or 'springback' (returning to rest)
            let mode = 'idle';
            let idleStart = performance.now();
            // small random offsets so the two card instances on a page (if any) never sync up
            const idlePhaseA = Math.random() * Math.PI * 2;
            const idlePhaseB = Math.random() * Math.PI * 2;

            // The card's natural, untransformed top-center position relative
            // to the wrap. getBoundingClientRect() on a *rotated* element
            // returns its axis-aligned bounding box, not the actual pivot
            // point — that's what was making the lace look detached while
            // swinging. Since the card only rotates around its own
            // transform-origin (top center) and is then translated by
            // (posX, posY), the true attachment point in screen space is
            // always just this static position plus the current offset,
            // regardless of angle.
            let staticClipX = 0;
            let staticClipY = 0;

            function recomputeStaticClipPoint() {
                staticClipX = card.offsetLeft + card.offsetWidth / 2;
                staticClipY = card.offsetTop - 5; // aligns with the metal clip graphic
            }

            function getAnchorPoint() {
                const wrapRect = wrap.getBoundingClientRect();
                const aRect = anchor.getBoundingClientRect();
                return {
                    x: aRect.left + aRect.width / 2 - wrapRect.left,
                    y: aRect.top + aRect.height / 2 - wrapRect.top
                };
            }

            function getClipPoint() {
                return {
                    x: staticClipX + posX,
                    y: staticClipY + posY
                };
            }

            function updateLace() {
                const a = getAnchorPoint();
                const c = getClipPoint();
                const midX = (a.x + c.x) / 2;
                const sag  = 10 + Math.min(Math.abs(posX) * 0.1, 30);
                const midY = (a.y + c.y) / 2 - sag * 0.15;

                const d = `M${a.x},${a.y} Q${midX},${midY} ${c.x},${c.y}`;
                pathEdge.setAttribute('d', d);
                pathBg.setAttribute('d', d);
                pathWeave.setAttribute('d', d);

                // Position the "Developer" tag at the midpoint of the curve,
                // rotated to match the lace's angle at that point.
                const t = 0.48;
                const lx = (1 - t) * (1 - t) * a.x + 2 * (1 - t) * t * midX + t * t * c.x;
                const ly = (1 - t) * (1 - t) * a.y + 2 * (1 - t) * t * midY + t * t * c.y;
                const dx = 2 * (1 - t) * (midX - a.x) + 2 * t * (c.x - midX);
                const dy = 2 * (1 - t) * (midY - a.y) + 2 * t * (c.y - midY);
                let labelAngle = Math.atan2(dy, dx) * 180 / Math.PI;
                if (labelAngle > 90) labelAngle -= 180;
                if (labelAngle < -90) labelAngle += 180;

                label.style.left = lx + 'px';
                label.style.top = ly + 'px';
                label.style.transform = `translate(-50%, -50%) rotate(${labelAngle}deg)`;
            }

            function updateCardTransform() {
                card.style.transform = `translate(${posX}px, ${posY}px) rotate(${angle}deg)`;
                updateLace();
            }

            function clamp(v, min, max) {
                return Math.max(min, Math.min(max, v));
            }

            // Keeps the card from being dragged past the edges of the
            // viewport on narrow phones, while allowing a wide swing on desktop.
            function maxDragX() {
                const wrapWidth = wrap.getBoundingClientRect().width;
                const cardWidth = card.getBoundingClientRect().width;
                return Math.max(60, wrapWidth / 2 - cardWidth / 2 - 12);
            }

            function onPointerDown(e) {
                dragging = true;
                mode = 'dragging';
                moved = false;
                card.classList.add('dragging');
                card.setPointerCapture(e.pointerId);
                startX = e.clientX;
                startY = e.clientY;
                origX = posX;
                origY = posY;
                lastX = e.clientX;
                lastY = e.clientY;
                lastTime = performance.now();
                velX = 0;
                velY = 0;
            }

            function onPointerMove(e) {
                if (!dragging) return;
                const dx = e.clientX - startX;
                const dy = e.clientY - startY;
                if (Math.abs(dx) > 4 || Math.abs(dy) > 4) moved = true;

                const maxX = maxDragX();
                posX = clamp(origX + dx, -maxX, maxX);
                posY = clamp(origY + dy, -30, 260);
                angle = clamp(dx * 0.12, -32, 32);

                const now = performance.now();
                const dt = Math.max(now - lastTime, 1);
                velX = (e.clientX - lastX) / dt * 16;
                velY = (e.clientY - lastY) / dt * 16;
                lastX = e.clientX;
                lastY = e.clientY;
                lastTime = now;

                updateCardTransform();
            }

            function onPointerUp(e) {
                if (!dragging) return;
                dragging = false;
                card.classList.remove('dragging');
                try { card.releasePointerCapture(e.pointerId); } catch (err) {}

                if (!moved) {
                    card.classList.toggle('is-flipped');
                }

                angleVel = clamp(velX * 0.5, -14, 14);
                mode = 'springback';
            }

            // One damped-spring step, pulling the card back toward rest.
            // Returns true once it has settled down to near-zero motion.
            function springStep() {
                const stiffness = 0.09;
                const damping = 0.84;

                const fx = -posX * stiffness;
                const fy = -posY * stiffness;
                const fa = -angle * stiffness * 1.4;

                velX = (velX + fx) * damping;
                velY = (velY + fy) * damping;
                angleVel = (angleVel + fa) * damping;

                posX += velX;
                posY += velY;
                angle += angleVel;

                const settled =
                    Math.abs(posX) < 0.3 && Math.abs(posY) < 0.3 &&
                    Math.abs(angle) < 0.3 && Math.abs(velX) < 0.3 &&
                    Math.abs(velY) < 0.3 && Math.abs(angleVel) < 0.3;

                if (settled) {
                    posX = 0;
                    posY = 0;
                    angle = 0;
                }
                return settled;
            }

            // Gentle, never-ending ambient sway so the ID always feels
            // like it's really hanging on a lace, not just sitting still.
            function idleSway(now) {
                const t = (now - idleStart) / 1000;
                // two slightly-detuned sine waves so the motion doesn't
                // feel like a perfect, robotic loop
                angle =
                    Math.sin(t * 0.55 + idlePhaseA) * 3.2 +
                    Math.sin(t * 0.37 + idlePhaseB) * 1.6;
                posX = 0;
                posY = Math.sin(t * 0.55 + idlePhaseA) * 1.5 + 1.5;
            }

            // Single persistent loop: always running, branches on mode.
            function frameLoop(now) {
                if (mode === 'dragging') {
                    // pointermove already applies the transform directly
                } else if (mode === 'springback') {
                    const settled = springStep();
                    updateCardTransform();
                    if (settled) {
                        mode = 'idle';
                        idleStart = now;
                    }
                } else {
                    idleSway(now);
                    updateCardTransform();
                }
                rafId = requestAnimationFrame(frameLoop);
            }

            card.addEventListener('pointerdown', onPointerDown);
            card.addEventListener('pointermove', onPointerMove);
            card.addEventListener('pointerup', onPointerUp);
            card.addEventListener('pointercancel', onPointerUp);

            window.addEventListener('resize', () => {
                recomputeStaticClipPoint();
                updateLace();
            });
            recomputeStaticClipPoint();
            updateCardTransform();
            rafId = requestAnimationFrame(frameLoop);
        })();


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