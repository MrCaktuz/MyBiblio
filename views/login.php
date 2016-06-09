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
                    <legend class="panel-heading">Log in</legend>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="mail" class="col-lg-2 control-label">Email</label>
                        <div class="col-lg-9">
                            <input type="text"  name="email" class="form-control" id="mail" placeholder="Your e-mail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pwd" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-9">
                            <input type="password" name="password" class="form-control" id="pwd" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-group col-lg-6 pull-right">
                        <div>
                            <input type="submit" name="Log in now" value="Login" class="btn btn-primary">
                            <a class="btn btn-primary" href="?a=getRegister&r=user">Register for free</a>
                        </div>
                    </div>
                    <input type="hidden" name="a" value="postLogin">
                    <input type="hidden" name="r" value="user">
                </div>
            </fieldset>
        </form>
    </div>
</div>
