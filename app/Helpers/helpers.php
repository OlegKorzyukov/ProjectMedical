<?php

if (!function_exists('stipr_string')) {
   function strip_string(string $text)
   {
      mb_substr($text, 0, 20);
   }
}
