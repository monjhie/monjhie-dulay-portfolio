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
        border-bottom: 1px solid #e0e0e0;
        z-index: 100;
    }

    nav .logo {
        font-size: 1.5rem;
        font-weight: 700;
        color: #0a0a0a;
        letter-spacing: 2px;
        text-decoration: none;
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
        color: #555555;
        text-decoration: none;
        font-size: 0.9rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        transition: color 0.3s, background 0.3s;
        padding: 0.4rem 1rem;
        border-radius: 4px;
    }

    nav ul a:hover {
        color: #0a0a0a;
    }

    nav ul a.active {
        background-color: #0a0a0a;
        color: #ffffff;
    }

    /* HAMBURGER BUTTON */
    .hamburger {
        display: none;
        flex-direction: column;
        justify-content: center;
        gap: 5px;
        background: none;
        border: none;
        cursor: pointer;
        padding: 0.3rem;
        z-index: 200;
    }

    .hamburger span {
        display: block;
        width: 24px;
        height: 2px;
        background-color: #0a0a0a;
        border-radius: 2px;
        transition: transform 0.35s ease, opacity 0.35s ease;
    }

    .hamburger.open span:nth-child(1) {
        transform: translateY(7px) rotate(45deg);
    }

    .hamburger.open span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.open span:nth-child(3) {
        transform: translateY(-7px) rotate(-45deg);
    }

    /* DROPDOWN MENU */
    .dropdown-menu {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        background-color: rgba(255, 255, 255, 0.98);
        border-bottom: 1px solid #e0e0e0;
        z-index: 99;
        flex-direction: column;
        align-items: center;
        padding: 0;

        /* hidden by default */
        display: none;
        opacity: 0;
        transform: translateY(-100%);
        transition: opacity 0.3s ease, transform 0.3s ease;
    }

    .dropdown-menu.open {
        display: flex;
        opacity: 1;
        transform: translateY(0);
    }

    /* spacer so links sit below the navbar */
    .dropdown-spacer {
        width: 100%;
        height: 65px;
        flex-shrink: 0;
    }

    .dropdown-menu a {
        color: #555555;
        text-decoration: none;
        font-size: 0.9rem;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 1rem 2rem;
        width: 100%;
        text-align: center;
        transition: background 0.2s, color 0.2s;
        border-bottom: 1px solid #f0f0f0;
    }

    .dropdown-menu a:last-child {
        border-bottom: none;
    }

    .dropdown-menu a:hover {
        background-color: #f5f5f5;
        color: #0a0a0a;
    }

    .dropdown-menu a.active {
        background-color: #0a0a0a;
        color: #ffffff;
    }

    /* RESPONSIVE */
    @media (max-width: 1100px) {
        nav { padding: 1.2rem 2.5rem; }
    }

    @media (max-width: 768px) {
        nav { padding: 1.2rem 2rem; }
        nav ul { display: none; }
        .hamburger { display: flex; }
        .dropdown-spacer { height: 62px; }
    }

    @media (max-width: 420px) {
        nav { padding: 1rem 1.2rem; }
        nav .logo { font-size: 1.2rem; }
        .dropdown-spacer { height: 58px; }
    }
</style>

<!-- DESKTOP NAVBAR -->
<nav id="main-nav">
    <a href="{{ route('home') }}" class="logo">MD.</a>
    <ul>
        <li><a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a></li>
        <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a></li>
        <li><a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a></li>
        <li><a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a></li>
    </ul>
    <button class="hamburger" id="hamburger" aria-label="Toggle menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
</nav>

<!-- DROPDOWN MENU -->
<div class="dropdown-menu" id="dropdownMenu">
    <!-- spacer matches the navbar height so links don't hide under it -->
    <div class="dropdown-spacer"></div>
    <a href="{{ route('home') }}"     class="{{ request()->routeIs('home')     ? 'active' : '' }}">Home</a>
    <a href="{{ route('projects') }}" class="{{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
    <a href="{{ route('about') }}"    class="{{ request()->routeIs('about')    ? 'active' : '' }}">About</a>
    <a href="{{ route('contact') }}"  class="{{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a>
</div>

<script>
    const hamburger = document.getElementById('hamburger');
    const dropdownMenu = document.getElementById('dropdownMenu');

    hamburger.addEventListener('click', () => {
        hamburger.classList.toggle('open');
        dropdownMenu.classList.toggle('open');
    });

    /* close when a link is clicked */
    dropdownMenu.querySelectorAll('a').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('open');
            dropdownMenu.classList.remove('open');
        });
    });

    /* close when clicking outside */
    document.addEventListener('click', (e) => {
        if (!hamburger.contains(e.target) && !dropdownMenu.contains(e.target)) {
            hamburger.classList.remove('open');
            dropdownMenu.classList.remove('open');
        }
    });
</script>