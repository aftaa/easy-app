<?php

namespace app\controllers;

use app\entities\GuestbookEntry;
use app\storages\GuestbookEntryStorage;
use common\Controller;
use common\db\Transaction;
use common\http\Request;
use common\http\Response;
use common\routes\Route;

#[Route('/')]
class IndexController extends Controller
{
    #[Route('', name: 'index')]
    public function indexAction()
    {
        return $this->render(fileName: 'index/index');
    }

    #[Route('add', name: 'add')]
    public function addAction()
    {
        return $this->render(fileName: 'index/add');
    }

    #[Route('create', name: 'create')]
    /**
     * @throws \ReflectionException
     */
    public function createAction(Request $request, GuestbookEntryStorage $storage, Transaction $transaction)
    {
        $transaction->begin();
        $entry = new GuestbookEntry;
        $entry->author = $request->query('author');
        $entry->title = $request->query('title');
        $entry->text = $request->query('text');
        $entry->user_id = 1;
        $entry->created_at = new \DateTimeImmutable();

        $storage->store($entry);
        $transaction->commit();

        return $this->render('index/create', ['entry' => $entry]);
    }

    /**
     * @throws \ReflectionException
     */
    #[Route('edit', name: 'edit')]
    public function editAction(Request $request, GuestbookEntryStorage $guestbookEntryStorage): Response
    {
        $id = $request->request('id');
        /** @var GuestbookEntry $entry */
        $entry = $guestbookEntryStorage->selectOne($id);
        if ($request->isPost()) {
            $entry->author = $request->post('form')['author'];
            $entry->title = $request->post('form')['title'];
            $entry->text = $request->post('form')['text'];
            $entry->created_at = new \DateTimeImmutable($request->post('form')['created_at']);
            $guestbookEntryStorage->store($entry);
        }
        return $this->render(fileName: 'index/edit', params: ['entry' => $entry]);
    }
    
    #[Route('delete', name: 'delete')]
    public function deleteAction(Request $request, GuestbookEntryStorage $storage, Transaction $transaction)
    {
        $transaction->begin();
        foreach ($request->post('deleteId') as $id) {
            $storage->setDeleted((int)$id);
        }
        $transaction->commit();
        $this->toRoute('test');
    }
}
