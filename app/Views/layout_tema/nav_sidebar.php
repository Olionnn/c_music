            <div class="sidebar-content">
                <!-- sidebar-brand  -->
                <div class="sidebar-item sidebar-brand">
                    <a href="#">Cahaya Music</a>
                </div>
                <!-- sidebar-header  -->
                <!-- <div class="sidebar-item sidebar-header d-flex flex-nowrap">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="<?php  echo base_url('assets/dist/img_tema/user.jpg') ?>" alt="User picture">
                    </div>
                    <div class="user-info">
                        <span class="user-name">Jhon
                            <strong>Smith</strong>
                        </span>
                        <span class="user-role">Administrator</span>
                        <span class="user-status">
                            <i class="fa fa-circle"></i>
                            <span>Online</span>
                        </span>
                    </div>
                </div> -->
                <!-- sidebar-search  -->
                <div class="sidebar-item sidebar-search">
                    <div>
                        <div class="input-group">
                            <input type="text" class="form-control search-menu" placeholder="Search...">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar-menu  -->
                <div class=" sidebar-item sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>Extra</span>
                        </li>
                        <li>
                            <a href="<?php echo base_url('Main/Dashboard/index')?>">
                                <i class="fa fa-book"></i>
                                <span class="menu-text">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-calendar"></i>
                                <span class="menu-text">Libary</span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-folder"></i>
                                <span class="menu-text">Playlist</span>
                            </a>
                        </li>
                        <li class="header-menu">
                            <span>Admin Control</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i>
                                <span class="menu-text">Action Adding Item</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li>
                                        <a href="#">Artist
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Genre'es</a>
                                    </li>
                                    <li>
                                        <a href="#">Playlist Artists</a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Songs</a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Users Level</a>
                                    </li>                                    
                                    <li>
                                        <a href="#">Comingg Soon...</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-footer  -->

            <div class="sidebar-footer">
                
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="<?php  echo base_url('assets/dist/img_tema/user.jpg') ?>" alt="Avatar" class="avatarw">
                        <!-- <i class="fa fa-envelope"></i> -->
                        <!-- <span class="badge badge-pill badge-success notification">7</span> -->
                        <span class="badge-sonar"></span>
                    </a>
                    <div class="dropdown-menu messages" aria-labelledby="dropdownMenuMessage">
                        <div class="messages-header">
                            <i class="fa fa-user"></i>
                            Status
                        </div>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-item">
                            <div class="message-content">
                                <div class="pic">
                                    <img src="<?php echo base_url('assets/dist/img_tema/user.jpg') ?>" alt="">
                                </div>
                                <div class="content">
                                    <div class="message-title">
                                        <strong><?= session('user_username') ?></strong>
                                    </div>
                                    <span class="user-role">Administrator</span>
                                    <span class="user-status">
                                        <i class="fa fa-circle"></i>
                                        <span>Online</span>
                                    </span>
                                    <!-- <div class="message-detail">Lorem ipsum dolor sit amet consectetur adipisicing
                                        elit. In totam explicabo</div> -->
                                </div>
                            </div>

                        </div>

                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-center" href="#">Account Setting</a>

                    </div>
                </div>
                <div class="dropdown">
                    <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-cog"></i>
                        <!-- <span class="badge-sonar"></span> -->
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuMessage">
                        <a class="dropdown-item" href="#">My profile</a>
                        <a class="dropdown-item" href="<?php echo base_url('Main/Users/index') ?>">Users</a>
                        <a class="dropdown-item" href="<?php echo base_url('Main/Setting') ?>">Setting</a>
                    </div>
                </div>
                <div>
                    <a href="<?php echo base_url('Auth/logout') ?>">
                        <i class="fa fa-power-off"></i>
                    </a>
                </div>
                <div class="pinned-footer">
                    <a href="#">
                        <i class="fas fa-ellipsis-h"></i>
                    </a>
                </div>
            </div>
