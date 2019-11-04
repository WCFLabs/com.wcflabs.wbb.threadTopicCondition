<?php
namespace wbb\system\condition\thread;
use wbb\data\thread\Thread;
use wcf\data\DatabaseObject;
use wcf\data\DatabaseObjectList;
use wcf\system\condition\AbstractObjectTextPropertyCondition;
use wcf\system\exception\NotImplementedException;

/**
 * Condition implementation for the topic name of a thread.
 *
 * @author	Joshua Ruesweg
 * @copyright	2016-2019 WCFLabs.de
 * @license	GNU Lesser General Public License <http://opensource.org/licenses/lgpl-license.php>
 */
class ThreadTopicCondition extends AbstractObjectTextPropertyCondition {
	/**
	 * @inheritDoc
	 */
	protected $className = Thread::class;
	
	/**
	 * @inheritDoc
	 */
	protected $description = 'wbb.thread.condition.topic.description';
	
	/**
	 * @inheritDoc
	 */
	protected $fieldName = 'wbbThreadTopic';
	
	/**
	 * @inheritDoc
	 */
	protected $label = 'wbb.thread.condition.topic';
	
	/**
	 * @inheritDoc
	 */
	protected $propertyName = 'topic';
	
	/**
	 * @inheritDoc
	 */
	public function addObjectListCondition(DatabaseObjectList $objectList, array $conditionData) {
		$className = $this->getListClassName();
		if (!($objectList instanceof $className)) {
			throw new \InvalidArgumentException("Object list is no instance of '{$className}', instance of '".get_class($objectList)."' given.");
		}
		
		$objectList->getConditionBuilder()->add($objectList->getDatabaseTableAlias().'.'.$this->getPropertyName().' LIKE ?', [$conditionData[$this->fieldName]]);
	}
	
	/**
	 * @inheritDoc
	 */
	public function checkObject(DatabaseObject $object, array $conditionData) {
		throw new NotImplementedException();
	}
}
