<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\ContaoWebMcpForms\EventListener\DataContainer;

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;

#[AsCallback('tl_form_field', 'config.onload', priority: -100)]
class AdjustFormFieldPalettesListener
{
    public function __construct(private readonly array $additionalTypes = ['select', 'radio', 'checkbox'])
    {
    }

    public function __invoke(DataContainer $dc): void
    {
        foreach ($GLOBALS['TL_DCA'][$dc->table]['palettes'] as $type => $palette) {
            if (!\is_string($palette) || 'default' === $type) {
                continue;
            }

            if (str_contains($palette, ',value') || \in_array($type, $this->additionalTypes, true)) {
                PaletteManipulator::create()
                    ->addLegend('webmcp_legend', 'template_legend', PaletteManipulator::POSITION_BEFORE)
                    ->addField('webmcp_toolparamdescription', 'webmcp_legend', PaletteManipulator::POSITION_APPEND)
                    ->applyToPalette($type, $dc->table)
                ;
            }
        }
    }
}
