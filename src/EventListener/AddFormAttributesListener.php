<?php

declare(strict_types=1);

/*
 * (c) INSPIRED MINDS
 */

namespace InspiredMinds\ContaoWebMcpForms\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\String\HtmlAttributes;
use Contao\FormModel;
use Contao\Template;

#[AsHook('parseTemplate')]
class AddFormAttributesListener
{
    public function __invoke(Template $template): void
    {
        if ('form_inline' !== $template->getName()) {
            return;
        }

        if (!$form = FormModel::findById($template->id)) {
            return;
        }

        $template->attributes = (new HtmlAttributes($template->attributes))
            ->setIfExists('toolname', $form->webmcp_toolname)
            ->setIfExists('tooldescription', $form->webmcp_tooldescription)
            ->set('toolautosubmit', '', $form->webmcp_toolautosubmit)
        ;
    }
}
