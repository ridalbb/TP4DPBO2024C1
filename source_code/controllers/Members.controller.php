<?php
include_once("conf.php");
include_once("models/Members.class.php");
include_once("models/Club.class.php");
include_once("views/Members.view.php");

class MembersController {
  private $members;
  private $club;

  function __construct(){
    $this->members = new Members(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
    $this->club = new Club(Conf::$db_host, Conf::$db_user, Conf::$db_pass, Conf::$db_name);
  }

  public function index() {
    $this->members->open();
    $this->club->open();
    $this->members->getMembers();
    $this->club->getClub();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $dataClub = array();
    while($row = $this->club->getResult()){
      array_push($dataClub, $row);
    }

    $this->members->close();
    $this->club->close();

    $view = new MembersView();
    $view->render($data, $dataClub);
  }

  public function addForm()
  {
    $this->club->open();
    $this->club->getClub();

    $dataClub = array();
    while($row = $this->club->getResult()){
      array_push($dataClub, $row);
    }

    $this->club->close();

    $view = new MembersView();
    $view->listClub($dataClub);
  }

  public function editForm($id) {
    $this->members->open();
    $this->club->open();
    $this->members->getMembers();
    $this->club->getClub();
    $data = array();
    while($row = $this->members->getResult()){
      array_push($data, $row);
    }

    $dataClub = array();
    while($row = $this->club->getResult()){
      array_push($dataClub, $row);
    }

    $this->members->close();
    $this->club->close();

    $view = new MembersView();
    $view->editMember($id, $data, $dataClub);
  }

  function add($data){
    $this->members->open();
    $this->members->add($data);
    $this->members->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->members->open();
    $this->members->edit($id);
    $this->members->close();
    
    header("location:index.php");
  }

  function delete($id){
    $this->members->open();
    $this->members->delete($id);
    $this->members->close();
    
    header("location:index.php");
  }


}