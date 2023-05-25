<header class="navbar-section">
    <nav class="navbar">
        <div class="nav-links">
            <div class="logo"><a href="/" style="color: inherit;text-decoration:inherit">Logo</a></div>
            <div class="navbar-right">

                @isset($_SESSION['user'])
                    <span id="navbar-user">Hello, {{ $_SESSION['user'] }}</span>
                    <a href="/create-post" class="nav-link">Create post</a>
                    <a href="/logout" class="nav-link">Logout</a>
                @else
                    <a href="/login" class="nav-link" id="login">Login</a>
                @endisset
            </div>
        </div>
    </nav>
</header>

