<?php

namespace controllers;

use models\BeratBadan;

class BeratBadanController
{
    private $beratBadan;
    
    public function __construct()
    {
        $this->beratBadan = new BeratBadan;
    }

    /**
     * index
     *
     * @return html homepage
     */
    public function index()
    {
        $beratList = $this->beratBadan->all();

        include './views/home.php';
    }

    /**
     * show
     *
     * @param integer $id
     * @return html detail page
     */
    public function show(int $id)
    {
        $berat = $this->beratBadan->findById($id);

        include './views/detail.php';
    }

    /**
     * create
     *
     * @return html create page
     */
    public function create()
    {
        include './views/create.php';
    }

    /**
     * store data to database
     *
     * @return void
     */
    public function store()
    {
        $data = [
            '_max' => $_POST['_max'],
            '_min' => $_POST['_min'],
            'tanggal' => date('Y-m-d')
        ];

        $this->beratBadan->store($data);

        header('Location: /');
    }

    /**
     * edit
     *
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
        $berat = $this->beratBadan->findById($id);

        include './views/edit.php';
    }

    /**
     * update data
     *
     * @return void
     */
    public function update()
    {
        $data = [
            '_max' => $_POST['_max'],
            '_min' => $_POST['_min'],
            'id' => $_POST['id']
        ];

        $this->beratBadan->update($data);

        header('Location: /');
    }

    /**
     * delete data by id
     *
     * @param integer $id
     * @return void
     */
    public function delete(int $id)
    {
        $this->beratBadan->findById($id);
        $this->beratBadan->delete($id);

        header('Location: /');
    }
}