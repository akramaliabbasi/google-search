<?php

require_once(dirname(__FILE__).'/../ErrorException.php');
require_once(dirname(__FILE__).'/AdapterInterface.php');

/**
 * SearchEngine_Adapter_FileGetContents excutes an API request using file_get_contents().
 *
 * @author Akram Abbasi <mohdakramabbasi@gmail.com>
 */
class SearchEngine_Adapter_FileGetContents implements SearchEngine_AdapterInterface
{
    /**
     * Executes the API request using file_get_contents().
     *
     * @param string $url
     * @return string
     */
    public function executeRequest($url)
    {
        $response = @file_get_contents($url);
        if (!$response)
        {
            throw new SearchEngine_ErrorException(
                'API request failed. file_get_contents() returned FALSE.',
                SearchEngine_ErrorException::ADAPTER_FILE_GET_CONTENTS_EXECUTE_FAILED
            );
        }

        return $response;
    }
}