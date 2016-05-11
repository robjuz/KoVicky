<?php
namespace KoVicky\Model\Table;

use KoVicky\Model\Entity\Mediafile;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mediafiles Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Solutions
 * @property \Cake\ORM\Association\BelongsTo $Users
 */
class MediafilesTable extends Table
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

        $this->table('KoVicky_mediafiles');
        $this->displayField('file_name');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('KoVicky.Problems', [
            'foreignKey' => 'problem_id',
            'joinType' => 'INNER'
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
            ->allowEmpty('id', 'create');

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
        $rules->add($rules->existsIn(['problem_id'], 'Problems'));
        return $rules;
    }
}
