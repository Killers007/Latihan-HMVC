<div class="content-wrapper">
    <section class="content-header">
        <h1>Ubah Data<small> Modul : <?php echo $model['modul'];?></small></h1>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
                    $this->view('_form', array(
                        'model' => $model,
                        'new' => $new,
                        )
                    );
                ?>
            </div>
        </div>
    </section>
</div>
