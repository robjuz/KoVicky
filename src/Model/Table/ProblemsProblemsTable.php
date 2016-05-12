<?php
namespace KoVicky\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use KoVicky\Model\Entity\ProblemsProblem;

/**
 * ProblemsProblems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Problems
 * @property \Cake\ORM\Association\BelongsTo $RelatedProblems
 */
class ProblemsProblemsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->table('KoVicky_problems_problems');
        $this->displayField('problem_id');
        $this->primaryKey(['problem_id', 'related_problem_id']);

        $this->belongsTo('Problems', [
            'foreignKey' => 'problem_id',
            'joinType' => 'INNER',
            'className' => 'KoVicky.Problems'
        ]);
        $this->belongsTo('RelatedProblems', [
            'foreignKey' => 'problem_id',
            'joinType' => 'INNER',
            'className' => 'KoVicky.Problems'
        ]);
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        // $rules->add($rules->existsIn(['problem_id'], 'Problems'));
        // $rules->add($rules->existsIn(['related_problem_id'], 'Problems'));
        return $rules;
    }
}
