
<?php
require_once("./vendor/autoload.php");

use FaaPz\PDO\Database;
use FaaPz\PDO\Clause\Conditional;
use FaaPz\PDO\Clause\Limit;

class MY_Database
{

    private $server = "mysql:host=localhost;dbname=cbt";
    private $username = "root";
    private $password = "";
    private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;

    public function open()
    {
        try {
            $this->conn = new Database($this->server, $this->username, $this->password, $this->options);
            return $this->conn;
        } catch (PDOException $e) {
            echo "There is some problem in connection: " . $e->getMessage();
        }
    }

    public function auth_admin(string $email, string $password)
    {
        session_start();
        $select = $this->open()->select(['email', 'password'])->from('admin')->where(new Conditional('email', '=', $email));
        $select->execute();
        $fetchData = $select->execute();
        $fetch = $fetchData->fetch();
        $result = $select->execute();
        if ($result->rowCount() > 0) {
            if (password_verify($password, $fetch['password'])) {

                $_SESSION['email'] = $email;

                echo "ok";
            } else {

                echo "wrong";
            }
        } else {
            echo "not";
        }

        return $select->execute();
    }


    public function auth_student(string $admissionNo, string $pass)
    {
        session_start();
        $last_log_date = date('Y-m-d H:i:s');
        $select = $this->open()->select(['admissionNo', 'password', 'pin', 'email', 'username', 'fullname', 'class', 'level'])->from('student')->where(new Conditional('admissionNo', '=', $admissionNo));
        $select->execute();
        $fetchData = $select->execute();
        $fetch = $fetchData->fetch();
        $result = $select->execute();
        if ($result->rowCount() > 0) {
            if ($fetch['pin'] == 0 && $fetch['password'] == $pass) {
                $_SESSION['email'] = $fetch['email'];
                $_SESSION['username'] = $fetch['username'];
                $_SESSION['fullname'] = $fetch['fullname'];
                $_SESSION['admissionNo'] = $admissionNo;
                $_SESSION['class'] = $fetch['class'];
                $_SESSION['level'] = $fetch['level'];

                $this->open()->update(["last_log_date" => $last_log_date])->table('student')->where(new Conditional('admissionNo', '=', $admissionNo));

                return 200;
            } else {
                return "False";
            }
        } else {
            return "False";
        }

        return $select->execute();
    }

    public function session_track($admissionNo)
    {
        $select = $this->open()->select(['admissionNo', 'password', 'pin', 'email', 'username', 'fullname', 'class', 'class_id', 'level', 'photo', 'level_id'])->from('student')->where(new Conditional('admissionNo', '=', $admissionNo));
        $select->execute();
        $fetchData = $select->execute();
        $fetch = $fetchData->fetch();
        $result = $select->execute();
        if ($result->rowCount() > 0) {
            return $fetch;
        } else {
            return false;
        }
    }

    public function subject_track($level_id)
    {
        $select = $this->open()->prepare("SELECT subject_name, subject_id, date_added FROM  subject WHERE level_id =:level_id");
        $select->execute(['level_id' => $level_id]);
        if ($select->rowCount() > 0) {
            return  $select;
        } else {
            return false;
        }
    }

    public function subject_question_count($subject_id)
    {

        $select = $this->open()->prepare("SELECT id FROM questions WHERE subject_id =:subject_id AND pin =:pin ");
        $select->execute(['subject_id' => $subject_id, 'pin' => 0]);
        if ($select->rowCount() > 0) {
            return $select->rowCount();
        } else {
            return 0;
        }
    }

    public function subject($subject_id)
    {
        $select = $this->open()->prepare("SELECT subject_name, subject_id FROM subject WHERE subject_id =:subject_id AND pin =:pin ");
        $select->execute(['subject_id' => $subject_id, 'pin' => 0]);
        if ($select->rowCount() > 0) {
            return $select->fetch();
        } else {
            return false;
        }
    }

    public function questions($subject_id)
    {
        $select = $this->open()->prepare("SELECT question_id, questions, option_A, option_B, option_C, option_D, option_E, answer FROM questions WHERE subject_id =:subject_id AND pin =:pin  ORDER BY RAND()");
        $select->execute(['subject_id' => $subject_id, 'pin' => 0]);
        if ($select->rowCount() > 0) {
            return $select;
        } else {
            return false;
        }
    }

