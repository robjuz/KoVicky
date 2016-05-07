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
        $this->addBehavior('Tree');
        $this->addBehavior('Proffer.Proffer', [
            'photo' => [    // The name of your upload field
                'root' => WWW_ROOT . 'uploads', // Customise the root upload folder here, or omit to use the default
                'dir' => 'photo_dir',   // The name of the field to store the folder
                // 'thumbnailSizes' => [ // Declare your thumbnails
                //     'square' => [   // Define the prefix of your thumbnail
                //         'w' => 200, // Width
                //         'h' => 200, // Height
                //         'crop' => true,  // Crop will crop the image as well as resize it
                //         'jpeg_quality'  => 100,
                //         'png_compression_level' => 9
                //     ],
                //     'portrait' => [     // Define a second thumbnail
                //         'w' => 100,
                //         'h' => 300
                //     ],
                // ],
                // 'thumbnailMethod' => 'imagick'  // Options are Imagick, Gd or Gmagick
            ]
        ]);

        $this->belongsTo('ParentProblems', [
            'className' => 'KoVicky.Problems',
            'foreignKey' => 'parent_id'
        ]);
        $this->hasMany('ChildProblems', [
            'className' => 'KoVicky.Problems',
            'foreignKey' => 'parent_id'
        ]);

        $this->belongsTo('KoVicky.Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('KoVicky.Solutions', [
            'foreignKey' => 'problem_id'
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
            ->allowEmpty('parent_id')
            ->notEmpty('title')
            ->notEmpty('category_id')
            ->allowEmpty('thesis')
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['parent_id'], 'ParentProblems'));
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        return $rules;
    }
}
