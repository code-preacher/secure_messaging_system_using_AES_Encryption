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
$crud->decryptMessage($_POST);
}
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
              <li class="breadcrumb-item active">Encrypted Message</li>
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
                <h3 class="card-title">Encrypted Message: </h3>
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
                    <textarea rows="6" name="message" class="form-control" id="exampleInputName"><?=$message['message']?></textarea>
                  </div>
                </div>

              <div class="col-md-12">
                  <div class="form-group">
                    <label for="exampleInputName">decryption Key :</label>
                   <input type="text" name="mkey" class="form-control" id="exampleInputName" placeholder="Please enter encyption key" required="required"><strong><?php $lib->msg(); ?></strong>
                  </div>
                </div>

             <input type="hidden" name="id" class="form-control" id="exampleInputName" value="<?=$_GET['id']?>">

                </div>

                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary col-md-3" name="submit">Decrypt Message</button>
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