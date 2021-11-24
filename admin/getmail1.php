 <?php
    $imap = imap_open("{mail.localhost:143}/var/spool/mail/notes", "notes", "notforaccess");
    $message_count = imap_num_msg($imap);

    for ($i = 1; $i <= $message_count; ++$i) {
        $header = imap_header($imap, $i);
        $body = trim(substr(imap_body($imap, $i), 0, 100));
        $prettydate = date("jS F Y", $header->udate);

        if (isset($header->from[0]->personal)) {
            $personal = $header->from[0]->personal;
        } else {
            $personal = $header->from[0]->mailbox;
        }

        $email = "$personal <{$header->from[0]->mailbox}@{$header->from[0]->host}>";
        echo "On $prettydate, $email said \"$body\".\n";
    }

    imap_close($imap);
?> 
