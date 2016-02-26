<?php

// locale: russian (ru)
// author: Fabien Warniez https://github.com/fabienwarniez

$plural = function ($word, $num) {
    $forms = explode('_', $word);
    return $num % 10 === 1 && $num % 100 !== 11 ? $forms[0] : ($num % 10 >= 2 && $num % 10 <= 4 && ($num % 100 < 10 || $num % 100 >= 20) ? $forms[1] : $forms[2]);
};

$relativeTimeWithPlural = function ($number, $withoutSuffix, $key) use ($plural) {
    $format = [
        'mm' => $withoutSuffix ? 'минута_минуты_минут' : 'минуту_минуты_минут',
        'hh' => 'час_часа_часов',
        'dd' => 'день_дня_дней',
        'MM' => 'месяц_месяца_месяцев',
        'yy' => 'год_года_лет'
    ];
    if ($key === 'm') {
        return $withoutSuffix ? 'минута' : 'минуту';
    } else {
        return $number . ' ' . $plural($format[$key], +$number);
    }
};

return array(
    'months'        => explode('_', 'janvier_février_mars_avril_mai_juin_juillet_août_septembre_octobre_novembre_décembre'),
    'monthsShort'   => explode('_', 'janv._févr._mars_avr._mai_juin_juil._août_sept._oct._nov._déc.'),
    'weekdays'      => explode('_', 'lundi_mardi_mercredi_jeudi_vendredi_samedi_dimanche'),
    'weekdaysShort' => explode('_', 'Вс_Пн_Вт_Ср_Чт_Пт_Сб'),
    'calendar'      => array(
        'sameDay'  => '[Сегодня в] LT',
        'nextDay'  => '[Завтра в] LT',
        'lastDay'  => '[Вчера в] LT',
        'lastWeek' => 'l [dernier]',
        'sameElse' => 'l',
        'withTime' => '[á] H:i',
        'default'  => 'd/m/Y',
    ),
    'relativeTime'  => array(
        'future' => 'через %s',
        'past'   => '%s назад',
        's'      => 'несколько секунд',
        'm'      => $relativeTimeWithPlural,
        'mm'     => $relativeTimeWithPlural,
        'h'      => 'час',
        'hh'     => $relativeTimeWithPlural,
        'd'      => 'день',
        'dd'     => $relativeTimeWithPlural,
        'M'      => 'месяц',
        'MM'     => $relativeTimeWithPlural,
        'y'      => 'год',
        'yy'     => $relativeTimeWithPlural,
    ),
    'ordinal'       => function ($number, $period) {
        switch ($period) {
            case 'M':
            case 'd':
            case 'DDD':
                return $number . '-й';
            case 'D':
                return $number . '-го';
            case 'w':
            case 'W':
                return $number . '-я';
            default:
                return $number;
        }
    },
    'week'          => array(
        'dow' => 1, // Monday is the first day of the week.
        'doy' => 7  // The week that contains Jan 4th is the first week of the year.
    ),
);