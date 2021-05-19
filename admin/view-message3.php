<?php
ob_start();
require_once '../library/lib.php';
require_once '../classes/crud.php';

$lib=new Lib;
$crud=new Crud;

$lib->check_login2();
?>
<?php

$message=$crud->displayOneSpecific('message','id',$_GET['id']);

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
              <li class="breadcrumb-item active">Decrypted Message</li>
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
                <h3 class="card-title">Decrypted Message: </h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="view-message2.php" method="post">
                <div class="card-body">
                  <div class="row">


               <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Sender :</label>
                   <input type="text" class="form-control" id="exampleInputName" value="<?=$crud->displayNameById('user',$message['sender_id'])?>" disabled="disabled">
                  </div>
                </div>

                    <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Sender Number :</label>
                    <input type="text" class="form-control" id="exampleInputName" value="<?=$crud->displayNumberById('user',$message['sender_id'])?>" disabled="disabled">
                  </div>
                </div>

               <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">Message :</label>
                    <textarea rows="6" name="message" class="form-control" id="exampleInputName"><?=$lib->aes_decrypt($message['mkey'],$message['message'])?></textarea>
                  </div>
                </div>


                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a class="btn btn-primary col-md-3" href="view-message.php">Back to Message</a>
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