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

        /* ── PROJECTS SECTION ── */
        .projects-section {
            min-height: 100vh;
            padding: 8rem 8rem 5rem;
        }

        .projects-header {
            margin-bottom: 3.5rem;
        }

        .projects-header h1 {
            font-size: 3.8rem;
            font-weight: 800;
            color: #0a0a0a;
            letter-spacing: 2px;
            text-transform: uppercase;
            line-height: 1;
        }

        .projects-header p {
            margin-top: 1rem;
            font-size: 1rem;
            color: #666666;
            border-left: 3px solid #0a0a0a;
            padding-left: 1.2rem;
        }

        /* ── CARDS GRID ── */
        .cards-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        /* ── PROJECT CARD ── */
        .project-card {
            position: relative;
            overflow: hidden;
            border: 1px solid #d0d0d0;
            border-radius: 8px;
            background-color: #ffffff;
            cursor: pointer;
            transition:
                border-color 0.5s ease,
                box-shadow 0.5s ease,
                transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
            will-change: transform, box-shadow;
        }

        /* ── SWEEP SHINE ── */
        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -120%;
            width: 60%;
            height: 100%;
            background: linear-gradient(
                110deg,
                transparent 10%,
                rgba(255, 255, 255, 0.35) 40%,
                rgba(255, 255, 255, 0.65) 50%,
                rgba(255, 255, 255, 0.35) 60%,
                transparent 90%
            );
            transform: skewX(-20deg);
            pointer-events: none;
            opacity: 0;
            z-index: 2;
        }

        .project-card:hover {
            border-color: #aaaaaa;
            transform: translateY(-6px);
            box-shadow:
                0 12px 40px rgba(0, 0, 0, 0.1),
                0 4px 10px rgba(0, 0, 0, 0.06),
                inset 0 1px 0 rgba(255, 255, 255, 0.95);
        }

        .project-card.sweep::before {
            animation: sweepShine 1.2s cubic-bezier(0.22, 0.61, 0.36, 1) forwards;
        }

        @keyframes sweepShine {
            0%   { left: -120%; opacity: 0; }
            8%   { opacity: 1; }
            90%  { opacity: 0.6; }
            100% { left: 160%; opacity: 0; }
        }

        /* ── CARD IMAGE ── */
        .card-image {
            width: 100%;
            height: 220px;
            overflow: hidden;
            background-color: #f5f5f5;
            position: relative;
        }

        .card-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.5s ease;
        }

        .project-card:hover .card-image img {
            transform: scale(1.05);
        }

        .card-image-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f0f0f0;
            color: #aaaaaa;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
        }

        /* ── CARD BODY ── */
        .card-body {
            padding: 1.5rem;
        }

        .card-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.4rem;
            margin-bottom: 1rem;
        }

        .card-tag {
            padding: 0.25rem 0.7rem;
            background-color: #f5f5f5;
            border: 1px solid #e0e0e0;
            border-radius: 3px;
            font-size: 0.7rem;
            color: #777777;
            letter-spacing: 1px;
            text-transform: uppercase;
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #0a0a0a;
            margin-bottom: 0.6rem;
        }

        .card-desc {
            font-size: 0.9rem;
            color: #666666;
            line-height: 1.7;
            margin-bottom: 1.5rem;
        }

        /* ── CARD FOOTER ── */
        .card-footer {
            display: flex;
            gap: 0.8rem;
            padding: 1rem 1.5rem;
            border-top: 1px solid #eeeeee;
        }

        .card-btn {
            flex: 1;
            padding: 0.6rem 1rem;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: inherit;
        }

        .card-btn-primary {
            background-color: #0a0a0a;
            color: #ffffff;
            border: 2px solid #0a0a0a;
        }

        .card-btn-primary:hover {
            background-color: #333333;
            border-color: #333333;
        }

        .card-btn-outline {
            background-color: transparent;
            color: #0a0a0a;
            border: 2px solid #0a0a0a;
        }

        .card-btn-outline:hover {
            background-color: #0a0a0a;
            color: #ffffff;
        }

        /* ── PREVIEW MODAL ── */
        .preview-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(10, 10, 10, 0.92);
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
            background-color: #111111;
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
            color: #cccccc;
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
        @media (max-width: 1200px) {
            .projects-section { padding: 8rem 5rem 5rem; }
        }

        @media (max-width: 1000px) {
            .projects-section { padding: 8rem 3rem 5rem; }
            .cards-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 640px) {
            .projects-section { padding: 7rem 1.5rem 3rem; }
            .projects-header h1 { font-size: 2.6rem; }
            .cards-grid { grid-template-columns: 1fr; }
        }

        @media (max-width: 420px) {
            .projects-header h1 { font-size: 2rem; }
        }
    </style>
