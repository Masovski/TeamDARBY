<h2>Register User</h2>

<?php echo form_open(base_url().'users/register'); ?>
    <?php $data_form = array(
        'name' => 'username',
        'size' => 50,
        'style' => 'border: 1px solid black',
        'id' => 'username'
    );
    echo form_input($data_form);
    ?>
    <p>
        <?=form_label('Password', 'password')?>:
        <?php
            $data_form=array(
                'id'=>'password',
                'name'=>'size',
                'class'=>'blackborder'
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