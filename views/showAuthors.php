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
            <li><a href="?a=index&r=authors">Authors</a></li>
            <li class="active"><?php echo $datas[ 'author' ] -> name; ?></li>
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
                                <a href="?a=show&r=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a>
                              </li>
                          <?php endforeach; ?>
                      </ul>
                  </div>
                </div>
            </div>
        </aside>
        <div class="content">
            <div class="col-lg-9">
                <section>
                    <div class="panel panel-primary">
                      <div class="panel-heading clearfix">
                          <h2><?php echo $datas[ 'author' ] -> name; ?></h2>
                      </div>
                      <div class="panel-body">
                          <img class="col-lg-3 clearfix covers list-item" src="<?php echo $datas[ 'author' ] -> photo; ?>" alt="Author's photo"/>
                          <div class="col-lg-9 clearfix">

                              <?php if( $datas[ 'editors' ] ): ?>
                                  <p><strong>Edited by :</strong>
                                      <?php foreach( $datas[ 'editors' ] as $editor ): ?>
                                              <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
                                      <?php endforeach; ?>
                                  </p>
                              <?php endif; ?>

                              <?php if ( $datas[ 'author' ] -> bio ): ?>
                                  <div>
                                      <?php echo $datas[ 'author' ] -> bio; ?>
                                  </div>
                              <?php endif; ?>

                          </div>
                      </div>
                    </div>
                </section>
                <section>
                    <?php if( $datas[ 'editors' ] ): ?>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h2 class="panel-title">Author's books</h2>
                              </div>
                              <div class="panel-body">
                                  <ul class="list-group">
                                      <?php foreach( $datas[ 'books' ] as $book ): ?>
                                          <li class="list-group-item">
                                            <a href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                              </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php if( $datas[ 'editors' ] ): ?>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h2 class="panel-title">Author's editors</h2>
                              </div>
                              <div class="panel-body">
                                  <ul class="list-group">
                                      <?php foreach( $datas[ 'editors' ] as $editor ): ?>
                                          <li class="list-group-item">
                                            <a href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=authors,books"><?php echo $editor -> name; ?></a>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                              </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </section>
            </div>
        </div>
    </div>
</div>
