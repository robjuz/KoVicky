<?php
namespace KoVicky\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use KoVicky\Model\Entity\Tag;

/**
 * Tags Model
 *
 * @property \Cake\ORM\Association\HasMany $ProblemsTags
 */
class TagsTable extends Table
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

        $this->table('KoVicky_tags');
        $this->displayField('title');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsToMany('KoVicky.ProblemsTags', [
            'foreignKey' => 'tag_id',
            'targetForeignKey' => 'problem_id',
            'joinTable' => 'KoVicky_problems_tags'
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

        $validator
            ->allowEmpty('title');

        return $validator;
    }
}
