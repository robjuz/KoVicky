<?php
namespace KoVicky\Model\Entity;

use Cake\ORM\Entity;

/**
 * Problem Entity.
 *
 * @property int $id
 * @property int $user_id
 * @property \KoVicky\Model\Entity\User $user
 * @property string $photo
 * @property string $title
 * @property string $description
 * @property bool $is_active
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 * @property \KoVicky\Model\Entity\KoVickyMediafile[] $ko_vicky_mediafiles
 * @property \KoVicky\Model\Entity\Problem[] $problems
 */
class Problem extends Entity
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
        'id' => false,
    ];
}
