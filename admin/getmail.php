<?php
    $imap = imap_open("{mail.linuxdb.corp.hp.com:143}inbox", "notes", "notforaccess");
    $message_count = imap_num_msg($imap);
    print $message_count;
    imap_close($imap);
?> 
