<?php

///////////////////////////////////////////////////////////////////////////////////////////////////
// Add wrappers to comment input fields
///////////////////////////////////////////////////////////////////////////////////////////////////
    $queryParent = ffTemporaryQueryHolder::getQuery('comments-form');
    $query = $queryParent->get('comments-form');


    $commentFormPrinter = ffContainer()->getThemeFrameworkFactory()->getCommentsFormPrinter();

if( $commentFormPrinter->commentsOpen() ) {

    $commentFormPrinter->addFieldAuthorLine('<p class="col-24">');
    $commentFormPrinter->addFieldAuthorLine('<label>' . ff_wp_kses( $query->get('name') ) . ' <span class="required">*</span></label>');
    $commentFormPrinter->addFieldAuthorLine('<input class="ff-field-author" name="author" type="text" size="100">');
    $commentFormPrinter->addFieldAuthorLine('</p>');


    $commentFormPrinter->addFieldEmailLine('<p class="col-24">');
    $commentFormPrinter->addFieldEmailLine('<label>' . ff_wp_kses( $query->get('email') ) . ' <span class="required">*</span></label>');
    $commentFormPrinter->addFieldEmailLine('<input class="ff-field-email" name="email" type="text" size="100">');
    $commentFormPrinter->addFieldEmailLine('</p>');

    $commentFormPrinter->addFieldWebsiteLine('<p class="col-24">');
    $commentFormPrinter->addFieldWebsiteLine('<label>' . ff_wp_kses( $query->get('website') ) . ' </label>');
    $commentFormPrinter->addFieldWebsiteLine('<input class="ff-field-url" name="url" type="text" size="100">');
    $commentFormPrinter->addFieldWebsiteLine('</p>');

    $commentFormPrinter->addFieldCommentLine('<p class="col-1">');
    $commentFormPrinter->addFieldCommentLine('<label>' . ff_wp_kses( $query->get('comment-form') ) . ' </label>');
    $commentFormPrinter->addFieldCommentLine('<textarea class="ff-field-comment" id="comment" name="comment" cols="100" rows="10"></textarea>');
    $commentFormPrinter->addFieldCommentLine('</p>');

    $commentFormPrinter->addFieldLoggedInLine('<p class="col-1 logged-in-as">');
    $commentFormPrinter->addFieldLoggedInLine($query->get('logged-in'));
    $commentFormPrinter->addFieldLoggedInLine('</p>');


    $commentFormPrinter->setClassFormElement('row');
    $commentFormPrinter->setClassSubmitButton('button-primary');
    $commentFormPrinter->setClassSubmitParagraph('col-1');

    $commentFormPrinter->setTextHeading($query->get('heading'));
    $commentFormPrinter->setTextSubmit($query->get('submit-button'));


    $button_class = 'button '.esc_attr( $query->get('button-color') );

    $commentFormPrinter->setClassFormElement('row');
    $commentFormPrinter->setClassSubmitButton( $button_class );
    $commentFormPrinter->setClassSubmitParagraph('col-1');


    $commentFormPrinter->printForm();

}