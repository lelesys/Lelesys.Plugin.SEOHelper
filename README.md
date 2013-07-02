Lelesys SEOHelper Plugin
=======

This plugin adds meta tags to TYPO3 Neos websites.

Setup
-----

Include the plugin's TypoScript definitions to your own one's (located in, for example, `Packages/Sites/Your.Site/Resources/Private/TypoScripts/Library/ContentElements.ts2`, with:

``include: resource://Lelesys.Plugin.SEOHelper/Private/TypoScripts/Library/NodeTypes.ts2
``
Note: The above path should be included after "page = TYPO3.Neos:Page"

Usage
-----

In the backend you need to select the page and you will see some extended page properties at the left where in you can add meta details.
Sliding of meta content is also possible with this plugin. If you add meta content in the root page then same meta content will be applied to other pages.
If the current page as meta content added then it will show added content.


