<div class="navbar-right">
    <ul class="nav navbar-nav">
        <?php if ( !isset( $_SESSION[ 'user' ] ) ): ?>
            <li>
                <a href="?a=getLogin&r=user">Log in</a>
            </li>
            <li>
                <a href="?a=getRegister&r=user">Register</a>
            </li>
        <?php else: ?>
        <?php $user = json_decode( $_SESSION[ 'user' ] ); ?>
            <li>
                <a href="#">Connected as <?php echo $user -> name; ?></a>
            </li>
            <li>
                <a href="?a=getLogout&r=user">Log out</a>
            </li>
        <?php endif; ?>
    </ul>
</div>
