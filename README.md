# serpstat/sdk
![Serpstat](https://images.netpeak.ua/soft/serpstat-logo.png)

**This is the official SDK library for the Serpstat API**

## Getting Started

### Step 1: Install the Package

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

```console
$ composer require serpstat/sdk
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

### Step 2: Use in application

```php
<?php
require_once __DIR__ . '/../vendor/autoload.php';

// configure your application
$config = [
    'token' => '19666fc1ae1724da1d5ea2f3a99d5f5a',
];

$domain = 'example.com';
$keywords = 'keywords';
$url = 'http://example.com/page1/';

// init client with your serpstat api token
$apiClient = new \Serpstat\Sdk\Core\ApiGuzzleHttpClient($config['token']);

// create instance of any api method class
// e.g. DomainKeywordsMethod
// list of methods classes in folder src\Methods
$apiMethod = new \Serpstat\Sdk\Methods\DomainKeywordsMethod(
    $keywords, 
    \Serpstat\Sdk\Interfaces\IApiClient::SE_GOOGLE_RU
);

try {
    // try call api method
    $response = $apiClient->call($apiMethod);
} catch (\Exception $e) {
    // catch api error 
    $response = $e->getMessage();
}
```

### List of API methods

| Method   | Info                          |
|--------|----------------------------------|
|CheckLimitsMethod|You can check the number of requests you can perform within your daily limit by using the command stats|
| DomainInfoMethod | This report provides you with the number of keywords domain uses in SEO and PPC, shows its online visibility and other metrics.|
| DomainHistoryMethod |This report provides you with the historical data on a domain’s number of keywords and visibility. |
 |DomainKeywordsMethod|This report shows keywords a domain ranks for in Google top 100 search results.|
 |DomainUrlsMethod|Returns the list of URLs within the analyzed domain. Also shows the number of keywords from top-100 for each URL.|
 |DomainsIntersectionMethod|Shows common keywords of up to 3 domains|
 |DomainsUniqKeywordsMethod|Shows unique keywords of a domain. Keywords that queried domain has in common with one or two other domains are removed from the list. |
 |CompetitorsMethod|The report lists all domains that rank for the given keyword in Google top 20 results |
 |KeywordsMethod|This method uses a full text search to find all keywords that match the queried term. For every keyword found you’ll see its volume, CPC and level of competition. |
 |KeywordInfoMethod|This report provides you with the keyword overview showing its volume, CPC and level of competition|
 |SuggestionsMethod|This report lists autocomplete suggestions for the keyword you requested (they are found by the full text search).|
 |RelatedKeywordsMethod|This report gives you a comprehensive list of related keywords whose SERP is similar to the one the requested keyword has (only for Account Types Standard and Professional). |
 |KeywordTopMethod|This report shows you Google top 100 organic search results for the keyword you requested. |
 |AdKeywordsMethod|This report shows you ads copies that pop up for the queried keyword in Google paid search results.|
 |UrlKeywordsMethod|The report lists keywords that URL ranks for in Google search results. |
 |UrlCompetitorsMethod|Shows the list of URLs that compete with a queried URL in organic search.|
 |UrlMissingKeywordsMethod|Shows a list of keywords that competitors' URLs rank for in top-10 but that are missing from the queried page.|
