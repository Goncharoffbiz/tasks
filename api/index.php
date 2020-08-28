<?
include("db.php");


class tasks {

  	function add($title="", $text="", $status = 0, $date_end = "") {
      global $db;
      $result =  $db->sql_query("INSERT INTO tasks (id, title, `text`, status, date_start)
      VALUES
      (NULL, '$title', '$text', '$status', NOW())");
      return $result;
  	}

    function edit($id ,$title, $text) {
      global $db;
      $query =  $db->sql_query("UPDATE tasks SET title='$title', text='$text' WHERE id='$id'");
      return $query;
    }

    function close($id) {
      global $db;
      $result =  $db->sql_query("UPDATE tasks SET  status=1, date_end=NOW() WHERE id='$id'");
      return $result;
    }

    function getTasks($status, $date_start, $date_end){
      global $db;
      $where = "";
      $nwhere = 0;
      if($status !=='') {
        $where .= "status='$status' ";
        $nwheres++;
      }
      if($date_start) {
        if ($nwere !==0) $where .= " AND ";
        $where .= "`date_start` > '$date_start' ";
        $nwheres++;
      }
      if($date_end) {
        if ($nwere !==0) $where .= " AND ";
        $where .= "`date_start` < '$date_end' ";
        $nwheres++;
      }

      if ($where !== "") $where = " WHERE ".$where;

      $result = $db->sql_query("SELECT id, title, text, status, date_start, date_end FROM tasks $where");
      while (list($id, $title, $text, $status, $date_start, $date_end) = $db->sql_fetchrow($result)) {
        $arr[$id][title] .= $title;
        $arr[$id][text] .= $text;
        $arr[$id][status] .= $status;
        $arr[$id][date_start] .= $date_start;
        $arr[$id][date_end] .= $date_end;
      }
      //die(var_dump("SELECT id, title, text, status, date_start, date_end FROM tasks $where"));
      return $arr;

    }

}


function head(){
  header('Content-Type: application/x-javascript; charset=utf8');
  header('Access-Control-Allow-Origin: *');
}

$tasks = new tasks();


$action = $_GET['action'];


 switch($action) {
 	default:
  $status = $_GET['status'];
  $date_start = $_GET['date_start'];
  if($date_start){
    $date_start = new DateTime($date_start);
    $date_start = $date_start->format('Y-m-d H:i:s');
  }
  $date_end = $_GET['date_end'];
  if ($date_end) {
    $date_end = new DateTime($date_end);
    $date_end = $date_end->format('Y-m-d H:i:s');
  }
  $result = $tasks->getTasks($status, $date_start, $date_end);
  if($result){
    $content['status'] = 'Ok';
    $content['message'] = 'Tasks are displayed';
    $content['result'] = $result;
  }else{
    $content['status'] = 'Error';
    $content['message'] = 'Tasks are not displayed';
  }
  head();
  echo json_encode($content);
 	break;

 	case "add":
  $title = $_GET['title'];
  $text = $_GET['text'];
  $result = $tasks->add($title, $text);
  if($result){
    $content['status'] = 'Ok';
    $content['message'] = 'Task added';
    $content['fields'] = $_GET;
  }else{
    $content['status'] = 'Error';
    $content['message'] = 'Task not added';
  }
  head();
  echo json_encode($content);
 	break;


 	case "edit":
  $id = $_GET['id'];
  $title = $_GET['title'];
  $text = $_GET['text'];
  $result = $tasks->edit($id ,$title, $text);
  if($result){
    $content['status'] = 'Ok';
    $content['message'] = 'Task edited';
    $content['fields'] = $_GET;
  }else{
    $content['status'] = 'Error';
    $content['message'] = 'Task not edited';
  }
  head();
  echo json_encode($content);

 	break;
 	case "close":
  $id = $_GET['id'];
  $result = $tasks->close($id);
  if($result){
    $content['status'] = 'Ok';
    $content['message'] = 'Task closed';
    $content['fields'] = $_GET;
  }else{
    $content['status'] = 'Error';
    $content['message'] = 'Task not closed';
  }
  head();
  echo json_encode($content);
 	break;


}


?>
