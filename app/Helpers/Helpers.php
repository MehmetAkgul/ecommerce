<?php


namespace App\Helpers;


class Helpers
{
   public static function clearAllStorage()
    {
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('key:generate');
        $dirs = [
            '/storage/debugbar', '/storage/views', '/storage/logs', '/storage/framework/sessions'
        ];
        foreach ($dirs as $dir) {
            $file_dir = base_path() . $dir;
            foreach (glob($file_dir . '/*') as $file) {
                if (!is_dir($file)) {
                    unlink($file);
                }
            }
        }
    }

    //TÜRKÇE KARAKTELER İÇİN SLUG FONKSİYONU --- SLUG FUNCTION FOR TURKISH CHARACTERS
    public static function slugify($str, $options = array())
    {
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => true
        );
        $options = array_merge($defaults, $options);
        $char_map = array(
            // Latin
            'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
            'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
            'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
            'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
            'ß' => 'ss',
            'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
            'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
            'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
            'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
            'ÿ' => 'y',
            // Latin symbols
            '©' => '(c)',
            // Greek
            'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
            'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
            'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
            'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
            'Ϋ' => 'Y',
            'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
            'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
            'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
            'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
            'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
            // Turkish
            'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
            'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
            // Russian
            'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
            'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
            'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
            'Я' => 'Ya',
            'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
            'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
            'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
            'я' => 'ya',
            // Ukrainian
            'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
            'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
            // Czech
            'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
            'Ž' => 'Z',
            'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
            'ž' => 'z',
            // Polish
            'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
            'Ż' => 'Z',
            'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
            'ż' => 'z',
            // Latvian
            'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
            'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
            'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
            'š' => 's', 'ū' => 'u', 'ž' => 'z'
        );
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        $str = trim($str, $options['delimiter']);
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }

   public static function toWord($string)//Slug düzelt
    {
        // 'create-user', 'Create User'
        $string = str_replace('_', ' ', $string);
        $string = str_replace('-', ' ', $string);
        return ucwords($string);
    }

   public static function subString($text, $length)
    {
        $text = substr($text, 0, $length) . "...";
        $lastText = strrchr($text, " ");
        $text = str_replace($lastText, " ...", $text);
        return $text;
    }

   public static function getStartOfDate($date)
    {
        return date('Y-m-d', strtotime($date)) . ' 00:00';
    }

   public static function getEndOfDate($date)
    {
        return date('Y-m-d', strtotime($date)) . ' 23:59';
    }

   public static function unHtmlSpecialChars($string)
    {
        $string = str_replace("&#286;", "Ğ", $string);
        $string = str_replace("&#287;", "ğ", $string);
        $string = str_replace("&#304;", "İ", $string);
        $string = str_replace("&#305", "ı", $string);
        $string = str_replace("&#350;", "Ş", $string);
        $string = str_replace("&#351", "ş", $string);
        $string = str_replace("&ccedil;", "ç", $string);
        $string = str_replace("&Ccedil;", "Ç", $string);
        $string = str_replace("&yacute;", "ı", $string);
        $string = str_replace("&Ouml;", "Ö", $string);
        $string = str_replace('&ouml;', 'ö', $string);
        $string = str_replace("&Uuml;", "Ü", $string);
        $string = str_replace("&ETH;", "Ğ", $string);
        $string = str_replace("&THORN;", "Ş", $string);
        $string = str_replace("&Yacute;", "İ", $string);
        $string = str_replace("&thorn;", "ş", $string);
        $string = str_replace("&eth;", "ğ", $string);
        $string = str_replace("&uuml;", "ü", $string);
        $string = str_replace("&amp;", "&", $string);
        $string = str_replace("&nbsp;", " ", $string);
        $string = str_replace('', '\'', $string);
        $string = str_replace('&#039;', '\'', $string);
        $string = str_replace('[b]', '', $string);
        $string = str_replace('[/b]', '', $string);
        $string = str_replace('&quot;', '"', $string);
        $string = str_replace('&lt;', '<', $string);
        $string = str_replace('&gt;', '>', $string);
        $string = str_replace('&auml;', 'ä', $string);
        $string = str_replace('&Auml;', 'Ä', $string);
        $string = str_replace('[img]', '', $string);
        $string = str_replace('[/img]', '', $string);
        return $string;
    }


    //Bu fonksiyon DenemeDeneme şeklinde verilen studlyCase tipindeki bir değeri Deneme Deneme şeklinde boşluk koyarak yazar
    //This function writes a value of type Studly Case given as "TrialTrial" with a space as "Trial Trial"
    function fromStudlyCase($value)
    {
        return implode(' ', preg_split('/(?<=[a-z])(?=[A-Z])|(?=[A-Z][a-z])/', $value, -1, PREG_SPLIT_NO_EMPTY));
    }

    //Bu fonksiyon iki tane space'i bir taneye düşürür
    //This function reduces two spaces to one
   public static function replaceSpaces($value)
    {
        return str_replace(' ', '', $value);
    }

   public static function randomString($length, $type = 'token')
    {
        if ($type === 'password') {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_-=+;:,.?";
        } elseif ($type === 'username') {
            $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        } else {
            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        }
        $token = substr(str_shuffle($chars), 0, $length);
        return $token;
    }


   public static function up_tr($data)
    {
        $k = array('ı', 'i', 'ş', 'ö', 'ğ', 'ç', 'ü');
        $b = array('I', 'İ', 'Ş', 'Ö', 'Ğ', 'Ç', 'Ü');
        $data = str_replace($k, $b, $data);
        $data = mb_convert_case($data, MB_CASE_UPPER, "UTF-8");
        return $data;
    }

   public static function down_tr($data)
    {
        $k = array('ı', 'i', 'ş', 'ö', 'ğ', 'ç', 'ü');
        $b = array('I', 'İ', 'Ş', 'Ö', 'Ğ', 'Ç', 'Ü');
        $data = str_replace($b, $k, $data);
        $data = mb_convert_case($data, MB_CASE_LOWER, "UTF-8");
        return $data;
    }


   public static function one_tr($data)
    {
        $k = array('ı', 'i', 'ş', 'ö', 'ğ', 'ç', 'ü');
        $b = array('I', 'İ', 'Ş', 'Ö', 'Ğ', 'Ç', 'Ü');
        $data = str_replace($b, $k, $data);
        $data = mb_convert_case($data, MB_CASE_TITLE, "UTF-8");
        return $data;
    }


}
