<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Standard Entity
 *
 * @property int $id
 * @property string $title
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Batch[] $batches
 * @property \App\Model\Entity\BatchesStudent[] $batches_students
 * @property \App\Model\Entity\Student[] $students
 * @property \App\Model\Entity\Subject[] $subjects
 */
class Standard extends Entity
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
        'title' => true,
        'created' => true,
        'modified' => true,
        'batches' => true,
        'batches_students' => true,
        'students' => true,
        'subjects' => true
    ];
}
