<?php

/**
 * SearchEngine_AdapterInterface defines the
 * interface of API request adapters.
 *
 * @author Akram Abbasi <mohdakramabbasi@gmail.com>
 */
interface SearchEngine_AdapterInterface
{
    /**
     * Executes the API request.
     *
     * @param string $url
     * @return string
     */
    public function executeRequest($url);
}