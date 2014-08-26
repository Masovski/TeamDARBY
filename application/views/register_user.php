<h2>Register User</h2>

<?php echo form_open(base_url().'users/register'); ?>
    <p>
        <?=form_label('Username', 'username')?>:
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
        <?=form_label('Email', 'email')?>:
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
                'name'=>'password2',
                'id'=>'password2',
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
    $attr = 'id="user_type"';
    echo form_dropdown('user_type', $options, set_value('user_type', ''), $attr);
    ?>
    </p>
    <?php echo form_submit('', 'Register') ?>
<?php echo form_close() ?>