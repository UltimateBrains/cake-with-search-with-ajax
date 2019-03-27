<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Batch Entity
 *
 * @property int $id
 * @property string $title
 * @property int $subject_id
 * @property int $standard_id
 * @property int $teacher_id
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Subject $subject
 * @property \App\Model\Entity\Standard $standard
 * @property \App\Model\Entity\Teacher $teacher
 * @property \App\Model\Entity\Student[] $students
 */
class Batch extends Entity
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
        'subject_id' => true,
        'standard_id' => true,
        'teacher_id' => true,
        'created' => true,
        'modified' => true,
        'subject' => true,
        'standard' => true,
        'teacher' => true,
        'students' => true
    ];
}
