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
            <li><a href="?a=index&r=editors">Editors</a></li>
            <li class="active"><?php echo $datas[ 'editor' ] -> name; ?></li>
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
                                <a href="?a=show&r=editors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
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
                          <h2><?php echo $datas[ 'editor' ] -> name; ?></h2>
                          <p>
                              <a href="<?php echo $data[ 'editor' ] -> url; ?>" class="btn btn-warning pull-right" rel="external">Official website</a>
                          </p>
                      </div>
                      <div class="panel-body">
                          <img class="col-lg-3 clearfix covers list-item" src="<?php echo $datas[ 'editor' ] -> logo; ?>" alt="Author's photo"/>
                          <div class="col-lg-9 clearfix">

                              <?php if ( $datas[ 'editor' ] -> summary ): ?>
                                  <div>
                                      <?php echo $datas[ 'editor' ] -> summary; ?>
                                  </div>
                              <?php endif; ?>

                          </div>
                      </div>
                    </div>
                </section>
                <section>
                    <?php // if( $datas[ 'books' ] ): ?>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h2 class="panel-title">Editor's books</h2>
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
                    <?php // endif; ?>
                    <?php // if( $datas[ 'authors' ] ): ?>
                        <div class="col-lg-6">
                            <div class="panel panel-primary">
                              <div class="panel-heading">
                                <h2 class="panel-title">Editor's authors</h2>
                              </div>
                              <div class="panel-body">
                                  <ul class="list-group">
                                      <?php foreach( $datas[ 'authors' ] as $author ): ?>
                                          <li class="list-group-item">
                                            <a href="?a=show&r=authors&id=<?php echo $editor -> id; ?>&with=editors,books"><?php echo $author -> name; ?></a>
                                          </li>
                                      <?php endforeach; ?>
                                  </ul>
                              </div>
                            </div>
                        </div>
                    <?php // endif; ?>
                </section>
            </div>
        </div>
    </div>
</div>
