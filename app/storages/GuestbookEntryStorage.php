<?php

namespace app\storages;

use app\entities\GuestbookEntry;
use common\db\ORM\Storage;

class GuestbookEntryStorage extends Storage
{
    /**
     * @param int $page
     * @return array
     * @throws \ReflectionException
     */
    public function selectDeleted(int $page): array
    {
        return $this->createQueryBuilder()
            ->where('deleted_at IS NOT NULL')
            ->limit(20)
            ->offset(((int)$page - 1) * 20)
            ->getQuery()->getResults();
    }

    /**
     * @return array|GuestbookEntry[]
     * @throws \ReflectionException
     */
    public function selectNotDeleted($page): array
    {
        return $this->createQueryBuilder()
            ->where('deleted_at IS NULL')
            ->limit(20)
            ->offset(((int)$page - 1) * 20)
            ->orderBy('id', SORT_DESC)
            ->getQuery()->getResults();
    }

    /**
     * @throws \ReflectionException
     */
    public function countDeleted()
    {
        return $this->createQueryBuilder()
            ->select('COUNT(*) AS count')
            ->where('deleted_at IS NOT NULL')
            ->getQuery()->getResult(transformToEntity: false)['count'];
    }

    /**
     * @param int $id
     * @return bool
     */
    public function setDeleted(int $id): bool
    {
        return $this->createUpgradeBuilder()
            ->set('deleted_at = :deleted_at')
            ->where('id = :id')
            ->setParam(':deleted_at', (new \DateTimeImmutable)->format('Y-m-d H:i:s'))
            ->setParam(':id', $id)
            ->getQuery()->getResult();
    }

    /**
     * @throws \ReflectionException
     */
    public function countNotDeleted()
    {
        return $this->createQueryBuilder()
            ->select('COUNT(*) AS count')
            ->where('deleted_at IS NULL')
            ->getQuery()->getResult(transformToEntity: false)['count'];
    }
}