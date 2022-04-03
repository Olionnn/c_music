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
  <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success !</b>
        <?=session()->getFlashdata('success') ?>
      </div>
    </div>
    <?php endif; ?>
    <?php if(session()->getFlashdata('error')) :?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?=session()->getFlashdata('error') ?>
      </div>
    </div>
    <?php endif; ?>
  <table class="table table-borderless table-dark">
    <thead>
      <tr>
        <th scope="col">NO.</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Verify</th>
        <th scope="col">Tools</th>
      </tr>
    </thead>
    <tbody>
    <?php $no=1; foreach($artis as $row) { ?>
      <tr>
        <th scope="row"><?php echo $no ?></th>
        <td scope="row" colspan=""><?php echo $row->artis_pict ?></td>
        <td scope="row" colspan=""><?php echo $row->artis_name ?></td>
        <td scope="row" colspan=""><?php echo $row->artis_very ?></td>
        <td scope="row">
          <a class="btn btn-warning btn-sm btn-edit" data-toggle="modal" data-target="#editModal" href="#" data-artis_id="<?= $row->artis_id;?>" data-artis_pict="<?= $row->artis_pict;?>" data-artis_very="<?= $row->artis_very;?>" >
            Edit
          </a>
          <a class="btn btn-danger btn-sm btn-delete" data-toggle="modal" data-target="#deleteModal" href="#" data-id="<?= $row->artis_id;?>">
            Hapus
          </a>
        </td>    
      </tr>
      <?php $no++; } ?>
    </tbody>
  </table>
</div>



<!-- Modal Add Product-->
<form action="<?php echo base_url('Main/Artists/qtambah') ?>" method="post">
    <div class="modal fade" id="addModal" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add Artist</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        
        <div class="modal-body">
          <?= csrf_field() ?>
            <div class="form-group">
                <label>Artist Name</label>
                <input type="text" class="form-control" id="artis_name" name="artis_name" placeholder="Masukan Nama" value="<?php echo set_value('artis_name')?>">
            </div>
              
            <div class="form-group">
                <label>Artist Picture</label>
                <input type="text" class="form-control" id="artis_pict" name="artis_pict" placeholder="Masukan Profile Picture" value="<?php echo set_value('artis_pict')?>">
            </div>
              
            <div class="form-group">
                <label>Artist Verify?</label>
                <input type="text" class="form-control" id="artis_very" name="artis_very" placeholder="Akun Verify?" value="<?php echo set_value('artis_very')?>">
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
  <form action="<?php echo base_url('Main/Artists/qedit/'.$row->artis_id) ?>" method="post">
    <div class="modal fade" id="editModal">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Edit Artist</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
            </div>
            
            <div class="modal-body">
              <?= $row->artis_name ?>
              <?= csrf_field() ?>
              <div class="form-group">
                <label>Artist Name</label>
                <input type="text" class="form-control artis_name" id="artis_name" name="artis_name" placeholder="Masukan Nama" value="<?php echo $row->artis_name?>">
              </div>
                              
              <div class="form-group">
                <label>Artist Picture</label>
                <input type="text" class="form-control artis_pict" id="artis_pict" name="artis_pict" placeholder="Masukan Profile Picture" value="<?php echo $row->artis_pict?>">
              </div>
                
              <div class="form-group">
                <label>Artist Verify?</label>
                <input type="text" class="form-control artis_very" id="artis_very" name="artis_very" placeholder="Akun Verify?" value="<?php echo $row->artis_very?>">
              </div>
              
            </div>
            <div class="modal-footer">
              <input type="hidden" id="artis_id" name="artis_id" class="qartis_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </div>
      </div>
    </div>
  </form>

      <!-- Modal Delete Product-->
  <form action="<?php echo base_url('Main/Artist/qdelete/'.$row->artis_id) ?>" method="post">
    <div class="modal fade" id="deleteModal">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <?= csrf_field() ?>
          <div class="modal-body">
            
              <h5>Are you sure want to delete this product?</h5>
            
          </div>
          <div class="modal-footer">
              <input type="hidden" id="artis_id" name="artis_id" class="dartis_id">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <button type="submit" class="btn btn-primary">Yes</button>
          </div>
        </div>
      </div>
    </div>
  </form>


<?= $this->endSection() ?>

    
<script>  
$(document).ready(function(){
    // get Edit Product
    $('.btn-edit').on('click',function(){
        // get data from button edit
        const artis_id = $(this).data('artis_id');
        const artis_name = $(this).data('artis_name');
        //const user_password = $(this).data('user_password');
        const artis_pict = $(this).data('artis_pict');
        const artis_very = $(this).data('artis_very');
        // Set data to Form Edit
        $('.dartis_id').val(artis_id);
        $('.artis_name').val(artis_name);
        $('.artis_pict').val(artis_pict);
        $('.artis_very').val(artis_very);
        //$('.product_category').val(category).trigger('change');
        // Call Modal Edit
        $('#editModal').modal('show');
    });

      // get Delete 
      $('.btn-delete').on('click',function(){
      // get data from button edit
      const id = $(this).data('user_id');
      // Set data to Form Edit
      $('.duser_id').val(id);
      // Call Modal Edit
      $('#deleteModal').modal('show');
      });
  });
<script>