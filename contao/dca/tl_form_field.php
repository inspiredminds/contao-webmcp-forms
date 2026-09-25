<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

use Doctrine\DBAL\Types\Types;

$GLOBALS['TL_DCA']['tl_form_field']['fields']['webmcp_toolparamdescription'] = [
    'exclude' => true,
    'inputType' => 'text',
    'eval' => ['tl_class' => 'w50', 'maxlength' => 255],
    'sql' => ['type' => Types::STRING, 'length' => 255, 'default' => ''],
];
