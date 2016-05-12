<?php
namespace KoVicky\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProblemsProblem Entity.
 *
 * @property int $problem_id
 * @property \KoVicky\Model\Entity\Problem $problem
 * @property int $related_problem_id
 * @property \KoVicky\Model\Entity\RelatedProblem $related_problem
 */
class ProblemsProblem extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'problem_id' => false,
        'related_problem_id' => false,
    ];
}
