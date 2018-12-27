<?php

namespace App\Rules\Readers;

class CsvRulesReader extends RulesReader
{
    /**
     * Parses the rules in the fileName to an array in order to interpret prices and special offers.
     *
     * @return array
     */
    public function parseRules()
    {
        $parsedRules = ['prices' => [], 'specialPrices' => []];

        $row = 0;

        $file = fopen($this->fileName, "r");

        if (!$file) {
            return $parsedRules;
        }

        while (($pricesRow = fgetcsv($file, 1000, ","))) {
            $row++;
            if ($row === 1) {
                continue;
            }

            $parsedRules = $this->extractPrice($pricesRow, $parsedRules);
        }

        fclose($file);

        return $parsedRules;
    }

    /**
     * Reads the price and special price condition of an item and saves it in an array.
     *
     * @param $pricesRow
     * @param $parsedRules
     *
     * @return mixed
     */
    private function extractPrice($pricesRow, $parsedRules)
    {
        $rowLength = count($pricesRow);

        $parsedRules['prices'][$pricesRow[0]] = $pricesRow[1];

        if ($rowLength === 3) {
            $specialPricesCondition = explode('for', $pricesRow[2]);

            $parsedRules['specialPrices'][$pricesRow[0]] = [
                trim($specialPricesCondition[0]) => trim($specialPricesCondition[1])
            ];
        }

        return $parsedRules;
    }
}
