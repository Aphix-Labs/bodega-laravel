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

        foreach ($this->getLines() as $words) {
            if ($this->isProduct($words)) {
                $products[] = $this->parseProduct($words, $lastCategory);
            } elseif ($this->isCategory($words)) {
                $lastCategory = $words[0];
            }
        }
        return $products;
    }

    private function getLines()
    {
        return $this->content;
    }

    private function splitLinesIntoWords($line)
    {
        return explode(" ", $line);
    }

    private function isProduct($words)
    {
        return is_numeric($words[0]) && count($words) > 3;
    }

    private function isCategory($words)
    {
        return count($words) == 1
            && ! starts_with($words[0], 'Listado')
            && ! starts_with($words[0], '(Actualizada');
    }

    private function parseProduct($words, $lastCategory = null)
    {
        $p = [];

        $p['code'] = $words[0];

        $p['brand'] = $words[1];

        // Price is last element of the line. Also remove $ sign
        $p['price'] = $words[4];

        // Second last element of the line
        $p['quantity'] = (int)$words[3];

        // Needs to improved!
        $p['category'] = $lastCategory;

        // Name are the remaining words
        $p['name'] = $words[2];

        return $p;
    }
}
