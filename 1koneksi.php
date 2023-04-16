<html>
    <head>
        <title>Koneksi Database MySQL</title>
    </head>
    <body>
        <h1>Demo Koneksi database MySQL</h1>
        <?php
        
        $con = mysqli_connect("localhost:3307","root","","test");

        //check connection
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL: " .mysqli_connect_error()
            ;
            exit();
        }
        ?>
    </body>

</html>
