# serpstat/sdk
![Serpstat](https://images.netpeak.ua/soft/serpstat-logo.png)

**This is the official SDK library for the [Serpstat API v3](https://serpstat.com/api/)**

## Getting Started

### Step 1: Create authentication token

API Serpstat uses the User Token to authenticate requests.
You can create a token on your [profile page](https://serpstat.com/users/profile/).

### Step 2: Install the Package

Open a command console, enter your project directory and execute the following command to download the latest stable version of this bundle:

```console
$ composer require serpstat/sdk
```

This command requires you to have Composer installed globally, as explained in the [installation chapter](https://getcomposer.org/doc/00-intro.md) of the Composer documentation.

### Step 3: Use in application

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

### List of SDK API methods

| Class   | API Method   | Description |
|---|---|---|
|CheckLimitsMethod|/stats|You can check the number of requests you can perform within your daily limit by using the command stats|
| DomainInfoMethod |/domain_info| This report provides you with the number of keywords domain uses in SEO and PPC, shows its online visibility and other metrics.|
| DomainHistoryMethod |/domain_history|This report provides you with the historical data on a domain’s number of keywords and visibility. |
 |DomainKeywordsMethod|/domain_keywords|This report shows keywords a domain ranks for in Google top 100 search results.|
 |DomainUrlsMethod|/domain_urls|Returns the list of URLs within the analyzed domain. Also shows the number of keywords from top-100 for each URL.|
 |DomainsIntersectionMethod|/domains_intersection|Shows common keywords of up to 3 domains|
 |DomainsUniqKeywordsMethod|/domains_uniq_keywords|Shows unique keywords of a domain. Keywords that queried domain has in common with one or two other domains are removed from the list. |
 |CompetitorsMethod|/competitors|The report lists all domains that rank for the given keyword in Google top 20 results |
 |KeywordsMethod|/keywords|This method uses a full text search to find all keywords that match the queried term. For every keyword found you’ll see its volume, CPC and level of competition. |
 |KeywordInfoMethod|/keyword_info|This report provides you with the keyword overview showing its volume, CPC and level of competition|
 |SuggestionsMethod|/suggestions|This report lists autocomplete suggestions for the keyword you requested (they are found by the full text search).|
 |RelatedKeywordsMethod|/related_keywords|This report gives you a comprehensive list of related keywords whose SERP is similar to the one the requested keyword has (only for Account Types Standard and Professional). |
 |KeywordTopMethod|/keyword_top|This report shows you Google top 100 organic search results for the keyword you requested. |
 |AdKeywordsMethod|/ad_keywords|This report shows you ads copies that pop up for the queried keyword in Google paid search results.|
 |UrlKeywordsMethod|/url_keywords|The report lists keywords that URL ranks for in Google search results. |
 |UrlCompetitorsMethod|/url_competitors|Shows the list of URLs that compete with a queried URL in organic search.|
 |UrlMissingKeywordsMethod|/url_missing_keywords|Shows a list of keywords that competitors' URLs rank for in top-10 but that are missing from the queried page.|

### SDK Exceptions


| Exception Class | Code   | Message |
|---|---|---|
|ApiException |-| -|
|ApiInvalidRequestException|400|Invalid request|
|ApiLimitExceededException|402|Tariff limits exceeded|
|ApiAccessErrorException |403| Authorization problems (wrong token, forbidden action or user blocked)|
|ApiNoResultsException|404|No results|
|ApiFrequencyExceededException|429|Request frequency exceeded (increase the timeout between requests)|
|ApiServerException|500|Server error|
|InvalidParamException|500|Invalid parameter|
|ParseResponseException|500|Unable to parse response|
