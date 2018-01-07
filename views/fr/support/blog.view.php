 <div id="content">
                <div class="container background-white">
                    <div class="row margin-vert-30">
                        <!-- Main Column -->
                        <div class="col-md-12">
                            <!-- Blog Post -->
                            <?php 
                            $req = $GLOBALS['bdd']->prepare('SELECT * FROM blog WHERE etat = 1 ORDER BY date DESC');
                            $req->execute();
                            while($donnees = $req->fetch()){?>

                            <div class="blog-post padding-bottom-20">
                                <div class="blog-item-header">
                                    <h2>
                                        <a href="#">
                                            <?php echo $donnees['titre'] ?>
                                        </a>
                                    </h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="blog-post-details">
                                    <div class="blog-post-details-item blog-post-details-item-left">
                                        <i class="fa fa-user color-gray-light"></i>
                                        <a href="#"><?php echo $donnees['auteur'] ?></a>
                                    </div>
                                    <div class="blog-post-details-item blog-post-details-item-left">
                                        <i class="fa fa-calendar color-gray-light"></i>
                                        <span><?php echo $donnees['date'] ?></span>
                                    </div>
                                    <div class="blog-post-details-item blog-post-details-item-left blog-post-details-tags">
                                        <i class="fa fa-tag color-gray-light"></i>
                                        <span><?php echo $donnees['categorie'] ?></span>
                                    </div>
                                </div>
                                <div class="blog">
                                    <div class="clearfix"></div>
                                    <div class="blog-post-body row margin-top-15">
                                        <div class="col-md-4">
                                            <img class="col-md-12" src="/ressources/images/blog/<?php echo $donnees['image'] ?>" alt="Image">
                                        </div>
                                        <div class="col-md-8">
                                            <p>
                                                <?php echo $donnees['texte'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                            }
                            ?>
                            

                            <!-- Pagination -
                            <ul class="pagination">
                                <li>
                                    <a href="#">&laquo;</a>
                                </li>
                                <li class="active">
                                    <a href="#">1</a>
                                </li>
                                <li>
                                    <a href="#">2</a>
                                </li>
                                <li>
                                    <a href="#">3</a>
                                </li>
                                <li class="disabled">
                                    <a href="#">4</a>
                                </li>
                                <li>
                                    <a href="#">5</a>
                                </li>
                                <li>
                                    <a href="#">&raquo;</a>
                                </li>
                            </ul>
                            <!-- End Pagination -->
                        </div>
                        <!-- End Main Column -->
                        <!-- Side Column -->
                        <div class="col-md-3">
                            <!-- Blog Tags --
                            <div class="blog-tags">
                                <h3>Tags</h3>
                                <ul class="blog-tags">
                                    <li>
                                        <a href="#" class="blog-tag">HTML</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">CSS</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">JavaScript</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">jQuery</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">PHP</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">Ruby</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">CoffeeScript</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">Grunt</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">Bootstrap</a>
                                    </li>
                                    <li>
                                        <a href="#" class="blog-tag">HTML5</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Blog Tags -->
                            <!-- Recent Posts --
                            <div class="recent-posts">
                                <h3>Recent Posts</h3>
                                <ul class="posts-list margin-top-10">
                                    <li>
                                        <div class="recent-post">
                                            <a href="">
                                                <img class="pull-left" src="assets/img/blog/thumbs/thumb1.jpg" alt="thumb1">
                                            </a>
                                            <a href="#" class="posts-list-title">Sidebar post example</a>
                                            <br>
                                            <span class="recent-post-date">
                                                July 30, 2013
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="recent-post">
                                            <a href="">
                                                <img class="pull-left" src="assets/img/blog/thumbs/thumb2.jpg" alt="thumb2">
                                            </a>
                                            <a href="#" class="posts-list-title">Sidebar post example</a>
                                            <br>
                                            <span class="recent-post-date">
                                                July 30, 2013
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="recent-post">
                                            <a href="">
                                                <img class="pull-left" src="assets/img/blog/thumbs/thumb3.jpg" alt="thumb3">
                                            </a>
                                            <a href="#" class="posts-list-title">Sidebar post example</a>
                                            <br>
                                            <span class="recent-post-date">
                                                July 30, 2013
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                    <li>
                                        <div class="recent-post">
                                            <a href="">
                                                <img class="pull-left" src="assets/img/blog/thumbs/thumb4.jpg" alt="thumb4">
                                            </a>
                                            <a href="#" class="posts-list-title">Sidebar post example</a>
                                            <br>
                                            <span class="recent-post-date">
                                                July 30, 2013
                                            </span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Recent Posts -->
                        </div>
                        <!-- End Side Column -->
                    </div>
                </div>
            </div>
            <!-- === END CONTENT === -->
           