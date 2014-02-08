<?php

    if(mail('fabio@blastpress.com','test','testing')) {
        echo 'sent';
    } else {
        echo 'fail';
    }

?>
