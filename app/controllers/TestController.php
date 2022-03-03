<?php

namespace app\controllers;

use app\entities\GuestbookEntry;
use app\entities\GuestbookEntryStatus;
use app\storages\GuestbookEntryStorage;
use common\Controller;
use common\db\Transaction;
use common\http\Request;
use common\http\Response;
use common\routes\Route;

#[Route('/test')]
class TestController extends Controller
{
    public function __construct(
        private GuestbookEntryStorage $storage,
    )
    {
    }

    /**
     * @throws \ReflectionException
     */
    #[Route('/deleted', name: 'deleted_list')]
    public function deletedAction(Request $request)
    {

        $page = $request->query('page') ?? 1;
        $entries = $this->storage->selectDeleted($page);
        return $this->render('test/index', [
            'data' => $entries,
            'count' => $this->storage->countDeleted(),
            'page' => $page,
            'limit' => 20,
        ]);
    }

    #[Route('/test', name: 'test')]
    /**
     * @throws \ReflectionException
     */
    public function indexAction(Request     $request,
                                Transaction $transaction,
    ): Response
    {

        $entry = new GuestbookEntry();
        $transaction->begin();;
        $entry->author = 'tes111t';
        $entry->title = 'asd asd asd';
        $entry->text = 'text asd asd asd';
        $entry->created_at = new \DateTimeImmutable();
        $entry->status = GuestbookEntryStatus::VERIFIED;
        $entry->user_id = 1;
        $id = $this->storage->store($entry);
        $transaction->commit();

        $page = $request->query('page') ?? 1;

        $data = $this->storage->selectNotDeleted($page);
        $count = $this->storage->countNotDeleted();
        return $this->render('test/index', [
            'data' => $data,
            'count' => $count,
            'page' => $page,
            'limit' => 20,
        ]);
    }

}
