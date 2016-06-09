<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="?a=home&r=pages">Mucht Books</a>
            </div>
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="?a=home&r=pages">Home</a>
                    </li>
                    <li>
                        <a href="?a=admin&r=pages">Books</a>
                    </li>
                    <li>
                        <a href="?a=admin&r=pages">Authors</a>
                    </li>
                    <li>
                        <a href="?a=admin&r=pages">Editors</a>
                    </li>
                </ul>

                <?php include( "partials/_connect.php" ); ?>

            </div>
        </div>
    </nav>
</header>
<div class="container">
    <div class="page-header">
        <h1>Home page</h1>
    </div>
    <div class="jumbotron">
        <h1>Welcome to Mucht Books</h1>
        <p>Feel free to check our books don't be afraid to register to have all access on our features</p>
        <p><a href="?a=getRegister&r=user" class="btn btn-primary btn-lg">Register</a></p>
    </div>
    <section class="booksSection">
        <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Lastest books</h3>
              </div>
              <div class="panel-body">
                  <ol class="list-group">
                      <?php foreach ( $datas[ 'lastBooks' ] as $book ) :?>
                              <li class="list-group-item"><a href="?a=admin&e=pages&id=<?php echo $book -> id; ?>"><?php echo $book -> title; ?></a></li> <!--tous les liens pointe vers le index.-->
                      <?php endforeach; ?>

                      <li class="list-group-item"><a class="btn btn-primary" href="?a=admin&r=pages">See more ...</a></li>
                  </ol>
              </div>
            </div>
        </div>
    </section>
    <section class="AuthorsSection">
        <div class="col-lg-6">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title">Lastest authors</h3>
              </div>
              <div class="panel-body">
                  <ol class="list-group">
                      <?php foreach ( $datas[ 'lastAuthors' ] as $author ) :?>
                              <li class="list-group-item"><a href="index.php?a=admin&e=pages&id=<?php echo $author -> id; ?>"><?php echo $author -> name; ?></a></li> <!--tous les liens pointe vers le index.-->
                      <?php endforeach; ?>
                      <li class="list-group-item"><a class="btn btn-primary" href="">See more ...</a></li>
                  </ol>
              </div>
            </div>
        </div>
    </section>
</div>
</div>
