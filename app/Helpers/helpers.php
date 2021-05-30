<?php

if (!function_exists('stipr_string')) {
   function strip_string(string $text): string
   {
      return mb_substr($text, 0, 20);
   }
}

if (!function_exists('coins_to_bucks')) {
   function coins_to_bucks(string $coins): float
   {
      return (float) $coins / 100;
   }
}
