{{-- resources/views/components/navbar.blade.php --}}

<style>
    /* NAVBAR */
    nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 1.5rem 5rem;
        position: fixed;
        width: 100%;
        top: 0;
        background-color: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(8px);
        -webkit-backdrop-filter: blur(8px);
        border-bottom: 1px solid #e0d9ff;
        z-index: 100;
    }

    nav .logo {
        display: flex;
        align-items: center;
        text-decoration: none;
    }

    nav .logo img {
        width: 44px;
        height: 44px;
        object-fit: cover;
        border-radius: 50%;
        border: 2px solid transparent;
        background:
            linear-gradient(#ffffff, #ffffff) padding-box,
            linear-gradient(135deg, #6366f1, #a855f7, #ec4899) border-box;
        padding: 2px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    nav .logo img:hover {
        transform: scale(1.06);
        box-shadow: 0 4px 14px rgba(139, 92, 246, 0.3);
    }

    nav ul {
        list-style: none;
        display: flex;
        gap: 2.5rem;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
    }

    nav ul a {
        color: #55506e;
        text-decoration: none;
        font-size: 0.9rem;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: color 0.3s, background 0.3s, box-shadow 0.3s;
        padding: 0.4rem 1rem;
        border-radius: 50px;
    }

    nav ul a:hover {
        color: #6d28d9;
    }

    nav ul a.active {
        background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        color: #ffffff;
        box-shadow: 0 6px 16px rgba(139, 92, 246, 0.3);
    }

    /* HAMBURGER BUTTON */
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
        width: 40px;
        height: 40px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.3rem;
        z-index: 200;
        border-radius: 50%;
        transition: background-color 0.3s ease;
        -webkit-tap-highlight-color: transparent;
    }

    .hamburger:active {
        background-color: #f5f3ff;
    }

    .hamburger span {
        display: block;
        width: 22px;
        height: 2px;
        background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        border-radius: 2px;
        transition: transform 0.4s cubic-bezier(0.68, -0.4, 0.27, 1.4),
                    opacity 0.3s ease,
                    width 0.3s ease;
    }

    .hamburger.open span:nth-child(1) {
        transform: translateY(6.5px) rotate(45deg);
    }

    .hamburger.open span:nth-child(2) {
        opacity: 0;
        width: 0;
    }

    .hamburger.open span:nth-child(3) {
        transform: translateY(-6.5px) rotate(-45deg);
    }

    /* MOBILE OVERLAY MENU */
    .dropdown-menu {
        position: fixed;
        inset: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(255, 255, 255, 0.98);
        backdrop-filter: blur(14px);
        -webkit-backdrop-filter: blur(14px);
        z-index: 99;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;

        /* hidden by default */
        visibility: hidden;
        opacity: 0;
        pointer-events: none;
        transition: opacity 0.4s cubic-bezier(0.22, 1, 0.36, 1),
                    visibility 0.4s;
    }

    .dropdown-menu.open {
        visibility: visible;
        opacity: 1;
        pointer-events: auto;
    }

    .dropdown-menu a {
        color: #55506e;
        text-decoration: none;
        font-size: 1.4rem;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        font-family: inherit;
        padding: 0.85rem 2.5rem;
        width: auto;
        text-align: center;
        border-radius: 50px;
        transition: background 0.3s, color 0.3s, transform 0.2s;

        /* staggered entrance animation */
        opacity: 0;
        transform: translateY(18px);
    }

    .dropdown-menu.open a {
        animation: navLinkIn 0.5s cubic-bezier(0.22, 1, 0.36, 1) forwards;
    }

    .dropdown-menu.open a:nth-child(1) { animation-delay: 0.08s; }
    .dropdown-menu.open a:nth-child(2) { animation-delay: 0.14s; }
    .dropdown-menu.open a:nth-child(3) { animation-delay: 0.20s; }
    .dropdown-menu.open a:nth-child(4) { animation-delay: 0.26s; }

    @keyframes navLinkIn {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .dropdown-menu a:active {
        transform: scale(0.96);
    }

    .dropdown-menu a:hover {
        background-color: #f5f3ff;
        color: #6d28d9;
    }

    .dropdown-menu a.active {
        background: linear-gradient(90deg, #6366f1, #a855f7, #ec4899);
        color: #ffffff;
        box-shadow: 0 8px 20px rgba(139, 92, 246, 0.3);
    }

    /* lock background scroll while menu is open */
    body.nav-open {
        overflow: hidden;
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {
        nav { padding: 1.2rem 2.5rem; }
    }

    @media (max-width: 768px) {
        nav { padding: 1.2rem 2rem; }
        nav ul { display: none; }
        .hamburger { display: flex; }
    }

    @media (max-width: 420px) {
        nav { padding: 1rem 1.2rem; }
        nav .logo img { width: 38px; height: 38px; }
        .dropdown-menu a { font-size: 1.2rem; padding: 0.7rem 2rem; }
    }
</style>

<!-- DESKTOP NAVBAR -->
<nav id="main-nav">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('images/website_logo.png') }}" alt="Monjhie Dulay Logo">
    </a>
    <ul>
        <li><a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
        <li><a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a></li>
    </ul>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu" aria-expanded="false">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<!-- MOBILE OVERLAY MENU -->
<div class="dropdown-menu" id="dropdownMenu">
    <a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a>
    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
    <a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a>
    <a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a>
</div>

<script>
    const hamburger = document.getElementById('hamburger');
    const dropdownMenu = document.getElementById('dropdownMenu');

    function toggleMenu() {
        const isOpen = hamburger.classList.toggle('open');
        dropdownMenu.classList.toggle('open');
        document.body.classList.toggle('nav-open');
        hamburger.setAttribute('aria-expanded', isOpen);
    }

    function closeMenu() {
        hamburger.classList.remove('open');
        dropdownMenu.classList.remove('open');
        document.body.classList.remove('nav-open');
        hamburger.setAttribute('aria-expanded', 'false');
    }

    hamburger.addEventListener('click', toggleMenu);

    /* close when a link is clicked */
    dropdownMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', closeMenu);
    });

    /* close when clicking outside the links (on the overlay background) */
    dropdownMenu.addEventListener('click', (e) => {
        if (e.target === dropdownMenu) closeMenu();
    });

    /* close on Escape key */
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeMenu();
    });

    /* close automatically if window is resized back to desktop width */
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768 && dropdownMenu.classList.contains('open')) {
            closeMenu();
        }
    });
</script>