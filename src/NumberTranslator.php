<?php


class NumberTranslator
{
    private static $digits = [
        'english' => [
            '0',
            '1',
            '2',
            '3',
            '4',
            '5',
            '6',
            '7',
            '8',
            '9',
        ],
        'arabic' => [
            '٠',
            '١',
            '٢',
            '٣',
            '٤',
            '٥',
            '٦',
            '٧',
            '٨',
            '٩',
        ],
        'bengali' => [
            '০',
            '১',
            '২',
            '৩',
            '৪',
            '৫',
            '৬',
            '৭',
            '৮',
            '৯',
        ],
        'devanagari' => [
            '०',
            '१',
            '२',
            '३',
            '४',
            '५',
            '६',
            '७',
            '८',
            '९',
        ],
        'gujarati' => [
            '૦',
            '૧',
            '૨',
            '૩',
            '૪',
            '૫',
            '૬',
            '૭',
            '૮',
            '૯',
        ],
        'gurmukhi' => [
            '੦',
            '੧',
            '੨',
            '੩',
            '੪',
            '੫',
            '੬',
            '੭',
            '੮',
            '੯',
        ],
        'kannada' => [
            '೦',
            '೧',
            '೨',
            '೩',
            '೪',
            '೫',
            '೬',
            '೭',
            '೮',
            '೯',
        ],
        'khmer' => [
            '០',
            '១',
            '២',
            '៣',
            '៤',
            '៥',
            '៦',
            '៧',
            '៨',
            '៩',
        ],
        'lao' => [
            '໐',
            '໑',
            '໒',
            '໓',
            '໔',
            '໕',
            '໖',
            '໗',
            '໘',
            '໙',
        ],
        'limbu' => [
            '᥆',
            '᥇',
            '᥈',
            '᥉',
            '᥊',
            '᥋',
            '᥌',
            '᥍',
            '᥎',
            '᥏',
        ],
        'malayalam' => [
            '൦',
            '൧',
            '൨',
            '൩',
            '൪',
            '൫',
            '൬',
            '൭',
            '൮',
            '൯',
        ],
        'mongolian' => [
            '᠐',
            '᠑',
            '᠒',
            '᠓',
            '᠔',
            '᠕',
            '᠖',
            '᠗',
            '᠘',
            '᠙',
        ],
        'myanmar' => [
            '၀',
            '၁',
            '၂',
            '၃',
            '၄',
            '၅',
            '၆',
            '၇',
            '၈',
            '၉',
        ],
        'odia' => [
            '୦',
            '୧',
            '୨',
            '୩',
            '୪',
            '୫',
            '୬',
            '୭',
            '୮',
            '୯',
        ],
        'tamil' => [
            '௦',
            '௧',
            '௨',
            '௩',
            '௪',
            '௫',
            '௬',
            '௭',
            '௮',
            '௯',
        ],
        'telugu' => [
            '౦',
            '౧',
            '౨',
            '౩',
            '౪',
            '౫',
            '౬',
            '౭',
            '౮',
            '౯',
        ],
        'thai' => [
            '๐',
            '๑',
            '๒',
            '๓',
            '๔',
            '๕',
            '๖',
            '๗',
            '๘',
            '๙',
        ],
        'tibetan' => [
            '༠',
            '༡',
            '༢',
            '༣',
            '༤',
            '༥',
            '༦',
            '༧',
            '༨',
            '༩',
        ],
        'urdu' => [
            '۰',
            '۱',
            '۲',
            '۳',
            '۴',
            '۵',
            '۶',
            '۷',
            '۸',
            '۹',
        ],
    ];

    public static function __callStatic($name, $arguments)
    {
        $targetLang = strtolower(substr($name, 11));
        if(count($arguments) !== 1 || substr($name, 0, 11) !== 'translateTo' || !isset(self::$digits[$targetLang])) {
            throw new Exception('Bad method call.');
        }

        return self::translateToOtherLanguage($arguments[0], $targetLang);
    }

    public static function translateToEnglish($inputNmuber, $fromLang = 'english')
    {
        if(!isset(self::$digits[$fromLang])) {
            throw new Exception('Bad method call.');
        }

        $digitsArr = array_flip(self::$digits[$fromLang]);
        $translatedNumber = str_replace(array_keys($digitsArr), array_values($digitsArr), $inputNmuber);

        return $translatedNumber;
    }

    private static function translateToOtherLanguage($inputNumber, $targetLang)
    {
        $inputNumberArray = str_split($inputNumber);
        $numberArray = self::$digits[$targetLang];
        $translatedNumber = '';

        foreach ($inputNumberArray as $value) {
            $translatedNumber .= isset($numberArray[$value]) ? $numberArray[$value] : '';
        }

        return $translatedNumber;
    }
}