<?php

namespace Ara\Book;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \LRC\Form\ModelForm as Modelform;

/**
 * A controller class.
 */
class BookController implements InjectionAwareInterface
{
    use InjectionAwareTrait;

    /**
     * @var \LRC\Repository\DbRepository  Book repository.
     */
    private $books;

    /**
     * @var string  Flash image.
     */
    // private $flash = 'img/bg5.jpg';



    /**
     * Configuration.
     */
    public function init()
    {
        $this->books = $this->di->manager->createRepository(Book::class, [
            'db' => $this->di->db,
            'type' => 'db-soft',
            'table' => 'rv1_Book'
        ]);
    }



    /**
     * Show all items.
     *
     * @return void
     */
    public function getIndex()
    {
        $title      = "Böcker";

        $data = [
            'header' => $title,
            'books' => $this->books->getAll()
        ];

        $this->di->view->add('book/crud/view-all', $data);

        $this->di->pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to create a new item.
     *
     * @return void
     */
    public function getPostCreateItem()
    {
        $title = "Lägg till bok";

        $form = new ModelForm('book-form', Book::class);
        if ($this->di->request->getMethod() == 'POST') {
            $book = $form->populateModel();
            $form->validate();
            if ($form->isValid()) {
                $this->books->save($book);
                $this->di->response->redirect('book');
            } else {
            }
        }

        $data = [
            'header' => $title,
            'form' => $form,
            'book' => $form->getModel(),
            'submit' => 'Lägg till bok'
        ];

        $this->di->view->add('book/crud/form', $data);

        $this->di->pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to update an item.
     *
     * @return void
     */
    public function getPostUpdateItem($id)
    {
        $title = "Redigera bok";

        $oldBook = $this->books->find('id', $id);
        if (!$oldBook) {
            $this->di->response->redirect('book');
        }

        $form = new ModelForm('book-form', $oldBook);
        if ($this->di->request->getMethod() == 'POST') {
            $book = $form->populateModel(null, ['id']);
            $form->validate();
            if ($form->isValid()) {
                $this->books->save($book);
                $this->di->response->redirect('book');
            } else {
            }
        } else {
            $book = $oldBook;
        }

        $data = [
            'header' => $title,
            'form' => $form,
            'book' => $book,
            'submit' => 'Spara'
        ];

        $this->di->view->add('book/crud/form', $data);

        $this->di->pageRender->renderPage(["title" => $title]);
    }



    /**
     * Handler with form to delete an item.
     *
     * @return void
     */
    public function getPostDeleteItem($id)
    {
        $title = "Ta bort bok";

        $book = $this->books->find('id', $id);
        if (!$book) {
            $this->di->response->redirect('book');
        }

        if ($this->di->request->getMethod() == 'POST') {
            if ($this->di->request->getPost('action') == 'delete') {
                $this->books->delete($book);
                $this->di->response->redirect('book');
            }
        }

        $data = [
            'header' => $title,
            'book' => $book
        ];

        $this->di->view->add("book/crud/delete", $data);

        $this->di->pageRender->renderPage(["title" => $title]);
    }
}
