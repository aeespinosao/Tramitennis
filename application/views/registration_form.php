<html>
<?php
if (isset($this->session->userdata['logged_in'])) {
    header("location: http://localhost/tramitennis/index.php/autenticacion/login");
}
?>
<head>
    <title>Registration Form</title>
</head>
<body>
<div id="main">
    <div id="login">
        <h2>Registration Form</h2>
        <hr/>
        <?php
        echo "<div class='error_msg'>";
        echo validation_errors();
        echo "</div>";
        echo form_open('autenticacion/crear');

        echo form_label('Nombre');
        echo"<br/>";
        echo form_input('nombre');
        echo "<div class='error_msg'>";
        if (isset($message_display)) {
            echo $message_display;
        }
        echo "</div>";
        echo"<br/>";
        echo form_label('Email : ');
        echo"<br/>";
        $data = array(
            'type' => 'email',
            'name' => 'correo'
        );
        echo form_input($data);
        echo"<br/>";
        echo"<br/>";
        echo form_label('Password : ');
        echo"<br/>";
        echo form_password('password');
        echo"<br/>";
        echo"<br/>";
        echo form_label('Telefono : ');
        echo"<br/>";
        echo form_password('telefono');
        echo"<br/>";
        echo"<br/>";
        echo form_label('Cedula : ');
        echo"<br/>";
        echo form_password('cedula');
        echo"<br/>";
        echo"<br/>";
        echo form_submit('submit', 'Sign Up');
        echo form_close();
        ?>
        <a href="<?php echo base_url() ?> ">For Login Click Here</a>
    </div>
</div>
</body>
</html>