<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Komentar Model
 *
 * @property \App\Model\Table\FotoTable&\Cake\ORM\Association\BelongsTo $Foto
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 *
 * @method \App\Model\Entity\Komentar newEmptyEntity()
 * @method \App\Model\Entity\Komentar newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Komentar> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Komentar get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Komentar findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Komentar patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Komentar> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Komentar|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Komentar saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Komentar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentar>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentar> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentar>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentar>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentar> deleteManyOrFail(iterable $entities, array $options = [])
 */
class KomentarTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('komentar');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Foto', [
            'foreignKey' => 'foto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('isi_komentar')
            ->requirePresence('isi_komentar', 'create')
            ->notEmptyString('isi_komentar');

        $validator
            ->date('tanggal')
            ->requirePresence('tanggal', 'create')
            ->notEmptyDate('tanggal');

        $validator
            ->integer('foto_id')
            ->notEmptyString('foto_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['foto_id'], 'Foto'), ['errorField' => 'foto_id']);
        $rules->add($rules->existsIn(['user_id'], 'User'), ['errorField' => 'user_id']);

        return $rules;
    }
}
