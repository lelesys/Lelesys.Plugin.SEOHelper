<?php

namespace Lelesys\Plugin\SEOHelper\TypoScript;

/*                                                                          *
 * This script belongs to the package "Lelesys.Plugin.SEOHelper".           *
 *                                                                          *
 * It is free software; you can redistribute it and/or modify it under      *
 * the terms of the GNU Lesser General Public License, either version 3     *
 * of the License, or (at your option) any later version.                   *
 *                                                                          */

use TYPO3\Flow\Annotations as Flow;

/**
 * A TypoScript object which finds requested meta property.
 *
 * If the property is not found in the current node then it goes
 * back to the parent nodes until one is found.
 *
 */
class MetaPropertySlider extends \TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject {

	/**
	 * Name of meta property to be found
	 *
	 * @var string
	 */
	protected $propertyName;

	/**
	 * Sets property name
	 *
	 * @param string $propertyName
	 */
	public function setPropertyName($propertyName) {
		$this->propertyName = $propertyName;
	}

	/**
	 * Returns property name
	 *
	 * @return string
	 */
	public function getPropertyName() {
		return $this->tsValue('propertyName');
	}

	/**
	 * Finds value of the requested property
	 *
	 * Searches back in parent nodes if not found in current node
	 *
	 * @return mixed
	 */
	public function evaluate() {
		$context = $this->tsRuntime->getCurrentContext();
		$documentNode = clone $context['documentNode'];
		$propertyName = $this->getPropertyName();
		// find property on current node
		$propertyValue = $documentNode->getProperty($propertyName);
		if (!empty($propertyValue)) {
			return $propertyValue;
		}
		// find in parent nodes until to the site node
		$siteNode = $context['site'];
		while ($documentNode->getParent() !== $siteNode && $documentNode->getParent() !== NULL) {
			$documentNode = $documentNode->getParent();
			$propertyValue = $documentNode->getProperty($propertyName);
			if (!empty($propertyValue)) {
				return $propertyValue;
			}
		}
		return NULL;
	}

}

?>
