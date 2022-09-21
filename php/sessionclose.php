<?php

    session_start();
    session_destroy();

    echo "<script> alert('Session cerrada gracias por contactarnos'); window.location='./../index.html'</script>";

?>