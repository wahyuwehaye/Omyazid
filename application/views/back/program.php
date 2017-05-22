<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage Program
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Manage Program</li>
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
              <h3 class="box-title">Form Input Program</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
                <div class="form-group">
                  <label for="Programname">Program Name</label>
                  <input type="text" class="form-control" id="Programname" placeholder="Input Program Name">
                </div>
                <!-- select -->
                <div class="form-group">
                  <label>Channel</label>
                  <?php
                  form_dropdown('kd_channel',$dt_channel);
                  ?>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                 <!-- Date -->
                <div class="form-group">
                  <label>Date</label>

                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                  </div>
                  <!-- /.input group -->
                </div>
                <!-- time Picker -->
                <div class="bootstrap-timepicker col-md-6">
                  <div class="form-group">
                    <label>Start Time</label>

                    <div class="input-group">
                      <input type="text" class="form-control timepicker">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="bootstrap-timepicker col-md-6">
                  <div class="form-group">
                    <label>End Time</label>

                    <div class="input-group">
                      <input type="text" class="form-control timepicker">

                      <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                      </div>
                    </div>
                    <!-- /.input group -->
                  </div>
                  <!-- /.form group -->
                </div>
                <div class="form-group">
                  <label>Duration</label>
                  <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-addon">minutes</span>
                  </div>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Synopsis Program</label>
                  <textarea class="form-control" rows="5" placeholder="Enter Synopsis Program"></textarea>
                </div>
                <!-- checkbox -->
                <div class="form-group">
                  <label>Gendre</label>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Movies
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Sport
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Family
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      News
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Favorite Channel
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Parenting Categories</label>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Semua Umur
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Dewasa
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Bimbingan Orang Tua
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label>Broadcast Types</label>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Live
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Live Delay
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Record
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox">
                      Re Run
                    </label>
                  </div>
                </div>
                <div class="form-group">
                  <label for="urlProgram">URL Teaser</label>
                  <input type="text" class="form-control" id="urlProgram" placeholder="Input URL Promo Program">
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