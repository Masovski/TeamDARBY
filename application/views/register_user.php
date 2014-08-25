<h2>Register User</h2>
<?php if($errors){?>
<div style="background-color: #e13300; color: #ffffff">
   <?=$errors?>
</div>
<?php } ?>
<?php echo form_open(base_url().'users/register'); ?>
    <p>
        <?=form_label('Username', 'username')?>:
        <?php $data_form = array(
            'name' => 'username',
            'id'=>'username',
            'size' => 50,
        );
        echo form_input($data_form);
        ?>
    </p>
    <p>
        <?=form_label('Email', 'email')?>:
        <?php $data_form = array(
            'name' => 'email',
            'id'=>'email',
            'size' => 50,
        );
        echo form_input($data_form);
        ?>
    </p>
    <p>
        <?=form_label('Password', 'password')?>:
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
        <?=form_label('Password confirmed', 'password2')?>:
        <?php
            $data_form=array(
                'id'=>'password2',
                'name'=>'size',
                'size'=>50,
                'class'=>'blackborder',
            );
            echo form_password($data_form)
        ?>
    </p>
    
    <p>User Type: <?php
    $options=array(
        ''=>'--',
        'admin'=>'Admin',
        'author'=>'Author',
        'user'=>'User'
    );
    $js = '';
    echo form_dropdown('user_type', $options, '', $js);
    ?>
    </p>
    <?php echo form_submit('', 'Register') ?>
<?php echo form_close() ?>