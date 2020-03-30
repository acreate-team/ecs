<?php  

    namespace backend\helpers;

    class Tools {
        public static function translit2url($str)
        {
            $transliteration = array(
                'А' => 'A', 'а' => 'a',
                'Б' => 'B', 'б' => 'b',
                'В' => 'V', 'в' => 'v',
                'Г' => 'G', 'г' => 'g',
                'Д' => 'D', 'д' => 'd',
                'Е' => 'E', 'е' => 'e',
                'Ё' => 'Yo', 'ё' => 'yo',
                'Ж' => 'Zh', 'ж' => 'zh',
                'З' => 'Z', 'з' => 'z',
                'И' => 'I', 'и' => 'i',
                'Й' => 'J', 'й' => 'j',
                'К' => 'K', 'к' => 'k',
                'Л' => 'L', 'л' => 'l',
                'М' => 'M', 'м' => 'm',
                'Н' => "N", 'н' => 'n',
                'О' => 'O', 'о' => 'o',
                'П' => 'P', 'п' => 'p',
                'Р' => 'R', 'р' => 'r',
                'С' => 'S', 'с' => 's',
                'Т' => 'T', 'т' => 't',
                'У' => 'U', 'у' => 'u',
                'Ф' => 'F', 'ф' => 'f',
                'Х' => 'H', 'х' => 'h',
                'Ц' => 'Cz', 'ц' => 'cz',
                'Ч' => 'Ch', 'ч' => 'ch',
                'Ш' => 'Sh', 'ш' => 'sh',
                'Щ' => 'Shh', 'щ' => 'shh',
                'Ъ' => '', 'ъ' => '',
                'Ы' => 'y', 'ы' => 'y',
                'Ь' => '', 'ь' => '',
                'Э' => 'e', 'э' => 'e',
                'Ю' => 'Yu', 'ю' => 'yu',
                'Я' => 'Ya', 'я' => 'ya',
                '№' => '_',
                '’' => '_', '_' => ' ', '=' => ' ',
            );

            $str = strtr($str, $transliteration);
            $str = mb_strtolower($str, 'UTF-8');
            $str = trim(preg_replace('/\s+/', ' ', $str));
            $str = str_replace(' ', '_', $str);
            $str = preg_replace('/[^a-z0-9_\-]/iu', '', $str);
            $str = preg_replace('|([-]+)|s', '_', $str);

            return $str;
        }
    }