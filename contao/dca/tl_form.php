<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Doctrine\DBAL\Types\Types;

$GLOBALS['TL_DCA']['tl_form']['fields']['webmcp_toolname'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => Types::STRING, 'length' => 255, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_form']['fields']['webmcp_tooldescription'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => Types::STRING, 'length' => 255, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_form']['fields']['webmcp_toolautosubmit'] = [
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50'],
    'sql' => ['type' => Types::BOOLEAN, 'default' => false],
];

PaletteManipulator::create()
    ->addLegend('webmcp_legend')
    ->addField('webmcp_toolname', 'webmcp_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('webmcp_tooldescription', 'webmcp_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('webmcp_toolautosubmit', 'webmcp_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_form')
;
