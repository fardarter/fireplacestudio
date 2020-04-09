<?php

$s->startSection('pagination');
    $s->addOption( ffOneOption::TYPE_TEXT, 'trans-first', 'First', '&laquo; First');
    $s->addElement( ffOneElement::TYPE_NEW_LINE );
    $s->addOption( ffOneOption::TYPE_TEXT, 'trans-last', 'Last', 'Last &raquo;');
$s->endSection();