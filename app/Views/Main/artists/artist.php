<?= $this->extend('layout_tema/main_tema') ?>

<?= $this->section('artists') ?>
<div class="container-fluid">

  <div class="form-group col-md-12">
    <a id="toggle-sidebar" class="btn btn-secondary rounded-0" href="#">
        <span>Toggle Sidebar</span>
    </a>
    <a id="pin-sidebar" class="btn btn-outline-secondary rounded-0" href="#">
        <span>Pin Sidebar</span>
    </a>
    <button type="button" class="btn btn-success rounded-0" data-toggle="modal" data-target="#addModal">Add New</button>
  </div>
  <?php $session = \Config\Services::session();
  if($session->getFlashdata('sukses')) { ?>
  <p class="alert alert-success"><?php echo $session->getFlashdata('sukses'); ?></p>
  <?php } ?>
  <?php 
  if($session->getFlashdata('error')) { ?>
  <p class="alert alert-danger"><?php echo $session->getFlashdata('error'); ?></p>
  <?php } ?>
  <table class="table table-borderless table-dark">
    <thead>
      <tr>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Verify</th>
        <th scope="col">Tools</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($artist as $row) { ?>
      <tr>
        <th scope="row"><?php echo $no ?></th>
        <td scope="row" colspan=""><?php echo $row['artis_pict'] ?></td>
        <td scope="row" colspan=""><?php echo $row['artis_name'] ?></td>
        <td scope="row" colspan=""><?php echo $row['artis_very'] ?></td>
        <td scope="row">
          <a class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal" href="#" data-artis_id="<?= $row['artis_id'];?>" data-artis_pict="<?= $row['artis_pict'];?>" data-artis_very="<?= $row['artis_very'];?>" >
            Edit
          </a>
          <a class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" href="#" data-id="<?= $row['user_id'];?>">
            Hapus
          </a>
        </td>    
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>



<!-- Modal Add Product-->
<form action="<?php echo base_url('Main/Users/qtambah') ?>" method="post">
    <div class="modal fade" id="addModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" id="user_username" name="user_username" placeholder="Masukan Username" value="<?php echo set_value('user_username')?>">
            </div>
              
            <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control" id="user_password" name="user_password" placeholder="Masukan Password" value="<?php echo set_value('user_password')?>">
            </div>
              
            <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" id="user_email" name="user_email" placeholder="Masukan Email" value="<?php echo set_value('user_email')?>">
            </div>
              
            <div class="form-group">
                <label>Nomer Hp</label>
                <input type="text" class="form-control" id="user_nohp" name="user_nohp" placeholder="Masukan Nomer Hp" value="<?php echo set_value('user_nohp')?>">
            </div>
              
            <div class="form-group">
                <label>Profiles Pictures</label>
                <input type="text" class="form-control" id="user_pictprofile" name="user_pictprofile" placeholder="Masukan Profiles Pictures" value="<?php echo set_value('user_pictprofile')?>">
            </div>

          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
        </div>
    </div>
    </div>
  </form>
  <!-- Modal Edit Product-->
  <form action="<?php echo base_url('Main/Users/qedit/'.$row['user_id']) ?>" method="post">
    <div class="modal fade" id="editModal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control user_username" id="user_username" name="user_username" placeholder="Masukan Username">
              </div>
              
              <!-- <div class="form-group">
                <label>Password</label>
                <input type="text" class="form-control user_password" id="user_password" name="user_password" placeholder="Masukan Password">
              </div> -->
                
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control user_email" id="user_email" name="user_email" placeholder="Masukan Email" >
              </div>
                
              <div class="form-group">
                <label>Nomer Hp</label>
                <input type="text" class="form-control user_nohp" id="user_pictprofile" name="user_nohp" placeholder="Masukan Nomer Hp">
              </div>
                
              <div class="form-group">
                <label>Profiles Pictures</label>
                <input type="text" class="form-control user_pictprofile" name="user_pictprofile" placeholder="Masukan Profiles Pictures">
              </div>

              
            </div>
            <div class="modal-footer">
              <input type="hidden" id="user_id" name="user_id" class="quser_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
      </div>
    </div>
  </form>

      <!-- Modal Delete Product-->
  <form action="<?php echo base_url('Main/Users/qdelete/'.$row['user_id']) ?>" method="post">
    <div class="modal fade" id="deleteModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            
              <h5>Are you sure want to delete this product?</h5>
            
          </div>
          <div class="modal-footer">
              <input type="hidden" id="user_id" name="user_id" class="duser_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </form>


<?= $this->endSection() ?>