<?php

namespace App\Rules\Readers;

class CsvRulesReader extends RulesReader
{
    public function parseRules()
    {
        $parsedRules['prices'] = [];

        $parsedRules['specialPrices'] = [];

        $row = 0;

        $handle = fopen($this->fileName, "r");

        if (!$handle) {
            return $parsedRules;
        }

        while (($data = fgetcsv($handle, 1000, ","))) {
            $row++;
            if ($row === 1) {
                continue;
            }

            $num = count($data);

            $parsedRules['prices'][$data[0]] = $data[1];

            if ($num === 3) {
                $specialPricesCondition = explode('for', $data[2]);

                $parsedRules['specialPrices'][$data[0]] = [
                    trim($specialPricesCondition[0]) => trim($specialPricesCondition[1])
                ];
            }
        }

        fclose($handle);


        return $parsedRules;
    }
}