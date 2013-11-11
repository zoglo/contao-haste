<?php

/**
 * Haste utilities for Contao Open Source CMS
 *
 * Copyright (C) 2012-2013 Codefog & terminal42 gmbh
 *
 * @package    Haste
 * @link       http://github.com/codefog/contao-haste/
 * @license    http://opensource.org/licenses/lgpl-3.0.html LGPL
 */

namespace Haste\Http\Response;

use Haste\Util\InsertTag;

class JsonResponse extends Response
{
    /**
     * Creates a new JSON encoded HTTP response
     * @param   array The response content
     * @param   integer The response HTTP status code
     * @throws  \InvalidArgumentException When the HTTP status code is not valid
     */
    public function __construct(array $arrContent, $intStatus = 200)
    {
        parent::__construct('', $intStatus);

        $this->strContent = $this->setContent($arrContent);
        $this->setHeader('Content-Type', 'application/json');
    }

    /**
     * Prepares the content
     * @param   string
     */
    protected function setContent($strContent)
    {
        // Replace insert tags
        $arrContent = InsertTag::replaceRecursively($strContent);
        $this->strContent = json_encode($arrContent);
    }
}
