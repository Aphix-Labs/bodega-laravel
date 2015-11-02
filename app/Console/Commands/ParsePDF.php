<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ParsePage;
use App\Product;

class ParsePDF extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:pdf';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parsea y actualiza los datos desde el PDF de pcfactory';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Parse pdf file and build necessary objects.
        $parser = new \Smalot\PdfParser\Parser();
        $pdf    = $parser->parseFile(app_path('Sample/pcfactory_lista_ventadebodega'));

        $pages  = $pdf->getPages();

        foreach ($pages as $page) {
            $p = new ParsePage($page->getArray());
            $products = $p->parseProducts();

            foreach ($products as $product) {
                $p = Product::whereCode($product['code'])->first();
                if (is_null($p)) {
                    $p = new Product;
                }
                $p->fill($product);
                $p->save();
            }
        }
    }
}
