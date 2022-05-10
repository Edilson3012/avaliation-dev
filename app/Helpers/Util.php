<?php

use Carbon\Carbon;

function formatDateAndTime($value, $format = 'd/m/Y')
{
    // Utiliza a classe de Carbon para converter ao formato de data ou hora desejado
    return Carbon::parse($value)->format($format);
}
