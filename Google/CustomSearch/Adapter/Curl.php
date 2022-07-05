<?php

require_once(dirname(__FILE__).'/../ErrorException.php');
require_once(dirname(__FILE__).'/AdapterInterface.php');

/**
 * SearchEngine_Adapter_Curl excutes an API request using cURL.
 *
 * @author Akram Abbasi <mohdakramabbasi@gmail.com>
 */
class SearchEngine_Adapter_Curl implements SearchEngine_AdapterInterface
{
    /**
     * Executes the API request using cURL.
     * 
     * @param string $url
     * @return string
     */
    public function executeRequest($url)
    {
        if (!function_exists('curl_init'))
        {
            // @codeCoverageIgnoreStart
            throw new SearchEngine_ErrorException(
                'PHP cURL functions not found. Please make sure cURL is installed and enabled.',
                SearchEngine_ErrorException::ADAPTER_CURL_MISSING
            );
            // @codeCoverageIgnoreEnd
        }

        $handle = @curl_init();
        if (!$handle)
        {
            // @codeCoverageIgnoreStart
            throw new SearchEngine_ErrorException(
                'Unable to create cURL session.',
                SearchEngine_ErrorException::ADAPTER_CURL_UNABLE_INIT_CURL
            );
            // @codeCoverageIgnoreEnd
        }

        curl_setopt($handle, CURLOPT_HEADER, false);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($handle, CURLOPT_URL, $url);

        $response = @curl_exec($handle);
        if (!$response)
        {
            throw new SearchEngine_ErrorException(
                'API request failed. curl_exec() returned FALSE.',
                SearchEngine_ErrorException::ADAPTER_CURL_EXECUTE_FAILED
            );
        }

        return $response;
    }
}