<?php

namespace App;

class ParsePage
{
    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function parseProducts()
    {
        $products = [];
        $lastCategory = null;

        foreach ($this->getLines() as $line) {
            $words = $this->splitLinesIntoWords($line) ;
            if ($this->isProduct($words)) {
                $products[] = $this->parseProduct($words, $lastCategory);
            } else {
                $lastCategory = $line;
            }
        }
        return $products;
    }

    private function getLines()
    {
        return explode("\n", $this->content);
    }

    private function splitLinesIntoWords($line)
    {
        return explode(" ", $line);
    }

    private function isProduct($words)
    {
        return is_numeric($words[0]);
    }

    private function parseProduct($words, $lastCategory)
    {
        $p = [];

        $p['code'] = $words[0];

        $p['brand'] = $words[1];

        // Price is last element of the line. Also remove $ sign
        $p['price'] = substr($words[ count($words)- 1], 1);

        // Second last element of the line
        $p['quantity'] = (int)$words[ count($words) - 2];

        // Needs to improved!
        $p['category'] = $lastCategory;

        // Name are the remaining words
        $name = '' ;
        foreach (range(2, count($words) - 2) as $index) {
            if (isset($words[$index])) {
                $name = $name . ' ' . $words[$index];
            } else {
                echo 'No esta indice 2 \n';
                var_dump($words);
            }
        }
        $p['name'] = $name;

        return $p;
    }
}
