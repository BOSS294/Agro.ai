<nav>
        <div class="logo">Agro Products AI</div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="nav-links">
            <a href="#home"><span class="material-icons">home</span> Home</a>
            <a href="#forms"><span class="material-icons">book</span> Forms</a>
            <a href="#contact"><span class="material-icons">contact_mail</span> Contact</a>
            <a href="#about"><span class="material-icons">info</span> About Us</a>
        </div>
    </nav>
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('show');
        }
    </script>