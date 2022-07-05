# google-search
Google search with custom library



    //Loading Google's Custom API libraray 
	require_once(dirname(__FILE__).'/Google/SearchEngine.php');

    $keywords = "seo";
	$client = new SearchEngine($keywords);
    $client->setApiKey('AIzaSyDsF-Ekf2mwvm7KZu7b9aKB8ievDDPkndM');
    $client->setCustomSearchEngineId('017576662512468239146:omuauf_lfve');
    $response = $client->getResponse();

 
    //To iterate over the results, you can do the following,

    if ($response->hasResults()) {
        foreach($response->getResults() as $result) {
			echo $result->getTitle() . '<br />';
			echo $result->getLink() . '<br />';
		    echo $result->getsnippet() . '<br />';
			echo $result->gethtmlSnippet() . '<br /><br />';
		
        }
    }
