<?php
session_start();

session_destroy();

echo '
<script>
localStorage.clear();
</script>';

header("Refresh:0; url=index.php");
?>