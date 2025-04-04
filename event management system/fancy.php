<html>
<head>
    <style type="text/css">

    </style>
    <script type="text/javascript" src="fb/lib/jquery-1.10.1.min.js"></script>
    <script type="text/javascript" src="fb/lib/jquery.mousewheel-3.0.6.pack"></script>
    <link href="fb/source/jquery.fancybox.css" rel="stylesheet">
    <script type="text/javascript" src="fb/source/jquery.fancybox.pack.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $(".fancybox").fancybox();
        });
    </script>
</head>

<body style="background-color:#777">

<div class="field-content">
    <?php
    $mysqli = new mysqli("localhost", "root", "", "admin");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "SELECT * FROM images";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
            ?>
            <a href="<?php echo "admin/" . $row['image']; ?>" class="fancybox"
               title="" class="colorbox js-hide init-colorbox-processed cboxElement"
               rel="gallery-node-63-field_gallery" style="display:block;">

                <?php
                if ($i == $result->num_rows) {
                    echo "Gallery";
                }
                $i++;
                ?>
            </a>
            <?php
        }
    } else {
        echo "0 results";
    }
    $mysqli->close();
    ?>
</div>

</body>
</html>
