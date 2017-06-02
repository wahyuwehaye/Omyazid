<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>Copyright &copy; 2017 <a href="http://smvfreesat.com">SMVFREESAT</a>.</strong> All rights
    reserved.
  </footer>

<script src="<?php echo base_url('assets/plugins/jQuery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datepicker/bootstrap-datepicker.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/plugins/datetimepicker/js/bootstrap-datetimepicker.min.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/app.min.js')?>"></script>
<script src="<?php echo base_url('assets/dist/js/demo.js')?>"></script>

<script type="text/javascript">

var save_method; //for save method string
var table;
var base_url = '<?php echo base_url();?>';

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('c_program/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

    });

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $('.timepicker').timepicker({
        showInputs: false,
        showMeridian: false,
        defaultTime: 'current'

    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_program()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add program'); // Set Title to Bootstrap modal title
}

function edit_program(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('c_program/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.id);
            $('[name="program_name"]').val(data.program_name);
            $('[name="channel"]').val(data.channel);
            $('[name="tanggal"]').datepicker('update',data.tanggal);
            $('[name="time_start"]').val(data.time_start);
            $('[name="time_end"]').val(data.time_end);
            $('[name="duration"]').val(data.duration);
            $('[name="synopsis_program"]').val(data.synopsis_program);
            $('[name="genre"]').val(data.genre);
            $('[name="parenting_categories"]').val(data.parenting_categories);
            $('[name="broadcast_type"]').val(data.broadcast_type);
            $('[name="url_teaser"]').val(data.url_teaser);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit program'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('c_program/ajax_add')?>";
    } else {
        url = "<?php echo site_url('c_program/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_program(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('c_program/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>

<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">program Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">
                    <input type="hidden" value="" name="id" id="id" /> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Program Name</label>
                            <div class="col-md-9">
                                <input name="program_name" id="program_name" placeholder="Program Name" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Channel</label>
                            <div class="col-md-9">
                                <select name="channel" id="channel" class="form-control">
                                    <?php foreach($channel->result_array() as $row) {?>
                                        <option value="<?php echo $row['channel_name'];?>"><?php echo $row['channel_name']?></option>
                                    <?php }?>
                                </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Date</label>
                            <div class="col-md-9">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" name="tanggal" id="datepicker">
                                  </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Start Time</label>
                            <div class="col-md-9">
                                <div class="bootstrap-timepicker timepicker">
                                    <div class="input-group">
                                      <input type="text" class="form-control timepicker" name="time_start">
                                      <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                      </div>
                                    </div>
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">End Time</label>
                            <div class="col-md-9">
                                <div class="bootstrap-timepicker timepicker">
                                    <div class="input-group">
                                        <input type="text" class="form-control timepicker" name="time_end">
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Duration</label>
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="duration" id="duration" value="60">
                                    <span class="input-group-addon">minutes</span>
                                </div>
                            </div>
                                <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Synopsis Program</label>
                            <div class="col-md-9">
                                <textarea name="synopsis_program" id="synopsis_program" placeholder="Synopsis Program" class="form-control"></textarea>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Genre</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="genre[]" id="genre[]" value="Movie">
                                  Movies
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="genre[]" id="genre[]" value="Sport">
                                  Sport
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="genre[]" id="genre[]" value="Family">
                                  Family
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="genre[]" id="genre[]" value="News">
                                  News
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="genre[]" id="genre[]" value="Favorite Channel">
                                  Favorite Channel
                                </label>
                            </div>
                            </div>
                                <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Parenting Categories</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="parenting_categories[]" id="parenting_categories[]" value="G">
                                  G - General
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="parenting_categories[]" id="parenting_categories[]" value="PG">
                                  PG - Parenting Guidance
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="parenting_categories[]" id="parenting_categories[]" value="PG13">
                                  PG 13
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="parenting_categories[]" id="parenting_categories[]" value="R">
                                  R - Restricted
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="parenting_categories[]" id="parenting_categories[]" value="NC17">
                                  NC 17
                                </label>
                            </div>
                            </div>
                                <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Broadcast Types</label>
                            <div class="col-md-5">
                                <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="broadcast_type[]" id="broadcast_type[]" value="Live">Live
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="broadcast_type[]" id="broadcast_type[]" value="Live Delay">Live Delay
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="broadcast_type[]" id="broadcast_type[]" value="Record">Record
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                  <input type="checkbox" name="broadcast_type[]" id="broadcast_type[]" value="Re Run">Re Run
                                </label>
                            </div>
                            </div>
                                <span class="help-block"></span>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Url Teaser</label>
                            <div class="col-md-9">
                                <input name="url_teaser" id="url_teaser" placeholder="Url Teaser" class="form-control" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->
</div>
<!-- ./wrapper -->

<!-- Page script -->
</body>
</html>
