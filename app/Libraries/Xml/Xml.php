<?php
namespace App\Libraries\Xml;

class Xml
{
	public function XmlToArray(&$xmlData)
	{
        $parser = xml_parser_create();
        xml_parser_set_option($parser,XML_OPTION_CASE_FOLDING,0);
        xml_parser_set_option($parser,XML_OPTION_SKIP_WHITE,1);
        xml_parse_into_struct($parser,$xmlData,$tags);
        $element = array();
        foreach ($tags as $tag) {
            if ($tag['type'] == 'open' || $tag['type'] == 'complete') {
                if (isset($tag['attributes'])) {
                    $element[$tag['tag']][] = $tag['attributes'];
                }
            }
        }
        return $element;
	}
}

