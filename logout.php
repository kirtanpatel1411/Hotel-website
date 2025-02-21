<?php
session_start();
session_destroy(); // Destroy all sessions

echo "<script>
    alert('You have been logged out!');
    window.location.href = 'index.php'; // Redirect to home page
</script>";
exit();
?>
