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
                    <li>
                        <a href="?a=index&r=authors">Authors</a>
                    </li>
                    <li class="active">
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
            <li class="active">Editors</li>
        </ul>
        <aside>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h2 class="panel-title">Editors available</h2>
                  </div>
                  <div class="panel-body">
                      <ul class="list-group">
                          <?php foreach ( $datas[ 'editorsList' ] as $editor ) :?>
                              <li class="list-group-item">
                                <a href="?a=show&e=authors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
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
                          <h2>Last added editors</h2>
                      </div>
                      <div class="panel-body">
                          <ol class="list-group">
                              <?php foreach ( $datas[ 'editors' ] as $editor ) :?>
                                  <li class="list-group-item clearfix">
                                      <a href="?a=show&r=editors&id=<?php echo $editor -> id ?>&with=books,authors">
                                          <h3><?php echo $editor -> name; ?></h3>
                                          <img class="col-lg-3 clearfix covers list-item" src="<?php echo $editor -> logo; ?>" alt="Editor's logo" />
                                      </a>
                                      <div class="col-lg-9 clearfix">
                                          <h4>About this editor</h4>
                                          <p class="list-item">
                                              <?php echo $editor -> summary; ?>
                                          </p>
                                          <p class="list-item">
                                              <a href="?a=show&r=editors&id=<?php echo $editor -> id ?>&with=books,authors" class="btn btn-primary btn-xs">Read more</a>
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
