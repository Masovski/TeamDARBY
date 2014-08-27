<link href='<?= asset_url() . "css/edit_post.css"?>' rel="stylesheet"/>
<?php echo form_open(base_url().'users/register'); ?>
<div class="post">
    <p>
        <?=form_label('Username', 'username')?>
        <?php $data_form = array(
            'name' => 'username',
            'id'=>'username',
            'size' => 50,
            'value' => set_value('username')
        );
        echo form_input($data_form);
        ?>
    </p>
    <p>
        <?=form_label('Email', 'email')?>
        <?php $data_form = array(
            'name' => 'email',
            'id'=>'email',
            'size' => 50,
            'value' => set_value('email')
        );
        echo form_input($data_form);
        ?>
    </p>
    <p>
        <?=form_label('Password', 'password')?>
        <?php
            $data_form=array(
                'name'=>'password',
                'id'=>'password',
                'size'=>50,
                'class'=>'blackborder'
            );
            echo form_password($data_form)
        ?>
    </p>
    <p>
        <?=form_label('Password confirmed', 'password2')?>
        <?php
            $data_form=array(
                'name'=>'password2',
                'id'=>'password2',
                'size'=>50,
                'class'=>'blackborder',
            );
            echo form_password($data_form)
        ?>
    </p>
    <?php echo form_submit('', 'Register') ?>
</div>
<?php echo form_close() ?>