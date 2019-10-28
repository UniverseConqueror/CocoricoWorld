<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class AppExtension extends AbstractExtension
{
    public function getFilters(): array
    {
        return [
            // If your filter generates SAFE HTML, you should add a third
            // parameter: ['is_safe' => ['html']]
            // Reference: https://twig.symfony.com/doc/2.x/advanced.html#automatic-escaping
            new TwigFilter('truncate', [$this, 'truncate']),
            new TwigFilter('json_decode', [$this, 'json_decode']),
        ];
    }

    /**
     * Split a string according to a given size.
     *
     * {{ post.description|truncate(15, "...") }}
     *
     * @param string $value     The string that will be formatted
     * @param int    $length    The maximum length of the string
     * @param string $separator The separator that will be displayed at the end of the chain if it is too long
     *
     * @return string The formatted string
     */
    public function truncate(string $value, int $length, string $separator)
    {
        if (strlen($value) > $length) {

            return substr($value, 0, $length - 1) . $separator;
        }
        else {

            return $value;
        }
    }

    /**
     * Convert the given json string into a single php displayable string.
     *
     * {{ user.roles|json_decode }}
     *
     * @param array $json The json string which will be converted into a simple php string
     *
     * @return mixed
     */
    public function json_decode(array $json)
    {
        return implode(" ", $json);
    }
}
