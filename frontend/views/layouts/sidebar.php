



<aside class="main-sidebar sidebar-light-lime elevation-1">
    <!-- Brand Logo -->

    <a class="brand-link text-center">
	    <img src="docs/eduko.png" style="height: 40px;width: auto;object-fit: contain">
	    
	</a>

    <br><br>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?=$assetDir?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Vidya Ninz</a>
            </div>
        </div> -->

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="font-size: 14px">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    
                    ['label' => 'Dashboard', 'icon' => 'tachometer-alt', 'url' => ['site/index']],
                   
                    

                    ['label' => 'OFFICE MANAGEMENT', 'header' => true],
                    

                    [
                        'label' => 'Student Information',
                        'icon' => 'user-graduate',
                        
                        'items' => [

                            ['label' => 'Add New Student','url' => ['student-info/create']],
                            ['label' => 'List Student','url' => ['student-info/check']],
                            ['label' => 'Admission Due','url' => ['student-info/is']],
                            
                                  
                        ]
                    ],

                    [
                        'label' => 'Fees Info',
                        'icon' => 'money-bill-wave',
                        'items' => [

                            
                                  
                        ]
                    ],

                    [
                        'label' => 'Academic Info',
                        'icon' => 'graduation-cap',
                        // 'iconClassAdded' => 'text-purple',
                        'items' => [

                            ['label' => 'Components Set-Up','url' => ['/class-info']],
                            ['label' => 'Admission Fee Setup','url' => ['/admission-fee']],
                            ['label' => 'Academic Fee Setup','url' => ['/academic-fee']],
                                  
                        ]
                    ],


                    [
                        'label' => 'System Setting',
                        'icon' => 'cogs',
                        // 'iconClassAdded' => 'text-purple',
                        'items' => [

                            ['label' => 'General Set-Up','url' => ['/district']],

                            ['label' => 'School Info Set-Up','url' => ['/school-detail']],
                            

                            
                        ]
                    ],


                    ['label' => 'WEBSITE CMS', 'header' => true],

                    ['label' => 'Online Registration', 'icon' => 'globe', 'url' => ['/concept-registration']],
                    ['label' => 'Notice Board', 'icon' => 'bullhorn', 'url' => ['/notice']],
                    ['label' => 'Banner', 'icon' => 'image', 'url' => ['/carousel']],
                    ['label' => 'School Features', 'icon' => 'tasks', 'url' => ['/school-features']],
                    ['label' => 'About School', 'icon' => 'info-circle', 'url' => ['about-school/create']],
                    ['label' => 'Management Messages', 'icon' => 'rss', 'url' => ['/management-messages']],
                    ['label' => 'Staff Display', 'icon' => 'id-card', 'url' => ['/website-staff-display']],
                    ['label' => 'Achievements', 'icon' => 'trophy', 'url' => ['/achievement']],
                    ['label' => 'Contact Us', 'icon' => 'address-book', 'url' => ['/contact-us']],


                    
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>


<?php
$this->registerJS('

        var url = window.location;

    // for sidebar menu entirely but not cover treeview
    $("ul.nav-sidebar a").filter(function() {
        return this.href == url;
    }).addClass("active");

    // for treeview
    $("ul.nav-treeview a").filter(function() {
        return this.href == url;
    }).parentsUntil(".nav-sidebar > .nav-treeview").prev("a").addClass("active");
');


?>

<style type="text/css">
    .brand-link {
        border-bottom: none !important;

        /*background: gray;*/
    }

    .nav-link{

        color: #02a84d!important;
        /*font-size: 15px;*/
    }

    .nav-sidebar>.nav-item>.nav-link.active, .sidebar-light-info .nav-sidebar>.nav-item>.nav-link.active {

    /*background-color: #00bf6e;*/
    color: #2b9e51 !important;
    font-weight: bold;


}

.nav-sidebar>.nav-item>.nav-treeview {
    background-color: #fcffc2 !important;
    /*background-image: linear-gradient(to right, #fcffc2 , #fdffd9) !important;*/
    border-radius: 10px;
}


    
</style>