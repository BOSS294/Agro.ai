<nav>
        <div class="logo">Agro Products AI</div>
        <div class="menu-toggle" onclick="toggleMenu()">
            <div></div>
            <div></div>
            <div></div>
        </div>
        <div class="nav-links">
            <a href="https://juitinitiatives.online/"><span class="material-icons">home</span> Home</a>
            <a href="#forms"><span class="material-icons">book</span> Forms</a>
            <a href="https://juitinitiatives.online/Assets/Pages/contact.php"><span class="material-icons">contact_mail</span> Contact</a>
            <a href="https://juitinitiatives.online/Assets/Pages/about.php"><span class="material-icons">info</span> About Us</a>
        </div>
    </nav>
    <script>
        function toggleMenu() {
            const navLinks = document.querySelector('.nav-links');
            navLinks.classList.toggle('show');
        }
    </script>