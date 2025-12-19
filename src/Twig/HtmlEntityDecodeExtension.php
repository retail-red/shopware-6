<?php
declare(strict_types=1);

namespace Shopgate\Shopware\ClickAndReserve\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class HtmlEntityDecodeExtension extends AbstractExtension
{
    public function getFunctions(): array
    {
        return [
            new TwigFunction(
                'html_entity_decode',
                [$this, 'decode'],
                ['is_safe' => ['html']]
            ),
        ];
    }

    public function decode(?string $value, int $flags = ENT_QUOTES | ENT_HTML5, string $encoding = 'UTF-8'): string
    {
        if ($value === null) {
            return '';
        }

        return html_entity_decode($value, $flags, $encoding);
    }
}
