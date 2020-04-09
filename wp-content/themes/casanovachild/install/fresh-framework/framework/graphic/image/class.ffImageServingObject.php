<?php

/**
 * Class ffImageServingObject
 *
 * You give a directory of image to this class and it will print the image as an output
 *
 * @author thomas
 * @since 1.8.20
 *
 */
class ffImageServingObject extends ffBasicObject {
/**********************************************************************************************************************/
/* OBJECTS
/**********************************************************************************************************************/

/**********************************************************************************************************************/
/* PRIVATE VARIABLES
/**********************************************************************************************************************/

/**********************************************************************************************************************/
/* CONSTRUCT
/**********************************************************************************************************************/
    public function __construct() {

    }
/**********************************************************************************************************************/
/* PUBLIC FUNCTIONS
/**********************************************************************************************************************/
    public function serveImage( $path ) {
        if( headers_sent() ) {
            throw new ffException('Image Serving Object - Headers already been sent');
            die();
        }

        $imageExtension = $this->_figureOutImageExtension( $path );
        $imageExtension = strtolower( $imageExtension );

        header('Content-Type: image/'.$imageExtension);

        readfile( $path );
        die();
    }
/**********************************************************************************************************************/
/* PUBLIC PROPERTIES
/**********************************************************************************************************************/

/**********************************************************************************************************************/
/* PRIVATE FUNCTIONS
/**********************************************************************************************************************/
    private function _figureOutImageExtension( $path ) {
        $pathInfo = pathinfo( $path );
        $extension = $pathInfo['extension'];

        if( $extension == 'jpg') {
            $extension = 'jpeg';
        }

        return $extension;
    }
/**********************************************************************************************************************/
/* PRIVATE GETTERS & SETTERS
/**********************************************************************************************************************/
}