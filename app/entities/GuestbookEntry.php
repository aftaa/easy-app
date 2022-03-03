<?php

namespace app\entities;

use app\storages\GuestbookEntryStorage;
use app\storages\UserStorage;
use common\Application;
use common\db\ORM as ORM;
use common\db\ORM\Entity;
use common\DependencyInjection;

#[ORM\Table('guestbook_entry')]
class GuestbookEntry extends Entity
{
    #[ORM\Id()]
    public int $id;

    public string $author;
    public String $title;
    public string $text;
    public \DateTimeImmutable $created_at;
    public ?\DateTimeImmutable $deleted_at = null;
    public ?GuestbookEntryStatus $status;
    public ?int $user_id;

    /**
     * @return object
     * @throws \ReflectionException
     */
    public function getUser(): object
    {
        return parent::manyToOne(refColumn: 'user_id', refStorage: UserStorage::class);
    }
}
