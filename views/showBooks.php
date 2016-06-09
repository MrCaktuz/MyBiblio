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
                    <li class="active">
                        <a href="?a=index&r=books">Books</a>
                    </li>
                    <li>
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
            <li><a href="?a=index&r=books">Home</a></li>
            <li class="active"><?php echo $datas[ 'book' ] -> title; ?></li>
        </ul>
        <aside>
            <div class="col-lg-3">
                <div class="panel panel-primary">
                  <div class="panel-heading">
                    <h2 class="panel-title">Books available</h2>
                  </div>
                  <div class="panel-body">
                      <ul class="list-group">
                          <?php foreach ( $datas[ 'booksList' ] as $book ) :?>
                              <li class="list-group-item">
                                <a href="?a=show&r=books&id=<?php echo $book -> id; ?>&with=authors,editors"><?php echo $book -> title; ?></a>
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
                          <h2><?php echo $datas[ 'book' ] -> title; ?></h2>
                          <p>
                              <a href="http://amazone.com" class="btn btn-warning pull-right" rel="external">Find it on amazone</a>
                          </p>
                      </div>
                      <div class="panel-body">
                          <img class="col-lg-3 clearfix covers list-item" src="<?php echo $datas[ 'book' ] -> cover; ?>" alt="book cover"/>
                          <div class="col-lg-9 clearfix">
                              <?php if( $datas[ 'authors' ] ): ?>
                                  <p><strong>Written by :</strong>
                                      <?php foreach( $datas[ 'authors' ] as $author ): ?>
                                              <a href="?a=show&e=authors&id=<?php echo $author -> id; ?>&with=books,editors"><?php echo $author -> name; ?></a>
                                      <?php endforeach; ?>
                                  </p>
                              <?php endif; ?>

                              <?php if( $datas[ 'editors' ] ): ?>
                                  <p><strong>Edited by :</strong>
                                      <?php foreach( $datas[ 'editors' ] as $editor ): ?>
                                              <a href="?a=show&e=editors&id=<?php echo $editor -> id; ?>&with=books,authors"><?php echo $editor -> name; ?></a>
                                      <?php endforeach; ?>
                                  </p>
                              <?php endif; ?>

                              <?php if ( $datas[ 'book' ] -> summary ): ?>
                                  <div>
                                      <?php echo $datas[ 'book' ] -> summary; ?>
                                  </div>
                              <?php endif; ?>

                          </div>
                      </div>
                    </div>
                </section>
                <section>
                    <div>
                        <div class="panel panel-default">
                            <?php if ( $datas[ 'comments' ] ): ?>
                                <div class="panel-heading">
                                    <h2>Comments</h2>
                                </div>
                                <div class="panel-body">
                                    <?php foreach( $datas[ 'comments' ] as $comment ): ?>
                                        <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <p>
                                                    <strong><?php echo $comment -> author; ?></strong>
                                                </p>
                                                <p>
                                                    <small><?php echo $comment -> created_at; ?></small>
                                                </p>
                                            </div>
                                            <div class="panel-body" id="panel-body--form">
                                                <?php echo $comment -> comment; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                            <form class="form-horizontal panel panel-default" action="index.php" method="post">
                              <fieldset>
                                  <div class="panel-heading">
                                      <legend>Whrite a comment</legend>
                                  </div>
                                  <div class="panel-body clearfix">
                                      <div class="form-group">
                                          <label for="author" class="col-lg-2 control-label">Name</label>
                                              <?php if ( isset( $_SESSION[ 'errors' ][ 'author' ] ) ): ?>
                                                  <div class="error">
                                                      <p style="color:red;"><?php echo $_SESSION[ 'errors' ][ 'author' ]; ?></p>
                                                  </div>
                                              <?php endif; ?>
                                          <div class="col-lg-10">
                                              <input type="text" name="author" class="form-control" id="author" placeholder="Your name">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label for="comment" class="col-lg-2 control-label">Comment</label>
                                          <?php if ( isset( $_SESSION[ 'errors' ][ 'comment' ] ) ): ?>
                                              <div class="error">
                                                  <p style="color:red;"><?php echo $_SESSION[ 'errors' ][ 'comment' ]; ?></p>
                                              </div>
                                          <?php endif; ?>
                                          <div class="col-lg-10">
                                              <textarea style="resize: vertical;" class="form-control" name="comment" rows="3" id="comment"  placeholder="Your comment here..."></textarea>
                                          </div>
                                      </div>
                                      <div class="form-group pull-right">
                                          <div class="col-lg-12">
                                              <?php
                                            //   var_dump( $_POST[ 'author' ] );
                                            //   var_dump( $_POST[ 'comment' ] );
                                            //   var_dump( $datas[ 'book' ] -> id );
                                               ?>
                                              <button type="submit" class="btn btn-primary">Send</button>
                                              <button type="reset" class="btn btn-default">Cancel</button>
                                          </div>
                                      </div>
                                      <div class="hidden-input">
                                          <input type="hidden" name="id" value="<?php echo $datas[ 'book' ] -> id; ?>">
                                          <input type="hidden" name="a" value="postComment">
                                          <input type="hidden" name="r" value="comments">
                                      </div>
                                  </div>
                              </fieldset>
                            </form>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
