<?php
namespace KoVicky\Model\Table;

use KoVicky\Model\Entity\Problem;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Problems Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Users
 * @property \Cake\ORM\Association\BelongsTo $Categories
 * @property \Cake\ORM\Association\HasMany $Solutions
 */
class ProblemsTable extends Table
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

        $this->table('KoVicky_problems');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('RelatedProblems', [
            'foreignKey' => 'problem_id',
            'targetForeignKey' => 'related_problem_id',
            'joinTable' => 'KoVicky_problems_problems',
            'className' => 'KoVicky.Problems'
        ]);
        $this->belongsToMany('Problems', [
            'foreignKey' => 'problem_id',
            'targetForeignKey' => 'problem_id',
            'joinTable' => 'KoVicky_problems_problems',
            'className' => 'KoVicky.Problems'
        ]);


        $this->hasMany('KoVicky.Mediafiles', [
            'foreignKey' => 'problem_id'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'LEFT'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create')
            ->notEmpty('parent_id')
            ->notEmpty('title')
            ->allowEmpty('description')
            ->requirePresence('photo', 'create')
            ->allowEmpty('photo', 'update');

        return $validator;
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
        //$rules->add($rules->existsIn(['parent_id'], 'ParentProblems'));
        return $rules;
    }

    public function isOwnedBy($problemId, $userId)
    {
        return $this->exists(['id' => $problemId, 'user_id' => $userId]);
    }

}
