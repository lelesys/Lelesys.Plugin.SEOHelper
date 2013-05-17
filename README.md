Lelesys.Plugin.SEOHelper
======================

Quick start
-----------
Install Lelesys.Plugin.SEOHelper

1. If you want custom title to appear on the site then add this below code in site root.ts2 in header section

page = Page

page.headerData {
	title = Template
	title.templatePath = 'resource://Lelesys.Plugin.SEOHelper/Private/Templates/TypoScript/TitleMenu.html'
	title.items = ${context.parents().add(context)}
	title << 1.wrap(prefix:'<title>', suffix: '</title>')
}


2. Add this below code in site root.ts2 file in header section for the meta details
page = Page

page.headerData {
	dynamicMetaTag = Template
	dynamicMetaTag {
		templatePath = 'resource://Lelesys.Plugin.SEOHelper/Private/Templates/TypoScript/DynamicMetaTags.html'
	}
}