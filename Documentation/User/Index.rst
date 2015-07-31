.. ==================================================
.. FOR YOUR INFORMATION
.. --------------------------------------------------
.. -*- coding: utf-8 -*- with BOM.

.. include:: ../Includes.txt


.. _user-manual:

Users Manual
============

Target group: **Editors**

Organisations, persons and groups are created using the "List" module. How and which fields are displayed in the frontend
depends on your developer's template implementation. Usually you would have a list and when you click on a item a single-
view would open on the same page.

.. caution::

   Even though it is possible to create Address Data it is not recommended, as there are only views for organisations,
   persons and groups. So if you want to display your data, you would need one of those. Usually there is no such thing
   as only an address.

There are three plugIns to show your data in the frontend: "Display Groups", "Display Organisations" and "Display
Persons". The configuration options for all three plugins are mainly the same. The options are divided into three:
"General Options", "Layout Options" and "Resource Options".

The "General Options"-Tab provides fields to configure which data shall be displayed. It is for example possible to
display all organisations or only the ones contained by special groups or related to special categories. Furthermore the
sorting of the result can be chosen.

In the "Layout Options"-Tab a layout can be chosen. The list depends on the developer's template implementation. If
a "Page with Main List" is chosen, the single view will switch to this page and the "Back to List"-Link will also link
to that main list.

The administrator can set global resource pages, so usually the "Resource Options"-Tab is not needed. But if data should
be somewhere else then announced in the admin-settings, a page can be set and data shall be looked for at the given
page (only).
