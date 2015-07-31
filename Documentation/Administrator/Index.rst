.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _admin-manual:

Administrator and Developer Manual
==================================

Target group: **Administrators** and **Developers**

.. _admin-installation:

Installation
------------

The extension can be installed via the Extension Manager.
 * include static templates
 * add a path to your templates and partials in the static files
 * use the default layout only or add new layout options via TSConfig
 * set the right storagePid(s)

The Extension can also be found on GitHub https://github.com/599media/fnn_address
Please feel free to also leave your comments and/or suggestions for a better extension.


.. _admin-configuration:

Configuration
-------------

TypoScript
^^^^^^^^^^

.. code-block:: typoscript

    plugin.tx_fnnaddress {

    	view {
    		templateRootPaths {
    			0   = {$plugin.tx_fnnaddress.view.templateRootPaths}
    			10  = EXT:my_ext/Resources/Private/Templates/
    		}
    		partialRootPaths {
    			0 = {$plugin.tx_fnnaddress.view.partialRootPaths}
    		}
    		layoutRootPaths{
    			0 = {$plugin.tx_fnnaddress.view.layoutRootPath}
    		}
    	}

    	persistence {
    		storagePid = {$plugin.tx_fnnaddress.persistence.storagePid}
    		classes {
                Fnn\FnnAddress\Domain\Model\Content {
                    mapping {
                        tableName = tt_content
                    }
                }
            }
    	}
    }

To make list-view and single-view (which are on the same page) work with real_url, the following lines need to be in
the setup.txt (preferably in the beginning).

.. code-block:: typoscript

    [globalVar = GP:tx_fnnaddress_displaypersons|person > 0]
        config.defaultGetVars.tx_fnnaddress_displaypersons.action = show
        config.defaultGetVars.tx_fnnaddress_displaypersons.controller = Person
    [GLOBAL]

    [globalVar = GP:tx_fnnaddress_displayorganisations|organisation > 0]
        config.defaultGetVars.tx_fnnaddress_displayorganisations.action = show
        config.defaultGetVars.tx_fnnaddress_displayorganisations.controller = Organisation
    [GLOBAL]

TSConfig
^^^^^^^^

.. code-block:: typoscript

    tx_fnn_address {
        personLayouts {
            99 = LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:flexform.layout.default_list
        }
        organisationLayouts {
            99 = LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:flexform.layout.default_list
        }
        groupLayouts {
            99 = LLL:EXT:fnn_address/Resources/Private/Language/locallang_backend.xlf:flexform.layout.default_list
        }
    }

In the List-Template a partial can be chosen according to the chosen layout:

.. code-block:: html

    <f:if condition="{settings.templateLayout} == 99">
        <f:then>
            <div class="fnn-address-list">
                <f:for each="{persons}" as="person">
                    <f:render partial="Person/ListItem" arguments="{person:person}"/>
                </f:for>
            </div>
        </f:then>
    </f:if>

RealURL
^^^^^^^

.. code-block:: php

    $GLOBALS['TYPO3_CONF_VARS']['EXTCONF']['realurl'] = array (
        '_DEFAULT' => array (

            ...

            'fixedPostVars' => array (
                'fnn_address_organisation' => array(
                    array(
                        'GETvar' => 'tx_fnnaddress_displayorganisations[controller]',
                        'noMatch' => 'bypass',
                    ),
                    array(
                        'GETvar' => 'tx_fnnaddress_displayorganisations[action]',
                        'noMatch' => 'bypass',
                    ),
                    array (
                        'GETvar' => 'tx_fnnaddress_displayorganisations[organisation]',
                        'lookUpTable' => array (
                            'table' => 'tx_fnnaddress_domain_model_organisation',
                            'id_field' => 'uid',
                            'alias_field' => 'name',
                            'addWhereClause' => ' AND NOT deleted',
                            'useUniqueCache' => '1',
                            'useUniqueCache_conf' => array (
                                'strtolower' => '1',
                                'spaceCharacter' => '-',
                            )
                        )
                    )
                ),
                'fnn_address_person' => array(
                    array(
                        'GETvar' => 'tx_fnnaddress_displaypersons[controller]',
                        'noMatch' => 'bypass',
                    ),
                    array(
                        'GETvar' => 'tx_fnnaddress_displaypersons[action]',
                        'noMatch' => 'bypass',
                    ),
                    array (
                        'GETvar' => 'tx_fnnaddress_displaypersons[person]',
                        'lookUpTable' => array (
                            'table' => 'tx_fnnaddress_domain_model_person',
                            'id_field' => 'uid',
                            'alias_field' => "concat(first_name, ' ', last_name)",
                            'addWhereClause' => ' AND NOT deleted',
                            'useUniqueCache' => '1',
                            'useUniqueCache_conf' => array (
                                'strtolower' => '1',
                                'spaceCharacter' => '-',
                            )
                        )
                    )
                ),
                '[pageID]' => 'fnn_address_organisation',
                '[pageID]' => 'fnn_address_person'
            ),

            ...
        ),

    );