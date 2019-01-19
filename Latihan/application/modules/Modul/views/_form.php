<input type="hidden" name="modul-lama" id="modul-lama" />
<?php echo form_open(current_url(), array('id'=>"form-modul",'class' => 'form-horizontal')); ?>
<div id="group-nama_modul" class="form-group">
    <label class="control-label col-sm-3" >Nama Modul </label>
    <div class="col-sm-8">
        <?php echo form_input('modul','',array("id"=>"modul",'class'=>'form-control','placeholderr'=>'Nama Modul')); ?>
    </div>
</div>
<?php echo form_close(); ?>
