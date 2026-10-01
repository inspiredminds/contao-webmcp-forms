<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\ContaoWebMcpForms\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Widget;

#[AsHook('loadFormField')]
class AddFormFieldAttributesListener
{
    public function __invoke(Widget $widget): Widget
    {
        if ($widget->webmcp_toolparamdescription) {
            $widget->addAttribute('toolparamdescription', $widget->webmcp_toolparamdescription);
        }

        return $widget;
    }
}
