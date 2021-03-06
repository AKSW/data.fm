<?php
/* help.php
 * service help page
 *
 * $Id$
 */

require_once('runtime.php');

defined('HEADER') || include_once('header.php');
?>
<a href="https://github.com/linkeddata/data.fm"><img style="position: absolute; top: 0; right: 0; border: 0;" src="https://a248.e.akamai.net/assets.github.com/img/71eeaab9d563c2b3c590319b398dd35683265e85/687474703a2f2f73332e616d617a6f6e6177732e636f6d2f6769746875622f726962626f6e732f666f726b6d655f72696768745f677261795f3664366436642e706e67" alt="Fork me on GitHub"></a>

<p class="cleft left">This web data platform supports several generations of standards and recommendations:</p>
<ul class="cleft left">
<li>Web 1 and 2: DAV, AJAX, <a target="_blank" href="http://en.wikipedia.org/wiki/JSONP">JSONP</a>, <a target="_blank" href="http://enable-cors.org/">CORS</a></li>
<li>Read/Write Linked Data, RDF/XML/JSON content negotiation, <a target="_blank" href="http://www.w3.org/TR/sparql11-query/">SPARQL 1.1</a>, and <a target="_blank" href="http://www.w3.org/wiki/WebID">WebID</a></li>
</ul>

<p class="cleft left">All endpoints interpret the HTTP request URI as the base URI for RDF operations and the default-graph URI for SPARQL operations.</p>
<p class="cleft left">Specify the media type of your request data with a <code>Content-Type</code> HTTP header.<br />
Specify your response type preference with an <code>Accept</code> HTTP header.</p>

<div id="http-methods" class="cleft left" style="margin: 0.5em; padding: 0.5em;">
<h4>Request methods:</h4>
<ul>
<li>Read: GET, HEAD, OPTIONS</li>
<li>Write: PUT, MKCOL, DELETE</li>
<li>Append: POST</li>
<li>Update:
    <ul>
        <li>JSON PATCH (application/json)</li>
        <li>SPARQL POST (*/sparql-query)</li>
    </ul>
</li>
</ul>
</div>

<div id="output-types" class="left" style="margin: 0.5em; padding: 0.5em;">
<h4>Response types:</h4>
<ul>
<li>Web (index.html, style.css, script.js)</li>
<li>JSON (Accept */json)</li>
<li>JSON-P (GET ?callback=)</li>
<li>SPARQL JSON (GET/POST ?query=)</li>
<li>RSS (Accept */rss+xml)</li>
<li>Atom (Accept */atom+xml)</li>
</ul>
</div>

<div id="media-types" class="left" style="margin: 0.5em; padding: 0.5em;">
<h4>RDF media types:</h4>
<ul>
<li>JSON: application/json</li>
<li>NTriples: */rdf+nt, */nt</li>
<li>RDF/XML: */rdf+xml</li>
<li>RDFa: */html, */xhtml</li>
<li>Turtle: */turtle, */rdf+n3, */n3</li>
</ul>
(defaults to Turtle)
</div>


<div class="clear left">
<dl>
<dt>*/type</dt><dd>refers to a media type, specified in HTTP header (Accept or Content-Type)</dd>
<dt>name.ext</dt><dd>refers to a filename, specified by HTTP request URI</dd>
<dt>?k=v</dt><dd>refers to a query string parameter 'k' with value 'v': passed in URL via GET or application/x-www-form-urlencoded via POST</dd>
</dl>
<p>Some query string options and response (HTTP Accept) media types are complementary.</p>
</div>

<?php if (substr($_SERVER['SERVER_ADDR'], 0, 3) == '18.') { ?>
<p class="clear left">All uses of this service must comply with the <a target="_blank" href="http://ist.mit.edu/services/athena/olh/rules#mitnet">MITnet rules of use</a>.</p>
<?php }
TAG(__FILE__, __LINE__, '$Id$');
defined('FOOTER') || include_once('footer.php');
