<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>
<?php
if(isset($_POST['submit'])){
$crud->insertMessage($_POST);
}

?>

<?php
include 'inc/header.php';
include 'inc/sidebar.php';
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2 bg-dark">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Send Message</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
           <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Send Message: </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="add-message.php" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">

                    <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Recipient Number :</label>
                    <input type="text" name="number" class="form-control" id="exampleInputName" placeholder="Please enter recipient number" required="required"><strong><?php $lib->msg(); ?></strong>
                  </div>
                </div>

               <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Message :</label>
                    <textarea rows="6" name="message" class="form-control" id="exampleInputName" placeholder="Please enter message" required="required"></textarea>
                  </div>
                </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Encryption Key :</label>
                   <input type="text" name="mkey" class="form-control" id="exampleInputName" placeholder="Please enter encyption key" required="required">
                  </div>
                </div>

                <input type="hidden" name="sender_id" class="form-control" value="<?=$crud->displayIdByEmail('user',$_SESSION['id'])?>">



                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-md-3" name="submit">Send</button>
                  <!-- <button type="reset" class="btn btn-danger col-md-3">Clear</button> -->
                </div>
              </form>
            </div>
            <!-- /.card -->

        </div>
        <!-- /.row -->
        <!-- Main row -->
       </div>
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
   <br/><br/>
  <?php
include 'inc/footer.php';
?>