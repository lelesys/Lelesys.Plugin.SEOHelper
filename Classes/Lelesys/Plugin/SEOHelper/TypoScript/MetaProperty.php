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
 * A TypoScript object which sets the meta properties.
 *
 */
class MetaProperty extends \TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject {

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Neos\Domain\Service\ContentContext
	 */
	protected $contentContext;

	/**
	 * @var string
	 */
	protected $propertyName;

	/**
	 *
	 * @var array
	 */
	protected $parents;

	/**
	 * Sets property name
	 *
	 * @param string $propertyName
	 */
	public function setPropertyName($propertyName) {
		$this->propertyName = $propertyName;
	}

	/**
	 * Returns property name set from TyopScript
	 *
	 * @return string
	 */
	public function getPropertyName() {
		return $this->tsValue('propertyName');
	}

	/**
	 * Sets parents array
	 *
	 * @param array $parents
	 */
	public function setParents(array $parents) {
		$this->parents = $parents;
	}

	/**
	 * Returns parents array
	 *
	 * @return array
	 */
	public function getParents() {
		return $this->tsValue('parents');
	}

	/**
	 * @return string
	 */
	public function evaluate() {
		$context = $this->tsRuntime->getCurrentContext();
		$node = $context['node'];
		$metaProperty = $node->getProperty($this->propertyName);
		$parents = $this->getParents();
		if (empty($metaProperty) && count($parents) > 0) {
			foreach ($parents as $parent) {
				$metaProperty = $parent->getProperty($this->propertyName);
				if (!empty($metaProperty)) {
					return $metaProperty;
				}
			}
		}
		return $metaProperty;
	}

}

?>
