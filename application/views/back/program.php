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
              <div class="box-body">
                <button class="btn btn-success" onclick="add_program()"><i class="glyphicon glyphicon-plus"></i> Add program</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br />
                <br />
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Program Name</th>
                            <th>Channel</th>
                            <th>Date</th>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Duration</th>
                            <th>Synopsis Program</th>
                            <th>Genre</th>
                            <th>Parenting Categories</th>
                            <th>Broadcast Type</th>
                            <th>Url Teaser</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                    <tfoot>
                    <tr>
                        <th>Program Name</th>
                        <th>Channel</th>
                        <th>Date</th>
                        <th>Time Start</th>
                        <th>Time End</th>
                        <th>Duration</th>
                        <th>Synopsis Program</th>
                        <th>Genre</th>
                        <th>Parenting Categories</th>
                        <th>Broadcast Type</th>
                        <th>Url Teaser</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
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