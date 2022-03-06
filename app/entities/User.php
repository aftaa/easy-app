<?php

namespace app\entities;

use app\storages\GuestbookEntryStorage;
use app\storages\UserStorage;
use common\Application;
use common\db\ORM;
use common\DependencyInjection;

#[ORM\Table('user')]
class User extends ORM\Entity
{
    #[ORM\Id()]
    public int $id;
    public string $username;
    public string $email;
    public bool $is_verified;
    public string $roles;
    public string $password;

    public array $entries;

    /**
     * @return \common\db\DBAL\QueryResult
     * @throws \ReflectionException
     */
    public function getEntries(): \common\db\DBAL\QueryResult
    {
        $refStorage = GuestbookEntryStorage::class;
        $refColumn = "user_id";

//        return parent::oneToMany(refStorage: $refStorage, refColumn: $refColumn);

        return $this->getStorage($refStorage)->selectBuilder()
            ->where('user_id = :id')
            ->setParam(':id', $this->id)->getQuery()->getResults();
    }
}
