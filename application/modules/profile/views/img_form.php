<?php
echo form_open_multipart("profile/testimg");
?>
<br>
<?= form_upload('img'); ?>
  <?php
                            $btn = array(
                              'class' => "btn btn-primary pull-right",
                               'type' => 'submit',
                               'name' => 'submit',
                               'value' => 'Upload Image'
                            );
                    echo form_submit($btn);
                    ?>
<?= form_close(); ?>

                   