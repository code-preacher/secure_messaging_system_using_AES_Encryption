     <?php 
     ob_start();
     require_once '../library/lib.php';
     require_once '../classes/crud.php';

     $lib=new Lib;
     $crud=new Crud;

     $lib->check_login2();

     ?>

     <?php
     $book=$crud->displayOne('book',$_GET['id']);
     ?>

     <?php
     include 'inc/header.php';
     include 'inc/sidebar.php';
     ?>

     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid bg-dark">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1></h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">View Book</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">


            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Book Information :</h3>
              </div>
              <!-- /.card-header -->
              <div class="embed-responsive embed-responsive-16by9">
                <a class="media" href="book/<?php echo $book['book']; ?>"></a>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <br/><br/>
    <?php
    include 'inc/footer.php';
    ?>
    <!-- DataTables -->
    <!--PDF VIEWER JavaScript -->
    <script src="js/vendor/jquery-1.12.4.min.js"></script>
    <script src="js/jquery.media.js"></script>
    <script src="js/pdf-active.js"></script>
  </script>