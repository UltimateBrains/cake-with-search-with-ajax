<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Standards Model
 *
 * @property \App\Model\Table\BatchesTable|\Cake\ORM\Association\HasMany $Batches
 * @property \App\Model\Table\BatchesStudentsTable|\Cake\ORM\Association\HasMany $BatchesStudents
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\HasMany $Students
 * @property \App\Model\Table\SubjectsTable|\Cake\ORM\Association\HasMany $Subjects
 *
 * @method \App\Model\Entity\Standard get($primaryKey, $options = [])
 * @method \App\Model\Entity\Standard newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Standard[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Standard|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Standard|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Standard patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Standard[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Standard findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StandardsTable extends Table
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

        $this->setTable('standards');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Batches', [
            'foreignKey' => 'standard_id'
        ]);
        $this->hasMany('BatchesStudents', [
            'foreignKey' => 'standard_id'
        ]);
        $this->hasMany('Students', [
            'foreignKey' => 'standard_id'
        ]);
        $this->hasMany('Subjects', [
            'foreignKey' => 'standard_id'
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
            ->nonNegativeInteger('id')
            ->allowEmptyString('id', 'create');

        $validator
            ->scalar('title')
            ->maxLength('title', 120)
            ->requirePresence('title', 'create')
            ->allowEmptyString('title', false);

        return $validator;
    }
}
