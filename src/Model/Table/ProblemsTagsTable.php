<?php
namespace KoVicky\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use KoVicky\Model\Entity\ProblemsTag;

/**
 * ProblemsTags Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Problems
 * @property \Cake\ORM\Association\BelongsTo $Tags
 */
class ProblemsTagsTable extends Table
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

        $this->table('KoVicky_problems_tags');
        $this->displayField('problem_id');
        $this->primaryKey(['problem_id', 'tag_id']);

        $this->belongsTo('KoVicky.Problems', [
            'foreignKey' => 'problem_id',
            'joinType' => 'INNER',
            'className' => 'KoVicky.Problems'
        ]);
        $this->belongsTo('KoVicky.Tags', [
            'foreignKey' => 'tag_id',
            'joinType' => 'INNER',
            'className' => 'KoVicky.Tags'
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
        $rules->add($rules->existsIn(['problem_id'], 'Problems'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        return $rules;
    }
}
