<?php

declare(strict_types=1);

namespace PunktDe\Quickedit\ViewHelpers\Be;

/**
 * (c) 2020 https://punkt.de GmbH - Karlsruhe, Germany - https://punkt.de
 * All rights reserved.
 */

use TYPO3\CMS\Backend\Routing\UriBuilder;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * This class is required in TYPO3 9 to allow defining editable fields in link.
 *
 * @package PunktDe
 * @subpackage Quickedit
 * @deprecated Can be replaced with the core viewhelper in TYPO3 10 LTS
 */
class EditRecordViewHelper extends \TYPO3\CMS\Backend\ViewHelpers\Link\EditRecordViewHelper
{
    /**
     * Initialize arguments
     *
     * @return void
     * @api
     */
    public function initializeArguments(): void
    {
        parent::initializeArguments();
        if (!array_key_exists('fields', $this->argumentDefinitions)) {
            $this->registerArgument('fields', 'string', 'list of fields to edit');
        }
    }



    /**
     * @return string
     * @throws \TYPO3\CMS\Backend\Routing\Exception\RouteNotFoundException
     */
    public function render(): string
    {
        if ($this->arguments['uid'] < 1) {
            throw new \InvalidArgumentException(
                'Uid must be a positive integer, ' . $this->arguments['uid'] . ' given.', 1526127158
            );
        }
        if (empty($this->arguments['returnUrl'])) {
            $this->arguments['returnUrl'] = GeneralUtility::getIndpEnv('REQUEST_URI');
        }

        $params = [
            'edit' => [$this->arguments['table'] => [$this->arguments['uid'] => 'edit']],
            'returnUrl' => $this->arguments['returnUrl'],
            'columnsOnly' => $this->arguments['fields']
        ];
        $uriBuilder = GeneralUtility::makeInstance(UriBuilder::class);
        /** @var UriBuilder $uri */
        $uri = (string)$uriBuilder->buildUriFromRoute('record_edit', $params);
        $this->tag->addAttribute('href', $uri);
        $this->tag->setContent($this->renderChildren());
        $this->tag->forceClosingTag(true);

        return $this->tag->render();
    }
}
