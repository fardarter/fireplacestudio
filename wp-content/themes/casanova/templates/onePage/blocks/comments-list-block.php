<?php
/** @var ffOneStructure $s */

$s->startSection('comments-list');

    $s->startSection('heading');
        $s->addElement(ffOneElement::TYPE_HTML,'','<label><strong>General Comments Options</strong></label><br/><br/>');
        $s->addOption(ffOneOption::TYPE_CHECKBOX, 'show', 'Show Heading', 1);
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'trans-zero', 'No Comments', 'No Comments');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'trans-one', 'One Comment', 'One Comment');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'trans-more', '%s Comments', '%s Comments');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );
    $s->endSection();

    $s->startSection('one-comment');
        $s->addElement(ffOneElement::TYPE_HTML,'','<br/><label><strong>One Comment Options</strong></label><br/><br/>');

        $s->addOption(ffOneOption::TYPE_CHECKBOX, 'show-date', 'Show Date', 1);
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'date-format', 'Date Format', 'F j, Y \a\t g:i a');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'trans-reply', 'Reply comment', 'Reply this comment');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );

        $s->addOption( ffOneOption::TYPE_TEXT, 'trans-moderation', 'Awaiting for moderation', 'Your comment is awaiting moderation.');
        $s->addElement(ffOneElement::TYPE_NEW_LINE );
    $s->endSection();

$s->endSection();