    public function load_quest($question_id)
    {
        $select = $this->open()->prepare("SELECT answer, subject_id, question_id, mark FROM questions WHERE question_id =:question_id AND pin =:pin");
        $select->execute(['question_id' => $question_id, 'pin' => 0]);
        if ($select->rowCount() > 0) {
            return $select;
        } else {
            return false;
        }
    }

    public function questions_load($question_id)
    {
        $select = $this->open()->prepare("SELECT subject_name, question_id, questions, option_A, option_B, option_C, option_D, option_E, answer FROM questions WHERE question_id =:question_id AND pin =:pin");
        $select->execute(['question_id' => $question_id, 'pin' => 0]);
        if ($select->rowCount() > 0) {
            return $select;
        } else {
            return false;
        }
    }


    public function single_result($result_id)
    {
        $select = $this->open()->prepare("SELECT SUM(choice_mark) AS total_score FROM single_result WHERE result_id =:result_id AND  choice_remark =:choice_mark");
        $select->execute(['result_id' => $result_id, 'choice_mark' => 'Correct']);
        $fetch = $select->fetch();
        $total_score = $fetch['total_score'];
        if ($select->rowCount() > 0) {
            return $total_score;
        } else {
            return 0;
        }
    }

    public function handle_exam(string $subject_id, string $admissionNo)
    {

        $select = $this->open()->prepare("SELECT subject_id, admissionNo FROM result WHERE subject_id =:subject_id AND admissionNo =:admissionNo");
        $select->execute(['subject_id' => $subject_id, 'admissionNo' => $admissionNo]);
        return ($select->rowCount() > 0) ? '<button class="btn btn-success pull-right">Exam Taken</button>'  : '<a href="Examination?subject_id=' . $subject_id . '"><button class="btn btn-success pull-right">START EXAM</button></a>';
    }

    public function subject_timer($subject_id)
    {
        $select = $this->open()->prepare("SELECT exam_time FROM timer WHERE subject_id =:subject_id");
        $select->execute(['subject_id' => $subject_id]);
        $fetch = $select->fetch();
        if ($select->rowCount() > 0) {
            return $fetch['exam_time'];
        } else {
            return 0;
        }
    }

    public function fetchData(int $num_per_page, int $start_from, string $search)
    {
        $select = $this->open()->select(['Country', 'CountryCode', 'Currency', 'Code'])->from('tbl_contries_corrency')->where(new Conditional('Code', 'LIKE', '' . $search . '%'))->limit(new Limit($num_per_page, $start_from));
        return $select->execute();
    }

    public function fetchDataPadination(string $search)
    {
        $select_padination = $this->open()->select(['Country', 'CountryCode', 'Currency', 'Code'])->from('tbl_contries_corrency')->where(new Conditional('Code', 'LIKE', '' . $search . '%'));
        return $select_padination->execute();
    }

    public function check_if_exist(string $household_id, string $collector_date)
    {
        $check_exist_data = $this->open()->select(['household_id', 'collector_date'])->from('tbl_test')->where(new Conditional('household_id', '=', $household_id, 'AND', 'collector_date', '=', $collector_date));
        return $check_exist_data->execute();
    }

    public function createInsertion(string $agent_id, string $household_id, string $collector_id, string $collector_role, string $collector_name, string $collector_date, string $tech_pay, string $log, string $lat, string $collector_img)
    {
        $insert = $this->open()
            ->insert(['agent_id', 'household_id', 'collector_id', 'collector_role', 'collector_name', 'collector_date', 'tech_pay', 'log', 'lat', 'collector_img'])
            ->into('tbl_test')
            ->values($agent_id, $household_id, $collector_id, $collector_role, $collector_name, $collector_date, $tech_pay, $log, $lat, $collector_img);
        return $insert->execute();
    }

    public function redirect(string $string)
    {
        return  header("location: $string ");
    }

    public function view(string $string)
    {
        return $string;
    }


    public function close()
    {
        $this->conn = null;
    }
}

$pdo = new My_Database();
$view = $pdo;
$conn = $pdo;
$redirect = $pdo;
