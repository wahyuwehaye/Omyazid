<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Channel
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Channel</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-12 col-xs-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Form Input Channel</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <!-- 
            <form role="form" action="<?php echo base_url(). 'crud_channel/tambah_channel'; ?>" method="post">
             -->
            <?php echo form_open_multipart('crud_channel/tambah_channel');?>
            <?php echo $error;?>
              <div class="box-body">
                <div class="form-group">
                  <label for="nochannel">No Channel</label>
                  <input type="text" class="form-control" name="no_channel" placeholder="Input No Channel">
                </div>
                <div class="form-group">
                  <label for="channelname">Channel Name</label>
                  <input type="text" class="form-control" name="channel_name" placeholder="Input Channel Name">
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Synopsis Channel</label>
                  <textarea class="form-control" rows="5" name="synopsis_channel"
                  placeholder="Enter Synopsis Channel"></textarea>
                </div>
                <div class="form-group">
                  <label for="urlchannel">URL Promo Channel</label>
                  <input type="text" class="form-control" name="url_promo_channel" placeholder="Input URL Promo Channel">
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Image Channel</label>
                  <input type="file" name="imgchannel">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
      

    </section>
    <!-- /.content -->
  </div>