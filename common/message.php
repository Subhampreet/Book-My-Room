<!-- Snackbar Stylesheet -->
<link rel="stylesheet" href="../snackbar.css">

<?php
    if(isset($_GET['message'])) {
        $message = $_GET['message'];
?>
    <div id = "snackbar">
        <?=$message?>
    </div>
<?php
    }
?>

<!-- Snackbar script files -->
<script src="../snackbar.js"></script>