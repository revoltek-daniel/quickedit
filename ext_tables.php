<?php
if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$GLOBALS['TBE_STYLES']['skins']['quickedit'] = [];
$GLOBALS['TBE_STYLES']['skins']['quickedit']['name'] = 'quickedit';
$GLOBALS['TBE_STYLES']['skins']['quickedit']['stylesheetDirectories']['css'] = 'EXT:quickedit/Resources/Public/Backend/Css/';


// Extend user settings
$GLOBALS['TYPO3_USER_SETTINGS']['columns']['disableQuickeditInPageModule'] = [
    'label' => 'LLL:EXT:quickedit/Resources/Private/Language/Backend.xlf:usersettings.disableQuickeditInPageModule',
    'type' => 'check'
];
$GLOBALS['TYPO3_USER_SETTINGS']['columns']['quickeditDefaultHidden'] = [
    'label' => 'LLL:EXT:quickedit/Resources/Private/Language/Backend.xlf:usersettings.quickeditDefaultHidden',
    'type' => 'check'
];

$GLOBALS['TYPO3_USER_SETTINGS']['showitem'] .= ',
            --div--;LLL:EXT:quickedit/Resources/Private/Language/Backend.xlf:usersettings.quickeditTab,disableQuickeditInPageModule,quickeditDefaultHidden';
