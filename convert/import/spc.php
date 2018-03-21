<?php

namespace Convert\Import;

class Spc
{
    public $data = array();
    public $meta = array();
    public $error = false;
    
    /**
     * __construct($file, $parameters = array())
     * 
     * Converts an SPC file into a 2D-array
     * 
     * @param string $file Or a filename (including path), or an array of lines. 
     * @param array $parameters Specific parameters for this helper
     */
    function __construct($file, $parameters = array())
    {
        // if $file is a filename, open it as handle and read line by line
        // if $file is an array, foreach through it
        if (!is_array($file)) {
            $lastLine = exec("python ". PRIVPATH . "convert/import/spc/convert.py \"" . $file . "\"", $response);
            if (!empty($response)) {
                $file = $response;
            } else {
                eventLog("WARNING", "Empty response from external SPC convertor.", false);
                $this->error = "Empty response from external SPC convertor.";
            }
        } else {
            $lastLine = end($file);
        }

        if (is_array($file)) {
            // check if successful, and if so, use the ImportASCII class to read the output
            if ($lastLine == "Converted") {
                $importAscii = new Ascii($file, $parameters); //same namespace!
                $this->data = $importAscii->getData();
                $this->error = $importAscii->getError();
            } else {
                eventLog("WARNING", "Response from external SPC convertor: " . $lastLine, false);
                $this->error = "Response from external SPC convertor: " . $lastLine;
            }
        }
    }

    public function getData()
    {
        return $this->data;
    }

    public function getMeta()
    {
        return $this->meta;
    }

    public function getError()
    {
        return $this->error;
    }
}