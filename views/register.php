<div class="wrap">
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Mucht Books</a>
                    <button class="navbar-toggle" data-target="#navbar-main" data-toggle="collapse" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="../index.html">Home</a>
                        </li>
                        <li>
                            <a href="./indexBooks.html">Books</a>
                        </li>
                        <li>
                            <a href="./indexAuthors.html">Authors</a>
                        </li>
                        <li>
                            <a href="./indexEditors.html">Editors</a>
                        </li>
                    </ul>
                    <?php include( "partials/_connect.php" ); ?>
                </div>
            </div>
        </nav>
    </header>
    <div class="container">
        <form class="form-horizontal col-xs-7 center" action="index.php" method="post">
            <fieldset class="panel panel-primary">
                <div class="panel-heading">
                    <legend class="panel-heading">Create a count</legend>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="username" class="col-lg-2 control-label">Username</label>
                        <?php if ( isset( $_SESSION[ 'errors' ][ 'username' ] ) ): ?>
                            <div class="error">
                                <p style="color:red;"><?php echo $_SESSION[ 'errors' ][ 'username' ]; ?></p>
                            </div>

                        <?php endif; ?>
                        <div class="col-lg-9">
                            <input type="text"  name="username" value="<?php echo isset( $_SESSION['old_datas']['username'] ) ? $_SESSION['old_datas']['username'] : ''; ?>" class="form-control" id="username" placeholder="Your username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="mail" class="col-lg-2 control-label">Email</label>
                        <?php if ( isset( $_SESSION[ 'errors' ][ 'email' ] ) ): ?>
                            <div class="error">
                                <p style="color:red;"><?php echo $_SESSION[ 'errors' ][ 'email' ]; ?></p>
                            </div>

                        <?php endif; ?>
                        <div class="col-lg-9">
                            <input type="text"  name="email" value="<?php echo isset( $_SESSION['old_datas']['email'] ) ? $_SESSION['old_datas']['email'] : ''; ?>" class="form-control" id="mail" placeholder="Your e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="col-lg-2 control-label">Password</label>
                        <?php if ( isset( $_SESSION[ 'errors' ][ 'password' ] ) ): ?>
                            <div class="error">
                                <p style="color:red;"><?php echo $_SESSION[ 'errors' ][ 'password' ]; ?></p>
                            </div>

                        <?php endif; ?>
                        <div class="col-lg-9">
                            <input type="password" name="password" value="<?php echo isset( $_SESSION['old_datas']['password'] ) ? $_SESSION['old_datas']['password'] : ''; ?>" class="form-control" id="pwd" placeholder="Password">
                            <span class="help-block">Minimum 6 characters</span>
                        </div>
                    </div>
                    <div class="form-group pull-right">
                        <div class="col-lg-12">
                            <input type="submit" name="Register now" value="Register" class="btn btn-primary">
                        </div>
                    </div>
                    <input type="hidden" name="a" value="postRegister">
                    <input type="hidden" name="r" value="user">
                </div>
            </fieldset>
        </form>
        <?php if ( isset( $_SESSION[ 'errors' ] ) ): ?>
            <?php unset( $_SESSION[ 'errors' ] ); ?>
            <?php unset( $_SESSION[ 'old_datas' ] ); ?>
        <?php endif; ?>
    </div>
</div>
