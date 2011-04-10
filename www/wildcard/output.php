<?php
# output.php
# HTTP output handler
#
# $Id$

// negotiation: parse HTTP Accept
$_accept = isset($_SERVER['HTTP_ACCEPT']) ? $_SERVER['HTTP_ACCEPT'] : '';
$_accept_list = array();
$_accept_data = array();
foreach (explode(',', $_accept) as $elt) {
    $elt = explode(';', $elt);
    if (count($elt) == 1) {
        $_accept_list[] = trim($elt[0]);
    } elseif (count($elt) == 2) {
        $_accept_data[trim($elt[0])] = (float)substr($elt[1], 2);
    }
}
asort($_accept_data, SORT_NUMERIC);
$_accept_data = array_reverse($_accept_data);

$_accept_type_map = array(
    '/rdf+n3' => 'turtle',
    '/n3' => 'turtle',
    '/turtle' => 'turtle',
    '/rdf+nt' => 'ntriples',
    '/nt' => 'ntriples',
    '/rdf+xml' => 'rdfxml-abbrev',
    '/rdf' => 'rdfxml-abbrev',
    '/json' => 'json',
    '/atom+xml' => 'atom',
    '/rss+xml' => 'rss-1.0',
    '/rss' => 'rss-1.0',
    '/dot' => 'dot'
);

$_output = '';
$_output_type = null;
foreach ($_accept_list as $haystack) {
    foreach ($_accept_type_map as $needle=>$output) {
        if (strstr($haystack, $needle) !==FALSE) {
            $_output = $output;
            $_output_type = $haystack;
            break;
        }
    }
    if (!empty($_output)) break;
}
if (empty($output))
foreach (array_keys($_accept_data) as $haystack) {
    foreach ($_accept_type_map as $needle=>$output) {
        if (strstr($haystack, $needle) !==FALSE) {
            $_output = $output;
            $_output_type = $haystack;
            break;
        }
    }
    if (!empty($_output)) break;
}