</head>
<body>

    {{-- NAVBAR COMPONENT --}}
    <x-navbar />

    <!-- PAGE WRAPPER -->
    <div class="page-wrapper">
        <section class="projects-section">

            <!-- HEADER -->
            <div class="projects-header">
                <h1>Projects</h1>
                <p>A collection of games, websites, and applications I've built.</p>
            </div>

            <!-- ══════════ ALL PROJECTS ══════════ -->
            <div class="cards-grid">

                <!-- CARD — Godot Game -->
                <div class="project-card">
                    <div class="card-image">
                        <img src="{{ asset('images/project_game_1.png') }}" alt="Project One"
                             onerror="this.parentElement.innerHTML='<div class=\'card-image-placeholder\'>No Image</div>'">
                    </div>
                    <div class="card-body">
                        <div class="card-tags">
                            <span class="card-tag">🎮 Godot</span>
                            <span class="card-tag">⚙️ GDScript</span>
                        </div>
                        <h2 class="card-title">Project Title One</h2>
                        <p class="card-desc">
                            A short description of this project. What it does,
                            what you learned, and what makes it interesting.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="{{ asset('games/project1/first-game.html') }}"
                        class="card-btn card-btn-primary"
                        target="_blank">Live Demo</a>
                        <a href="#"
                           class="card-btn card-btn-outline"
                           target="_blank">GitHub</a>
                    </div>
                </div>

                <!-- CARD — Flutter App (Canteen Ordering App) -->
                <div class="project-card">
                    <div class="card-image">
                        <img src="{{ asset('CanteenOrderingAppPreview/canteen-ordering-app-preview-1.jpg') }}" alt="Canteen Ordering App"
                             onerror="this.parentElement.innerHTML='<div class=\'card-image-placeholder\'>No Image</div>'">
                    </div>
                    <div class="card-body">
                        <div class="card-tags">
                            <span class="card-tag">💙 Flutter</span>
                            <span class="card-tag">📱 Mobile</span>
                        </div>
                        <h2 class="card-title">Canteen Ordering App</h2>
                        <p class="card-desc">
                            A mobile ordering app built for Olivarez College Tagaytay using Flutter, with Firebase
                            powering the backend and authentication. I only used
                            Supabase for storing and serving images.
                        </p>
                    </div>
                    <div class="card-footer">
                        <button type="button" class="card-btn card-btn-primary" onclick="openPreview()">Preview</button>
                        <a href="#" class="card-btn card-btn-outline" target="_blank">GitHub</a>
                    </div>
                </div>

                <!-- CARD — Meeko's Haven (CRUD Website) -->
                <div class="project-card">
                    <div class="card-image">
                        <div class="card-image-placeholder">No Image</div>
                    </div>
                    <div class="card-body">
                        <div class="card-tags">
                            <span class="card-tag">🐘 PHP</span>
                            <span class="card-tag">🔄 AJAX</span>
                            <span class="card-tag">💛 jQuery</span>
                            <span class="card-tag">⚡ JavaScript</span>
                        </div>
                        <h2 class="card-title">Meeko's Haven</h2>
                        <p class="card-desc">
                            A school project built with PHP, AJAX, jQuery, and JavaScript.
                        </p>
                    </div>
                    <div class="card-footer">
                        <a href="#" class="card-btn card-btn-primary" style="opacity:0.5; pointer-events:none; cursor:default;">Live Demo</a>
                        <a href="#" class="card-btn card-btn-outline" target="_blank">GitHub</a>
                    </div>
                </div>

            </div>

        </section>
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
        /* ── CARD SWEEP SHINE ── */
        const cards = document.querySelectorAll('.project-card');
        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.classList.remove('sweep');
                void card.offsetWidth;
                card.classList.add('sweep');
            });
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
    </script>

</body>
</html>