<?php
require_once('./system/util/Api.class.php');
require_once('./system/util/UserId.class.php');
require_once('./system/util/Movie.class.php');
class DeletePage extends AbstractPage {

    public function code () {
        
    $user = new UserId($_GET['name'], $_GET['password']);
    $movieId = new Movie($_GET['moviename']);
    $moviename = $_GET['moviename'];
    //$rate = $_GET['rate'];

    $movie = Api::getOmdbRecordByTitle($moviename,APIKEY);
    $movieArray = json_decode(json_encode($movie), true);

    // $sql = "DELETE FROM rates WHERE movie_id = '$movieId->movie_id' AND user_id = '$user->userid'";
    $sql = "DELETE FROM movies WHERE movie_id = '".$movieId->movie_id."'";
    AppCore::getDB()->sendQuery($sql);
    


    $this->templateName = 'delete';
    $this->v['resursi'] = [
    $this->ime = $movieArray['Title'],
    $this->zanr = $movieArray['Genre'],
    $this->godina = $movieArray['Year'],
    ];
    }
}