<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
            <div class="sidebar-header">
   <img src="<?php echo base_url('images/'.$setting->logo) ?>" style="width: 120px; height: auto; display: block; margin: 0 auto;">

    <!-- <div style="font-size: 20px; color: #333;"><?php echo $setting->nama_setting ?></div> -->
</div>
    <div class="sidebar-menu">
        <ul class="menu">
            
                
                <li class='sidebar-title'>Main Menu</li>
                
            
                
                <li class="sidebar-item  ">

                    <a href="<?= base_url("home")?>" class='sidebar-link'>
                        <i data-feather="home" width="20"></i> 
                        <span>Dashboard</span>
                    </a>

                    
                </li>

                <li class="sidebar-item  ">

                <a href="<?= base_url("home/modul")?>" class='sidebar-link'>
                        <i data-feather="file-text" width="20"></i> 
                        <span>Modul P5</span>
                    </a>

                    
                </li>
                <?php
if(session()->get('level') == 1 || session()->get('editmodul') == 1) // Check if level is 1 or editmodul is 1
{
?>
                <li class="sidebar-item  ">

                <a href="<?= base_url("home/kelolamodul")?>" class='sidebar-link'>
                        <i data-feather="file-plus" width="20"></i> 
                        <span>Kelola Modul</span>
                    </a>

                    
                </li>
                <?php
    }else{

    }?> 
                <?php
if(session()->get('level')==1 )
{
?>
                <li class="sidebar-item ">

<a href="<?= base_url("home/user")?>" class='sidebar-link'>
        <i data-feather="user" width="20"></i> 
        <span>User</span>
    </a>

    
</li>

<?php
    }else{

    }?> 

<?php
if(session()->get('level')==1|| session()->get('level')==2|| session()->get('level')==3)
{
?>
<li class="sidebar-item has-sub">

<a href="#" class='sidebar-link'>
        <i data-feather="user" width="20"></i> 
        <span>Siswa & Guru</span>
    </a>

    
    <ul class="submenu ">
    
        <li>
            <a href="<?= base_url("home/guru")?>">Guru</a>
        </li>
        
        <li>
            <a href="<?= base_url("home/siswa")?>">Siswa</a>
        </li>
        
       
        
    </ul>
    

    
</li>

<?php
    }else{

    }?> 
    <?php
if(session()->get('level')==1 )
{
?>
                
                <li class="sidebar-item  ">

                <a href="<?= base_url("home/kelas")?>" class='sidebar-link'>
                        <i data-feather="grid" width="20"></i> 
                        <span>Kelas</span>
                    </a>

                    
                </li>

                 
                <li class="sidebar-item  ">

                <a href="<?= base_url("home/setting")?>" class='sidebar-link'>
                        <i data-feather="settings" width="20"></i> 
                        <span>Setting</span>
                    </a>

                    
                </li>
            
                <li class="sidebar-item ">

                    <a href="<?= base_url("home/log")?>" class='sidebar-link'>
                        <i data-feather="globe" width="20"></i> 
                        <span>Activity Log</span>
                    </a>

                    
                </li>
                
                
                <li class="sidebar-item has-sub">

<a href="#" class='sidebar-link'>
        <i data-feather="trash" width="20"></i> 
        <span>Restore</span>
    </a>

    
    <ul class="submenu ">
    
        <li>
            <a href="<?= base_url("home/restore_modul")?>">Restore Modul</a>
        </li>
        
        <li>
            <a href="<?= base_url("home/restore_user")?>">Restore User</a>
        </li>
        
        <li>
            <a href="<?= base_url("home/restore_kelas")?>">Restore Kelas</a>
        </li>
        
    </ul>
    

    
</li>
                
                
<?php
    }else{

    }?>           
            
                
                
            
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">
                        <li class="dropdown nav-icon">
                           
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-large">
                                <h6 class='py-2 px-4'>Notifications</h6>
                                <ul class="list-group rounded-none">
                                    <li class="list-group-item border-0 align-items-start">
                                        <div class="avatar bg-success me-3">
                                            <span class="avatar-content"><i data-feather="shopping-cart"></i></span>
                                        </div>
                                        
                                    </li>
                                </ul>
                            </div>
                        </li>
                      
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar me-1">
                                    <img src="<?= base_url("images/". session()->get('foto') )?>" alt="" srcset="">
                                </div>
                                 <div class="d-none d-md-block d-lg-inline-block">Hi, <?= session()->get('nama')?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="<?= base_url("home/profile/". session()->get('id') )?>"><i data-feather="user"></i> Account</a>
                               
                              
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?= base_url("home/logout")?>"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            
