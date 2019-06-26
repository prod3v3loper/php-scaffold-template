<nav role="navigation"  id="mb-nav" class="mb-night-nav mb-col-24">
    <div class="mb-nav--inner">
        <div class="mb-container">
            <a class="mb-nav--brand" href="#">Melabuai MVC Advanced</a>
            <ul class="mb-nav--navbar mb-nav--list">
                <li class="mb-nav--navbar-item"><a <?php echo isset($active) && $active == 'home' ? 'class="mb-nav--active"' : '' ?> href="index.php?p=home">Home</a></li>
                <li class="mb-nav--navbar-item"><a <?php echo isset($active) && $active == 'about' ? 'class="mb-nav--active"' : '' ?> href="index.php?p=about">About</a></li>
                <li class="mb-nav--navbar-item"><a <?php echo isset($active) && $active == 'blog' ? 'class="mb-nav--active"' : '' ?> href="index.php?p=blog">Blog</a></li>
                <li class="mb-nav--navbar-item"><a <?php echo isset($active) && $active == 'contact' ? 'class="mb-nav--active"' : '' ?> href="index.php?p=contact">Contact</a></li>
                <li class="mb-nav--navbar-item"><a <?php echo isset($active) && $active == 'support' ? 'class="mb-nav--active"' : '' ?> href="index.php?p=support">Support</a></li>
            </ul>
            <a class="mb-nav--mobile-btn mb-nav--show" href="#mb-nav"><span></span><span></span><span></span></a>
            <a class="mb-nav--mobile-btn mb-nav--hide" href="#"><span></span><span></span><span></span></a>
        </div>
    </div>
</nav>