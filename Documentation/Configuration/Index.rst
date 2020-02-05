.. include:: ../Includes.txt

.. _configuration:

=============
Configuration
=============


Example configuration
=====================

The following page TSconfig snippet shows the configuration for the first button "General" on default pages.

Example: ::

    mod {
        web_layout {
            PageTypes {
                // Default Page
                1 {
                    config {
                        10 {
                            label = LLL:EXT:quickedit/Resources/Private/Language/Backend.xlf:defaultPageType.group.general
                            fields = title, subtitle, nav_title, slug
                            previewFields = *
                        }
                    }
                }
            }
        }
    }

All configurations need to be done in the following structure:

mod.web_layout.PageTypes.[PageType-Number].config

Inside of the config block every button is represented by a number, similar to the usage in a TypoScript COA object.


Page TSconfig properties
========================

.. container:: ts-properties

    ==============   ========
    Property         Data type
    ==============   ========
    label_           string
    fields_          string
    previewFields_   string
    ==============   ========

.. _tsLabel:

label
"""""
.. container:: table-row

    Property
        label
    Data type
        string
    Description
         The label for the toolbar button group.

.. _tsFields:

fields
""""""
.. container:: table-row

    Property
        fields
    Data type
        string
    Description
        A comma separated list of fields which can be edited with this group button.

.. _tsPreviewFields:

previewFields
"""""""""""""
.. container:: table-row

    Property
        previewFields
    Data type
        string
    Description
        Defines which fields are displayed in the preview tooltip.
        It is possible to define different fields for preview than used for the 'fields' setting.
        By using the '*' all page properties defined for 'fields' will be used for the preview as well.


Create your own configuration
=============================

As TYPO3 allows you to create your own special page types you might also want to have
your own toolbar configuration for them.

To do so you only have to create a page TSconfig configuration using the doctype of your own page type.
The following code shows a small example for a Virtual event page with doctype 116: ::

    mod {
        web_layout {
            PageTypes {
                // Virtual event
                116 < .1
                116 {
                    config {
                        15 {
                            label = Virtual Event
                            fields = virtual_event_date, virtual_event_time, virtual_event_registrationlink, virtual_event_location
                            previewFields = *
                        }
                    }
                }
            }
        }
    }

