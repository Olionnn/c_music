<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
        content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Sidebar template</title>

    <!-- using online links -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
        integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> -->

        <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous"> -->
        
        <!-- <link rel="stylesheet" href="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css"> -->
        
        <!-- using local links -->
        <!-- <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../node_modules/@fortawesome/fontawesome-free/css/all.min.css">
        <link rel="stylesheet" href="../node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css"> -->
        
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/dist/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>/assets/dist/jqcss/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/main_tema.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/dist/css/sidebar-themes_tema.css">
    <link rel="shortcut icon" type="image/png" href="<?php echo base_url() ?>/assets/img_tema/favicon.png" />
    
</head>

<body>
<div class="page-wrapper default-theme sidebar-bg bg1 toggled">
    <nav id="sidebar" class="sidebar-wrapper">
    <?= $this->include('layout_tema/nav_sidebar') ?>
    </nav>
    <main class="page-content pt-2">
        <?= $this->renderSection('setting') ?>
        <?= $this->renderSection('dashboard') ?>
        <?= $this->renderSection('users') ?>
        <?= $this->renderSection('artists') ?>
    </main>
</div>







    <script src="<?php echo base_url() ?>/assets/dist/jquery/jquery-3.6.0.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/dist/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/dist/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/dist/jquery/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/dist/js/main_tema.js"></script>
    <!-- using online scripts -->
<!--     
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
    <script src="//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js"></script> -->

    <!-- using local scripts -->
    <!-- <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="../node_modules/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script> -->

    <script>    
    $(document).ready(function(){
 
        // get Edit Product
        $('.btn-edit').on('click',function(){
            // users edit
            const user_id           = $(this).data('user_id');
            const user_username     = $(this).data('user_username');
            //const user_password = $(this).data('user_password');
            const user_email        = $(this).data('user_email');
            const user_nohp         = $(this).data('user_nohp');
            const user_pictprofile  = $(this).data('user_pictprofile');
            //Artis edit
            const artis_id      = $(this).data('artis_id');
            const artis_name    = $(this).data('artis_name');
            const artis_pict    = $(this).data('artis_pict');
            const artis_very    = $(this).data('artis_very');
            // Set data to Form Edit
            // users edit
            $('.quser_id').val(user_id);
            $('.user_username').val(user_username);
            //$('.user_password').val(user_password);
            $('.user_email').val(user_email);
            $('.user_nohp').val(user_nohp);
            $('.user_pictprofile').val(user_pictprofile);
            //$('.product_category').val(category).trigger('change');
            //Artis edit
            $('.qartis_id').val(artis_id);
            $('.artis_name').val(artis_name);
            $('.artis_pict').val(artis_pict);
            $('.artis_very').val(artis_very);
            // Call Modal Edit
            $('#editModal').modal('show');
        });

        // $(document).on('click', '#editModal', function () {
            
        //     $('.user_id').val($(this).data(id));
        //     $('.user_username').val($(this).data(username));
        //     $('.user_password').val($(this).data(password));
        //     $('.user_email').val($(this).data(email));
        //     $('.user_nohp').val($(this).data(nohp));
        //     $('.user_pictprofile').val($(this).data(pictprofile));
        // })
          // get Delete Product
          $('.btn-delete').on('click',function(){
              // get data from button Delete
              // users Delete
              const id = $(this).data('user_id');
              //Artis Delete
              const arid      = $(this).data('artis_id');
              // Set data to Form Delete
              $('.duser_id').val(id);
              //Artis Delete
              $('.dartis_id').val(arid);
              // Call Modal Delete
              $('#deleteModal').modal('show');
          });
         
    });
</script>
</body>

</html>