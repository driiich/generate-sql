<?php
/**
 * Created by PhpStorm.
 * User: Cyril
 * Date: 13/05/2019
 * Time: 19:21
 */

class generateSQL
{
    /**
     * @var string
     */
    private $file;

    private $handle;

    /**
     * generateSQL constructor.
     * @param string $file
     */
    public function __construct($file)
    {
        $this->file = $file;
    }

    public function execute()
    {
        # Read the log file
        $this->readFile();

        # Generate the SQL file
        $this->generateSQLFile();

        #close the log file
        $this->closeFile();
    }

    private function generateSQLFile()
    {
        $handle = $this->getHandle();
        $requestsCount = 0;
        while (!feof($handle)) {
            $dd = fgets($handle);
            $requestsCount++;
            $parts = explode('"', $dd);
            var_dump($parts);
        }
    }

    private function readFile()
    {
        $handle = fopen($this->file,'r') or die ('File opening failed');
        $this->setHandle($handle);
    }

    private function closeFile()
    {
        fclose($this->getHandle());
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        return $this->handle;
    }

    /**
     * @param mixed $handle
     */
    public function setHandle($handle)
    {
        $this->handle = $handle;
    }

}