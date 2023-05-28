<header class="navbar-section">
    <nav class="navbar">
        <div class="nav-links">
            <div class="logo"><a href="/" style="color: inherit;text-decoration:inherit">Logo</a></div>
            <div class="navbar-right">

                <?php if(isset($_SESSION['user'])): ?>
                    <span id="navbar-user">Hello, <?php echo e($_SESSION['user']); ?></span>
                    <a href="/create-post" class="nav-link">Create post</a>
                    <a href="/imprint" class="nav-link">Imprint</a>
                    <a href="/logout" class="nav-link">Logout</a>
                <?php else: ?>
                    <a href="/login" class="nav-link" id="login">Login</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>
</header>

<?php /**PATH /Users/faridrzayev/Desktop/packs 2/app/views/template/navbar.blade.php ENDPATH**/ ?>