<?php
/**
 * Created by PhpStorm.
 * User: Mathias
 * Date: 16/06/2019
 * Time: 17:56
 */

class feed
{
    public $title = 'Blog - News Cast';
    public $link = 'www.ministrare.be';
    public $description = 'NewsCast';
    public $language = 'nl';

    public function __construct($RSSData = array())
    {
        // Instantiate a XMLWriter object:
        $xml = new XMLWriter();
        // Next open the file to which you want to write. For example, to write to /var/www/example.com/xml/output.xml, use:
        $xml->openURI($_SERVER['DOCUMENT_ROOT'].'/'.'repository/personal/PHP_fundamentals/myFeed.xml');
        // To start the document (create the XML open tag):
        $xml->startDocument('1.0', 'utf-8');
        // Set Indent to 4 spaces
        $xml->setIndent(4);

        $xml->startElement('rss');
        $xml->writeAttribute('version', '2.0');
        // Create the channel element
        $xml->startElement('channel');
        // Sets channel attributes
        $xml->writeElement('title', $this->title);
        $xml->writeElement('link', $this->link);
        $xml->writeElement('description', $this->description);
        $xml->writeElement('language', $this->language);
        // Create the image element
        $xml->startElement('image');
        // Sets image attributes
        $xml->writeElement('title', '');
        $xml->writeElement('link','');
        $xml->writeElement('url','');
        $xml->writeElement('width','');
        $xml->writeElement('height','');
        // Closes the image element
        $xml->endElement();
        // Create the image element
        foreach ($RSSData as $item){
            $xml->startElement('item');
            // Sets item attributes
            $xml->writeElement('title', $item['title']);
            $xml->writeElement('body', $item['body']);
            $xml->writeElement('create_date', $item['create_date']);
            $xml->writeElement('user', $item['user_id']);
            $xml->writeElement('author', '');
            $xml->writeElement('comments', '');
            $xml->writeElement('category', '');
            $xml->writeElement('author', '');
            // Closes the item element
            $xml->endElement();
        }

        // Closes the channel element
        $xml->endElement();
// Closes the RSS element
        $xml->endElement();
    }
}