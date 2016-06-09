<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="?a=home&r=pages">Mucht Books</a>
            </div>
            <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="?a=home&r=pages">Home</a>
                    </li>
                    <li>
                        <a href="?a=index&r=books">Books</a>
                    </li>
                    <li class="active">
                        <a href="?a=index&r=authors">Authors</a>
                    </li>
                    <li>
                        <a href="?a=index&r=editors">Editors</a>
                    </li>
                </ul>

                <?php include( "partials/_connect.php" ); ?>

            </div>
        </div>
    </nav>
</header>
<div class="wrap">
    <div class="container">
        <ul class="breadcrumb">
            <li><a href="?a=home&r=page">Home</a></li>
            <li class="active">Authors</li>
        </ul>
        <aside>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h2 class="panel-title">Authors available</h2>
                  </div>
                  <div class="panel-body">
                      <ul class="list-group">
                          <?php foreach ( $datas[ 'authorsList' ] as $author ) :?>
                              <li class="list-group-item">
                                <a href="?a=show&e=authors&id=<?php $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
                </div>
            </div>
        </aside>
        <div class="content">
            <section>
                <div class="col-lg-9">
                    <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h2>Last added authors</h2>
                      </div>
                      <div class="panel-body">
                          <ol class="list-group">
                              <?php foreach ( $datas[ 'authors' ] as $author ) :?>
                                  <li class="list-group-item clearfix">
                                    <a href="?a=show&r=authors&id=<?php echo $author -> id ?>&with=books,editors">
                                      <h3><?php echo $author -> name; ?></h3>
                                      <img class="col-lg-3 clearfix covers list-item" src="<?php echo $author -> photo; ?>" alt="Author photo" />
                                    </a>
                                      <div class="col-lg-9 clearfix">
                                          <h4>About this author</h4>
                                          <p class="list-item">
                                              <?php echo $author -> bio; ?>
                                          </p>
                                          <p class="list-item">
                                              <a href="?a=show&r=authors&id=<?php $author -> id ?>&with=books,editors" class="btn btn-primary btn-xs">Read more</a>
                                          </p>
                                      </div>
                                  </li>
                              <?php endforeach; ?>
                          </ol>
                      </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
